
<?php 
$pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $pdo->query("SELECT * FROM actualite LIMIT 4");
$actualite = $requete->fetchAll(PDO::FETCH_ASSOC);
$requete = $pdo->query("SELECT * FROM services LIMIT 4");
$service = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <!-- Topbar Start -->
    
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php require('header.php') ?>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <style>
        

.image-container img {
  transition: transform 0.5s ease;
}

.image-container:hover img {
  transform: scale(1.2); /* ajustez la valeur selon l'agrandissement souhaité */
}
    </style>
    <div class="   mb-5 hero-header">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/developpement_application_web.avif" height="50%" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/kit-solaire-autonome.jpg" height="50%" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/Formation informatique01.jpeg"height="50%" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">precedent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">suivant</span>
            </button>
          </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid ">
        <div class="containers">
            <div class="row gx-5">
                
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h5 style="color:#1D85FF ;" class="d-inline-block text-uppercase border-bottom border-5">A propos de nous</h5>
                    </div>
                    <p>La société WALATECH est une société des Nouvelles technologies qui accompagne les entreprises dans les domaines informatiques et télécom pour fournir des services à valeur ajoutée en sous-traitant avec d’autres sociétés ou des opérateurs pour répondre les exigences et besoins de ses clients.</p>
                    <div class="col-5">
                       <a href="about.php"> <button style="background-color: #1D85FF; color: white;"  class="btn  w-100 py-3" type="submit">Voir plus</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="containers">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5">Actualité</h5>
                <h1 class="display-4">Nos dernieres Actualité</h1>
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
                                <p class="m-0"><?php echo $actu['descriptions'];?></p>
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
               
                <div class="col-12 text-center">
                <a href="blog.php"> <button style="background-color: #1D85FF; color: white;" class="btn py-3 px-5">Voir plus</button></a>
                </div>
            </div>
        </div> 
        <div class="containers">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5">Services</h5>
                <h1 class="display-4">Nos Recents services</h1>
            </div>
            <div class="row g-5">
            <?php foreach ($service as $serv): ?>
                <div class="col-lg-3 col-md-6">
                   
                    <div style="position: relative;
    height: 400px;
    
    " class="bg-light rounded overflow-hidden   bg-light rounded d-flex flex-column   text-center">
                                  <div class="image-container">
                                  <img style="height:150px; width:100%;object-fit: cover;" class="img-fluid " src="<?php echo $serv['photo'];?> " alt="">
                                  </div>
                                  <div class="p-4 mb-2">
                                  <h4 class="mb-3"><?php echo $serv['titre'];?></h4>
                        <p class="m-0"><?php echo $serv['descriptions'];?></p>
                                  </div>
                                 
                              </div>
                </div>
              <?php endforeach ?>
            </div>
            
        </div>
        <div class="col-12 text-center">
                <a href="service.php"> <button style="background-color: #1D85FF; color: white;" class="btn py-3 px-5">Voir plus</button></a>
                </div>
    </div>
    <!-- Services End -->


    <!-- Appointment Start -->
    
    <!-- Appointment End -->


    <!-- Pricing Plan Start -->
   
    <!-- Pricing Plan End -->


    <!-- Team Start -->
    
    <!-- Team End -->


    <!-- Search Start -->
   
    <!-- Search End -->


    <!-- Testimonial Start -->
 
    <!-- Blog End -->
    

    <!-- Footer Start -->
    <?php require('footer.php') ?>
    
    <!-- Footer End -->


    <!-- Back to Top -->
    
</body>

</html>