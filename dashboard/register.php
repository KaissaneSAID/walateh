<?php
$pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification des champs obligatoires
    if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['pass-confirm'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass_confirm = $_POST['pass-confirm'];

        // Vérification si les mots de passe correspondent
        if ($password === $pass_confirm) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $requete = $pdo->prepare("INSERT INTO inscription (nom,mdp, email) VALUES (?, ?, ?)");
            $requete->execute([$nom,$hashed_password, $email]);
            header('location:index.php');
        } else {
            $message ="Les mots de passe ne correspondent pas";
            // Les mots de passe ne correspondent pas
            
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
<h1>S'inscrire</h1>
<p class="account-subtitle">Entrez les détails pour créer votre compte</p>
<form action="" method="post">
    <?php if (isset($message)) {?>
       <div class="alert alert-danger" role="alert">
      <?= $message;?>
     </div>
   <?php } ?>
<div class="form-group">
<label>Nom et prenom <span class="login-danger">*</span></label>
<input class="form-control" name="nom" type="text" required>
<span class="profile-views"><i class="fas fa-user-circle"></i></span>
</div>
<div class="form-group">
<label>Email <span class="login-danger">*</span></label>
<input class="form-control" name="email" type="email" required>
<span class="profile-views"><i class="fas fa-envelope"></i></span>
</div>
<div class="form-group">
<label>mot de passe <span class="login-danger">*</span></label>
<input class="form-control pass-input" name="password" type="password" required>
<span class="profile-views feather-eye toggle-password"></span>
</div>
<div class="form-group">
<label>Confirme le mot de passe <span class="login-danger">*</span></label>
<input class="form-control pass-confirm" name="pass-confirm" type="password" required>
<span class="profile-views feather-eye reg-toggle-password"></span>
</div>
<div class=" dont-have">Dejà enregistré? <a href="index.php">connecté</a></div>
<div class="form-group mb-0">
<button style="background:#1D85FF;border:none" name="submit" class="btn btn-primary btn-block" type="submit">s'inscrire</button>
</div>
</form>


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