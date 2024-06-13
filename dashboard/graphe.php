<?php
session_start();

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Vérifiez si l'ID de l'actualité est présent dans l'URL
if (isset($_GET['id'])) {
    $idActualite = $_GET['id'];

    // Vérifiez si la variable de session pour cette actualité existe
    if (!isset($_SESSION['visites'][$idActualite])) {
        // Si la variable de session n'existe pas, initialisez-la à 1
        $_SESSION['visites'][$idActualite] = 1;
    } else {
        // Si la variable de session existe, incrémentez-la
        $_SESSION['visites'][$idActualite]++;
    }
    $mvisite = "Nombre de visites : " . $_SESSION['visites'][$idActualite];
}

// Récupération des données des articles
$sql = "SELECT id, titre, photo, descriptions FROM actualite";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$articles = array();
$visits = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $articleId = $row['id'];
    $articleTitle = $row['titre'];
    $articlePhoto = $row['photo'];
    $articleDescription = $row['descriptions'];
    
    array_push($articles, $articleTitle);
    array_push($visits, isset($_SESSION['visites'][$articleId]) ? $_SESSION['visites'][$articleId] : 0);
}

// Conversion des données en JSON
$articles_json = json_encode($articles);
$visits_json = json_encode($visits);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Visits</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 45%;
            float: left;
            margin: 2.5%;
        }
        .center-text {
            text-align: center;
            margin-top: 50px;
            font-size: 24px;
            color: purple;
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <canvas id="barChart"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="donutChart"></canvas>
        <div class="center-text" id="totalVisitsText"></div>
    </div>

    <script>
        // Récupération des données depuis PHP
        const articles = <?php echo $articles_json; ?>;
        const visits = <?php echo $visits_json; ?>;
        const totalVisits = visits.reduce((a, b) => a + b, 0);
        const target = 1500;
        const percentage = (totalVisits / target) * 100;

        // Bar chart
        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: articles,
                datasets: [{
                    label: 'Number of Visits',
                    data: visits,
                    backgroundColor: 'teal'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            autoSkip: false,
                            maxRotation: 90,
                            minRotation: 45
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Donut chart
        const ctxDonut = document.getElementById('donutChart').getContext('2d');
        new Chart(ctxDonut, {
            type: 'doughnut',
            data: {
                labels: ['Total Visits', 'Remaining'],
                datasets: [{
                    data: [percentage, 100 - percentage],
                    backgroundColor: ['purple', 'lightgrey']
                }]
            },
            options: {
                responsive: true,
                cutout: '70%'
            }
        });

        // Ajouter le texte au centre du donut chart
        document.getElementById('totalVisitsText').innerText = `${totalVisits}\nTotal Visits`;
    </script>
</body>
</html>
