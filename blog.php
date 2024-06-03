<?php $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $pdo->query("SELECT * FROM actualite");
$actualite = $requete->fetchAll(PDO::FETCH_ASSOC);



?>


<style>
   
        .desc{
        max-height: 5em; /* ajustez la hauteur en fonction du nombre de lignes souhaité */
      overflow: hidden;
      line-height: 1.2em;
       
    }
    .image-container {
  width: 100%; /* ajustez la largeur selon vos besoins */
 /* ajustez la hauteur selon vos besoins */
  overflow: hidden;
  position: relative;
}

.image-container img {
  transition: transform 0.5s ease;
}

.image-container:hover img {
  transform: scale(1.2); /* ajustez la valeur selon l'agrandissement souhaité */
}
</style>

<body>
    <!-- Topbar Start -->
   <?php require('header.php') ?>
    <!-- Navbar End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5">Actualités</h5>
            </div>
            <div class="row g-5">
                <?php foreach ($actualite as $actu): ?>
                    <div class="col-xl-3 col-lg-6">
                    <a href="detail.php?id=<?php echo $actu['id'];?>">

                        <div class="bg-light rounded overflow-hidden">
                            <div class="image-container">
                            <img style="height:250px; width:100%" class="img-fluid " src="img/<?= $actu['photo']?> " alt="">
                            </div>
                            <div class="p-4">
                                <a class="h3 d-block mb-3" href="detail.php?id=<?php echo $actu['id'];?>"><?php echo $actu['titre'];?></a>
                                <p class="m-0 desc"><?php echo $actu['descriptions'];?></p>
                            </div>
                            <div class="d-flex justify-content-between border-top p-4">
                                <div class="d-flex align-items-center">
                                    <small><?php echo $actu['dates'];?></small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>123</small>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php endforeach ?>
               
                
            </div>
        </div>
    </div>
    <!-- Blog End -->
    

    <!-- Footer Start -->
    <?php require('footer.php') ?>

    <!-- Footer End -->


    <!-- Back to Top -->
    
</body>

</html>