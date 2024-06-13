<?php
// Démarrez la session
session_start();

// Vérifiez si l'utilisateur est connecté
if(isset($_SESSION['connexion'])) {
    // L'utilisateur est connecté, détruisez la session
    session_unset(); // Efface toutes les variables de session
    session_destroy(); // Détruit la session
}

// Redirigez l'utilisateur vers la page de connexion
header('Location: index.php');
exit();
?>
