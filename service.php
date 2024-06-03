<?php require('header.php')?>
<?php $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $pdo->query("SELECT * FROM services");
$service = $requete->fetchAll(PDO::FETCH_ASSOC);



?>
<style>


.image-container img {
  transition: transform 0.5s ease;
}

.image-container:hover img {
  transform: scale(1.2); /* ajustez la valeur selon l'agrandissement souhaité */
}
</style>
<body>
    <!-- Topbar Start -->
 
    <!-- Navbar End -->
    

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5">Services</h5>
                <h1  class="display-4">Nos meilleures services</h1>
            </div>
            <div class="row g-5">
            <?php foreach ($service as $serv): ?>
                <div class="col-lg-4 col-md-6">
                   
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
    </div>
  
    <!-- Services End -->


    <!-- Appointment Start -->
   
    <!-- Appointment End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5">Temoignages</h5>
                <h1 class="display-4">Les clients parlent de nos services</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-1.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i style="color: #1D85FF;" class="fa fa-quote-left fa-2x "></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="w-25 mx-auto">
                            <h3>Nom du client</h3>
                            <h6 style="color: #1D85FF;" class="fw-normal  mb-3">Profession</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-2.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i style="color: #1D85FF;" class="fa fa-quote-left fa-2x "></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="w-25 mx-auto">
                            <h3>Nom du client</h3>
                            <h6 style="color: #1D85FF;" class="fw-normal  mb-3">Profession</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-3.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i style="color: #1D85FF;" class="fa fa-quote-left fa-2x "></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="w-25 mx-auto">
                            <h3>Nom du client</h3>
                            <h6 style="color: #1D85FF;" class="fw-normal  mb-3">Profession</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
<?php require('footer.php')?>
  
    <!-- Footer End -->


    <!-- Back to Top -->
  
</body>

</html>