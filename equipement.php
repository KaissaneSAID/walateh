<?php require('header.php')?>
<?php $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $pdo->query("SELECT * FROM equipement");
$equipement = $requete->fetchAll(PDO::FETCH_ASSOC);



?>
<style>


.image-container img {
  transition: transform 0.5s ease;
}

.image-container:hover img {
  transform: scale(1.2); /* ajustez la valeur selon l'agrandissement souhaité */
}

.prix {
    content: "";
    width: 100%;
    height: 50%;
    background: var(--blue);
    border-radius: 0px 0px 50% 50%;
    
    }
    .prix h3{
        color: white;
        margin-top: 10px;
    }
</style>
<body>
    <!-- Topbar Start -->
 
    <!-- Navbar End -->
    

    <!-- equipements Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5">equipements</h5>
                <h1  class="display-4">Nos meilleures equipements</h1>
            </div>
            <div class="row g-5">
            <?php foreach ($equipement as $equi): ?>
                <div class="col-lg-3 col-md-6 ">
                   
                    <div style="position: relative;height: 400px;" class="bg-light rounded overflow-hidden card_equipement   bg-light rounded d-flex flex-column   text-center">
                        <div class="image-container">
                            <img style="height:200px; width:100%;object-fit: cover;" class="img-fluid " src="img/<?php echo $equi['photo'];?> " alt="">
                        </div>
                        <div class="p-4 mb-2">
                            <h4 class="mb-3 text-uppercase"><?php echo $equi['libelle'];?></h4>
                            <p class="m-0"><?php echo $equi['description'];?></p>
                        </div>
                         <div class=" prix"  style=" padding: 5px; " >
                           <h3>33000FC</h3> 
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
   
    <!-- Testimonial End -->


    <!-- Footer Start -->
<?php require('footer.php')?>
  
    <!-- Footer End -->


    <!-- Back to Top -->
  
</body>

</html>