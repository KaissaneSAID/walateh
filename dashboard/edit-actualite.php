<?php
// Assumant que $pdo est votre objet de connexion PDO à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// Vérifie si l'ID de l'équipement est passé en paramètre
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Récupère l'ID de l'équipement depuis l'URL
    $id = $_GET['id'];
    
    // Prépare une requête pour récupérer les détails de l'équipement
    $stmt = $pdo->prepare("SELECT * FROM actualite WHERE id = ?");
    $stmt->execute([$id]);
    
    // Vérifie si l'équipement existe
    if($stmt->rowCount() > 0) {
        // Récupère les détails de l'équipement
        $actualite = $stmt->fetch(PDO::FETCH_ASSOC);
        $titre = $actualite['titre'];
        $description = $actualite['descriptions'];
        $photo_name = $actualite['photo'];
    } 
}

// Assumant que $pdo est votre objet de connexion PDO à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $id = $_POST['id']; // Supposons que vous avez un champ de saisie pour l'ID de l'équipement dans votre formulaire
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    
    // Gestion du téléchargement du fichier
// Gestion du téléchargement du fichier
if (!empty($_FILES['photo']['name'])) {
    $photo_path = '../img/'; // Emplacement où vous stockez les photos (ajusté le chemin)
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];

    // Assurez-vous que le dossier spécifié existe
    if (!is_dir($photo_path)) {
        mkdir($photo_path, 0777, true);
    }

    move_uploaded_file($photo_tmp, $photo_path . $photo_name);
} else {
    // Si aucun fichier n'est téléchargé, gardez le nom de la photo existante
    $photo_name = $actualite['photo'];
}

    
    // Mise à jour de l'équipement existant dans la base de données
    $stmt = $pdo->prepare("UPDATE actualite SET titre = ?, photo = ?, descriptions = ?, dates = NOW() WHERE id = ?");
    $stmt->execute([$titre, $photo_name, $description, $id]);
    
    // Redirection vers une page de succès ou la liste des équipements
    header("Location: actualite.php");
    exit();
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
<h3 class="page-title">modifier l actualites</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="dashboard.php">dashboard</a></li>
<li class="breadcrumb-item active">modifier l actualites</li>
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
    <input type="hidden" name="id"  value=" <?php echo $id ?>">
<div class="row">
<div class="col-12">
<h5 class="form-title student-info">Information de l'actualite <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
</div>
<div class="col-12 col-sm-6">
<div class="form-group local-forms">
<label>Titre </label>
<input class="form-control" type="text" placeholder="Entrer le titre" name="titre"  value="<?php echo $titre; ?>">
</div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier la photo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nouvellePhoto">Choisir une nouvelle photo</label>
            <input type="file" class="form-control-file" id="nouvellePhoto" name="photo">
          </div>
        </div>
      
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
        <button type="button" class="btn btn-primary" onclick="sauvegarderPhoto()">Sauvegarder</button>
        </div>
    </div>
  </div>
</div>
<div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label>Photo Actuelle</label>
        <img style="cursor:pointer"  id="photoActuelle"  data-bs-toggle="modal" data-bs-target="#exampleModal" src="../img/<?php echo $photo_name; ?>" width="100" alt="Photo Actuelle" class="img-fluid">
        </div>
</div>
<!-- Modal -->


<div class="col-12 col-sm-12">
<div class="form-group local-forms">
<label>description </label>
<textarea name="description" class="form-control" id=""> <?php echo $description; ?></textarea>
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
<!-- Modal pour modifier la photo -->

<script>
    function sauvegarderPhoto() {
        // Récupérer le chemin du fichier sélectionné
        var nouvellePhoto = document.getElementById("nouvellePhoto").files[0];
        
        // Créer un objet FileReader pour lire le contenu de la photo
        var reader = new FileReader();

        reader.onload = function(e) {
            // Mettre à jour l'attribut src de l'image avec le contenu de la nouvelle photo
            document.getElementById("photoActuelle").src = e.target.result;
        }

        reader.readAsDataURL(nouvellePhoto);
    }
</script>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>