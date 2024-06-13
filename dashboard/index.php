<?php
session_start();
// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification des champs obligatoires
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Requête SQL pour récupérer l'utilisateur par son email
        $requete = $pdo->prepare("SELECT * FROM inscription WHERE email = ?");
        $requete->execute([$email]);
        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur) {
            // Utilisateur trouvé, vérification du mot de passe
            if (password_verify($password, $utilisateur['mdp'])) {
                // Mot de passe correct, connecter l'utilisateur
                // Vous pouvez rediriger l'utilisateur vers une page sécurisée ici
               $_SESSION['connexion'] = $utilisateur['nom'];
               header('location:dashboard.php');
            } else {
                // Mot de passe incorrect
                $message = "Mot de passe incorrect";
            }
        } else {
            // Utilisateur non trouvé
            $message = "Cet email <b> $email</b> n'existe pas";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>WALATECH</title>

<link rel="shortcut icon" href="../img/LOGO_walat.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div style="background:none;" class="login-left">
<img class="img-fluid" src="../img/LOGO_wala.jpg" alt="Logo" width="800">
</div>
<div class="login-right">
<div class="login-right-wrap">
<h1>Bienvenue sur walatech</h1>
<p class="account-subtitle">Besoin d'un compte? <a href="register.php">S'inscrire</a></p>
<h2>Se Connecter</h2>

<form method="post" >
<?php if (isset($message)) {?>
       <div class="alert alert-danger" role="alert">
      <?= $message;?>
     </div>
   <?php } ?>
<div class="form-group">
<label>Email <span class="login-danger">*</span></label>
<input class="form-control" type="email" name="email" required>
<span class="profile-views"><i class="fas fa-envelope"></i></span>
</div>
<div class="form-group">
<label>Mot de passe <span class="login-danger">*</span></label>
<input class="form-control pass-input" type="password" name="password" required>
<span class="profile-views feather-eye toggle-password"></span>
</div>

<div class="form-group">
<button style="background:#1D85FF;border:none" class="btn btn-primary btn-block" type="submit">Connecter</button>
</div>
</form>


</div>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>