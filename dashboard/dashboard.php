
<?php
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// Connexion à la base de données

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

$requete = $pdo->query("SELECT * FROM membres");
$membre = $requete->fetchAll(PDO::FETCH_ASSOC); 

$requets = $pdo->query("SELECT * FROM client");
$client = $requets->fetchAll(PDO::FETCH_ASSOC); 

$requetes = $pdo->query("SELECT * FROM contact");
$contact = $requetes->fetchAll(PDO::FETCH_ASSOC); 

$nbmbre = $pdo->prepare("SELECT COUNT(*) as nbmbre FROM membres");
$nbmbre->execute();
$nbmbre = $nbmbre->fetchColumn();

$nbactu = $pdo->prepare("SELECT COUNT(*) as nbactu FROM actualite");
$nbactu->execute();
$nbactu = $nbactu->fetchColumn();

$nbequi = $pdo->prepare("SELECT COUNT(*) as nbequi FROM equipement");
$nbequi->execute();
$nbequi = $nbequi->fetchColumn();

$nbserv = $pdo->prepare("SELECT COUNT(*) as nbserv FROM services");
$nbserv->execute();
$nbserv = $nbserv->fetchColumn();

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
          float:left;
          height: 500px; /* Augmentation de la hauteur */

            margin: 2.5%;
        }
        .center-text {
            text-align: center;
            margin-top: 50px;
            font-size: 24px;
            color: purple;
        }
     
    
        .flex-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <body>

    <?php require('slidebar.php') ?>

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Bienvenue</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Acceuil</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>actualite</h6>
                                        <h3><?= "$nbactu "?></h3>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>equipement</h6>
                                        <h3><?= "$nbequi "?></h3>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>membres</h6>
                                        <h3><?= "$nbmbre "?>
                                        </h3>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>service</h6>
                                        <h3><?= "$nbserv "?></h3>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
                <div class="row">
                <div class="col-xl-6">
        <div class="card flex-fill student-space comman-shadow">
            <div class="flex-container">
                <div class="chart-container" >
                    <canvas id="barChart"></canvas>
                </div>
                    <div class="chart-container">
                    <canvas id="donutChart" ></canvas>
                    <div class="center-text" id="totalVisitsText"></div>
                </div>
            </div>
        </div>
    </div>

                    <div class="col-xl-6 d-flex">
                        <div class="card flex-fill student-space comman-shadow">
                                <div class="card-header d-flex align-items-center">
                                    <h5 class="card-title">messages</h5>
                                    <ul class="chart-list-out student-ellips">
                                        <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            class="table star-student table-hover table-center table-borderless table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Nom et prenom</th>
                                                    <th class="text-center">email</th>
                                                    <th class="text-center">sujet</th>
                                                    <th class="text-center">text</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($contact as $contacts): ?>
                                                <tr>
                                                    <td class="text-nowrap">
                                                        <div><?= $contacts['nom'] ?></div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <a href="profile.html">
                                                            
                                                                <?= $contacts['email'] ?>
                                                        </a>
                                                    </td>
                                                    <td class=""><?= $contacts['sujet'] ?></td>
                                                    <td class=""><?= $contacts['messages'] ?></td>
                                                    <td class="text-end">
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        

                        </div>
                    </div>
                    <div class="col-xl-12 d-flex">
                        <div class="card flex-fill student-space comman-shadow">
                                <div class="card-header d-flex align-items-center">
                                    <h5 class="card-title">messages</h5>
                                    <ul class="chart-list-out student-ellips">
                                        <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            class="table star-student table-hover table-center table-borderless table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th >photo</th>
                                                    <th class="">Nom et prenom</th>
                                                    <th class="">prefession</th>
                                                    <th class="">commentaire</th>
                                                    <th class="">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($client as $clients): ?>
                                                <tr>
                                                    <td class="text-nowrap">
                                                    <a href="" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="../img/<?php echo $clients['images'];?>" alt="User Image"></a>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <a href="profile.html">
                                                            
                                                                <?= $clients['nomClient'] ?>
                                                        </a>
                                                    </td>
                                                    <td class=""><?= $clients['profession'] ?></td>
                                                    <td  style="width: 600px; word-wrap: break-word;" class=""><?= $clients['texte'] ?></td>
                                                    <td class="text-end">
    <div class="actions ">
    <a href="delete-avis.php?id=<?php echo $clients['id'];?>" class="btn btn-sm bg-success-light me-2 " onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet element ?')">
    <i class="feather-delete"></i>
    </a>
  
    </div>
    </td>
                                                </tr>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        

                        </div>
                    </div>

                
            </div>
           
        </div>
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
                    label: 'nombres de visite',
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
                labels: ['Totales de visite', 'Restante'],
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
  
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>