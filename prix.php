<?php require('header.php') ?>
<?php $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $pdo->query("SELECT * FROM services");
$service = $requete->fetchAll(PDO::FETCH_ASSOC);



?>
<body>
    <!-- Topbar Start -->
 <style>
    .price-carousel::after {
    position: absolute;
    content: "";
    width: 100%;
    height: 50%;
    bottom: 0;
    left: 0;
    background: var(--blue);
    border-radius: 8px 8px 50% 50%;
    z-index: -1;
}
 </style>
    <!-- Navbar End -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5">Tarifs</h5>
                <h1 class="display-4">Nos prix pour nos services</h1>
            </div>
            <div  class="owl-carousel price-carousel position-relative" style="padding: 0 45px 45px 45px;">
            <?php foreach ($service as $serv): ?>
                 <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img style="height:200px; width:100%;object-fit: cover;" class="img-fluid rounded-top" src="<?php echo $serv['photo'];?>" alt="">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                            <h4 style="color: #1D85FF;" class=""><?php echo $serv['titre'];?></h4>
                            <h3 class="display-4 text-white mb-0">
                                <?php echo $serv['prix'];?> FC
                            </h3>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p>Des experts dans le domaine</p>
                        <p>Une equipe dynamique</p>
                        <p>Travail reussie</p>
                        <p>Meilleure service dans le marché</p>
                    </div>
                </div>
               <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->


    <!-- Appointment Start -->
    
    <!-- Appointment End -->


    <!-- Team Start -->
   
    <!-- Team End -->


    <!-- Footer Start -->
   
    <!-- Footer End -->


    <!-- Back to Top -->
    <?php require('footer.php') ?>

</body>

</html>