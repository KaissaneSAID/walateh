<?php
// Assurez-vous que l'ID de l'équipement est présent dans la requête POST
if (isset($_GET['id'])) {
    $idservice = $_GET['id'];

    // Connexion à la base de données et suppression de l'équipement
    // Assumons que $pdo est votre objet de connexion PDO à la base de données
    $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    $stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
    $stmt->execute([$idservice]);

    // Répondre avec un statut HTTP 200 pour indiquer que la suppression a réussi
    header('location:service.php');
}
?>
