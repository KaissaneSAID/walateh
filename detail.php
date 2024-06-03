
<?php
$pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  if (isset($_GET['id'])) {
    $actu = $_GET['id'];

    // Effectuez une requête SQL pour obtenir les détails de l'article en fonction de l'ID
    $requete = $pdo->query("SELECT * FROM actualite WHERE id = $actu");
    $actualite = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requetes = $pdo->query("SELECT * FROM actualite limit 4");
    $actualites = $requetes->fetchAll(PDO::FETCH_ASSOC);

}

if (isset($_POST["submit"])) {
    if (!empty($_POST["commentaire"]) and !empty($_POST["nom"] and !empty($_POST["email"]))) {
        $commentaire_texte = $_POST["commentaire"];
        $libelle = $_POST["nom"];
        $email = $_POST["email"];
  
    // Enregistrez le commentaire dans la base de données
    $requete = $pdo->prepare("INSERT INTO commentaire (nom,email, messages,idActu,date_envoi) VALUES (?, ?, ?, ?, NOW())");
    $requete->execute([$libelle,$email, $commentaire_texte,$actu]);
}
}


$requetes = $pdo->query("SELECT * FROM commentaire WHERE idActu = $actu ");
    $service = $requetes->fetchAll(PDO::FETCH_ASSOC);
    $nbcom = $pdo->prepare("SELECT COUNT(*) as nbcomm FROM commentaire where idActu = $actu");
    $nbcom->execute();
    $nbcomm = $nbcom->fetchColumn();

?>
<body>
    <!-- Topbar Start -->
   <?php require('header.php') ?>
    <!-- Navbar End -->


    <!-- Blog Start -->
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                <?php foreach ($actualite as $actus): ?>
                    <img style="width: 100%; height:450px" class="img-fluid w-100 rounded mb-5" src="img/<?php echo $actus['photo'];?>" width="100%" height="150px" alt="">
                    <h1 class="mb-4"><?php echo $actus['titre'];?></h1>
                    <p><?php echo $actus['descriptions'];?></p>
                    <?php endforeach ?>
                    <div class="d-flex justify-content-between bg-light rounded p-4 mt-4 mb-4">
                        <div class="d-flex align-items-center">
                            <span>admin</span>
                        </div>
                        
                    </div>
                </div>
                <!-- Blog Detail End -->

                <!-- Comment List Start -->
                <div class="mb-5">
                    <h4 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5 mb-4"><?= "$nbcomm "?>commentaires </h4>
                    <?php foreach ($service as $article): ?>
                    <div class="d-flex mb-4">
                        <div class="ps-3">
                            <h6 ><a href="" style="color: #1D85FF;"><?= $article['nom'] ?></a> <small><i><?php echo date("d/m/Y H:i", strtotime($article['date_envoi'])) ?></i></small></h6>
                            <p><?= $article['messages'] ?></p>
                        </div>
                    </div>
                    <?php endforeach ?>
                  
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="bg-light rounded p-5">
                    <h4 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5 border-white mb-4">laissez un commentaire</h4>
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control bg-white border-0" placeholder="Votre nom" name="nom" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control bg-white border-0" placeholder="Votre email" name="email" style="height: 55px;">
                            </div>
                            
                            <div class="col-12">
                                <textarea class="form-control bg-white border-0" rows="5" placeholder="Commentaire" name ="commentaire"></textarea>
                            </div>
                            <div class="col-12">
                                <button style="background-color:#1D85FF;" class="btn btn-primary w-100 py-3" name="submit" type="submit">Envoyé</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Search Form Start -->
           
                <!-- Category End -->

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h4 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5 mb-4">à lire aussi</h4>
                    <?php foreach ($actualites as $act): 
                            if($act['id'] != $actu ): ?>
                    <div class="d-flex rounded overflow-hidden mb-3">
                        <img class="img-fluid" src="img/<?= $act['photo']  ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                        <a href="detail.php?id=<?php echo $act['id'];?>" class="h5 d-flex align-items-center bg-light px-3 mb-0"><?= $act['descriptions']  ?>
                        </a>
                    </div>
                    <?php endif ;
                            endforeach ?>
                </div>
                <!-- Recent Post End -->

                <!-- Image Start -->
                
                <!-- Image End -->

                <!-- Tags Start -->
                >
                <!-- Tags End -->

                <!-- Plain Text Start -->
               
                <!-- Plain Text End -->
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    <?php require('footer.php') ?>

    <!-- Footer End -->


    <!-- Back to Top -->


    <!-- Template Javascript -->
   
</body>

</html>