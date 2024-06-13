
<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données (à adapter selon votre configuration)
    $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // Assurez-vous que les données nécessaires sont présentes
    if (isset($_POST['nom'])&& ($_POST['email']) && isset($_POST['sujet']) && isset($_POST['message'])) {
        // Traitement de la photo
        

        // Insertion des données dans la table actualite
        $stmt = $pdo->prepare("INSERT INTO contact (nom, email, sujet, messages) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['nom'],$_POST['email'] ,$_POST['sujet'], $_POST['message']]);

        // Redirection après l'envoi du formulaire (facultatif)
        header('location:contact.php');
        exit();
    }
}
?>
<body>
    <!-- Topbar Start -->
    <?php require('header.php') ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
   
    <!-- Navbar End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5">Avez vous une question?</h5>
                <h1 class="display-4">N'hesitez pas à nous contacté</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 200px;">
                        <div class="d-flex align-items-center justify-content-center  rounded-circle mb-4" style="background: #1D85FF; width: 100px; height: 70px; transform: rotate(-15deg);">
                            <i  class="fa fa-2x fa-location-arrow text-white" style="transform: rotate(15deg); "></i>
                        </div>
                        <h6 class="mb-0">Ikoni-Maluzine Boulevard Cœlacanthe</h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 200px;">
                        <div class="d-flex align-items-center justify-content-center  rounded-circle mb-4" style="background: #1D85FF; width: 100px; height: 70px; transform: rotate(-15deg);">
                            <i class="fa fa-2x fa-phone text-white" style="transform: rotate(15deg);"></i>
                        </div>
                        <h6 class="mb-0">+269 333 78 75</h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 200px;">
                        <div class="d-flex align-items-center justify-content-center  rounded-circle mb-4" style="background: #1D85FF; width: 100px; height: 70px; transform: rotate(-15deg);">
                            <i class="fa fa-2x fa-envelope-open text-white" style="transform: rotate(15deg);"></i>
                        </div>
                        <h6 class="mb-0">info@example.com</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="height: 500px;">
                    <div class="position-relative h-100">
                        <iframe class="position-relative w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15625.210466014121!2d43.2500031!3d-11.743718399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18a18b5031fe49dd%3A0xe95568a0317b5430!2sIconi%2C%20Mde%2C%20Comores!5e0!3m2!1sfr!2s!4v1717323060484!5m2!1sfr!2s"
                            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center position-relative" style="margin-top: -200px; z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5 m-5 mb-0">
                        <form method="post">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" name="nom" placeholder="votre nom" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0" name="email" placeholder="votre Email" style="height: 55px;" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-light border-0" name="sujet" placeholder="sujet" style="height: 55px;" required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="5" name="message" placeholder="Message" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button style="background-color:#1D85FF;" class="btn btn-primary w-100 py-3" type="submit">Envoyé</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <?php require('footer.php') ?>
    <!-- Footer End -->


    <!-- Back to Top -->
   
</body>

</html>