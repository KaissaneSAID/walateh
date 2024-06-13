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
        $stmt = $pdo->prepare("INSERT INTO services (titre, photo, descriptions,prix) VALUES (?, ?,?, ?)");
        $stmt->execute([$_POST['titre'], $photo_name, $_POST['description'],$_POST['prix']]);
        header('location:service.php');
        // Redirection après l'envoi du formulaire (facultatif)
        exit();
    }
}
?>

<div class="main-wrapper">

<?php require('slidebar.php') ?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col-sm-12">
<div class="page-sub-header">
<h3 class="page-title">Ajout service</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="students.html">service</a></li>
<li class="breadcrumb-item active">Ajout service</li>
</ul>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card comman-shadow">
<div class="card-body">
<form enctype="multipart/form-data" method="POST">
<div class="row">
<div class="col-12">
<h5 class="form-title student-info">Information du service<span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Titre <span class="login-danger">*</span></label>
<input class="form-control" type="text" placeholder="Entrer le titre" name="titre" required>
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Photo <span class="login-danger">*</span></label>
<input class="form-control" type="file" placeholder="Entrer la photo" name="photo" required>
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>prix <span class="login-danger">*</span></label>
<input class="form-control" type="number" placeholder="Entrer le prix" name="prix" required>
</div>
</div>

<div class="col-12 col-sm-12">
<div class="form-group local-forms">
<label>description <span class="login-danger">*</span></label>
<textarea name="description" class="form-control" id="" required></textarea>
</div>
</div>


<div class="col-12">
<div class="student-submit">
<button style="background-color: #1D85FF;" type="submit" class="btn btn-primary ">Envoyé</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>