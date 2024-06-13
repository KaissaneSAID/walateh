<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données (à adapter selon votre configuration)
    $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // Assurez-vous que les données nécessaires sont présentes
    if (isset($_POST['titre']) && isset($_FILES['photo']) && isset($_POST['description'])) {
        // Traitement de la photo
        $photo_path = 'img/'; // Emplacement où vous stockez les photos (ajusté le chemin)
        $photo_name = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];

        // Assurez-vous que le dossier spécifié existe
        if (!is_dir($photo_path)) {
            mkdir($photo_path, 0777, true);
        }

        move_uploaded_file($photo_tmp, $photo_path . $photo_name);

        // Insertion des données dans la table actualite
        $stmt = $pdo->prepare("INSERT INTO actualite (titre, photo, descriptions, dates) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$_POST['titre'], $photo_name, $_POST['description']]);

        // Redirection après l'envoi du formulaire (facultatif)
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dhashbord</title>

</head>
<body>
    <?php require('dhasbord.php') ?>
<form style="margin:100px"  enctype="multipart/form-data" method="POST" action="actudhashbord.php">
<h1>Ajouter un equipement</h1>
  
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre</label>
    <input type="text" class="form-control" name="titre" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">choisir la photo du description</label>
    <input type="file" class="form-control" name="photo" id="exampleInputPassword1">
  </div>

  <div class="form-floating">
  <textarea class="form-control"name="description"  placeholder="Leave a comment here" id="floatingTextarea"></textarea>
  <label for="floatingTextarea">description de l'actualite</label>
</div> <br>

<input type="submit" class="btn btn-success" value="enregistré">
</form>
</body>
</html>