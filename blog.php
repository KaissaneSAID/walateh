<?php $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $pdo->query("SELECT * FROM actualite");
$actualite = $requete->fetchAll(PDO::FETCH_ASSOC);



?>


<style>
   
        .desc{
        max-height: 6em; /* ajustez la hauteur en fonction du nombre de lignes souhaité */
      overflow: hidden;
      text-align: justify;
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
.d-block:hover{
    color: #1D85FF;
}
</style>

<body>
    <!-- Topbar Start -->
   <?php require('header.php') ?>
    <!-- Navbar End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
    <?php if (!empty($actualite)):
            # code...
        ?>
        <div class="">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5">Actualités</h5>
            </div>
            <div class="row g-5">
                <?php foreach ($actualite as $actu): ?>
                    <div class="col-xl-3 col-lg-6">
                    <a href="detail.php?id=<?php echo $actu['id'];?>">

                        <div  class="bg-light card_equipement rounded overflow-hidden">
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
                                
                            </div>
                        </div>
                        </a>
                    </div>
                <?php endforeach ?>
               
                
            </div>
        </div>
        <?php else :?>
            <h1 style="color: rgba(123, 119, 119, 0.468);" class="text-center ">Il n'existe pas encore d'actualité</h1>
        <?php endif ?>
    </div>
    <!-- Blog End -->
    

    <!-- Footer Start -->
    <?php require('footer.php') ?>

    <!-- Footer End -->


    <!-- Back to Top -->
    
</body>

</html>