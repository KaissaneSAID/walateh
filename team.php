<?php require('headertwo.php') ;
 $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $pdo->query("SELECT * FROM membres");
$membre = $requete->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- Topbar Start -->
   
    <!-- Topbar End -->


    <!-- Navbar Start -->
    
    <!-- Navbar End -->

<style>
    .team-carousel .owl-nav .owl-prev,
.team-carousel .owl-nav .owl-next {
    position: relative;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
    background: var(--blue);
    border-radius: 45px;
    font-size: 22px;
    transition: .5s;
}
</style>
    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5">Les membres</h5>
            </div>
            <div class="owl-carousel team-carousel position-relative">
            <?php foreach ($membre as $mbr): ?>
                <div class="team-item">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="img/<?= $mbr['photo'] ?>" style="object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <h3><?= $mbr['nom'] ?></h3>
                                <h6 style="color: #1D85FF;" class="fw-normal fst-italic  mb-2"><?= $mbr['poste'] ?></h6>
                                <h6 style="color: #1D85FF;" class="fw-normal fst-italic  mb-2"><?= $mbr['tel'] ?></h6>
                                <h6 style="color: #1D85FF;" class="fw-normal fst-italic  mb-2"><?= $mbr['email'] ?></h6>
                                <p class="m-0"><?= $mbr['descriptions'] ?></p>
                            </div>
                            <div class="d-flex mt-auto border-top p-4">
                                <a style="background-color: #1D85FF; color:white" class="btn btn-lg  btn-lg-square rounded-circle me-3" href="<?= $mbr['instagram'] ?>"><i class="fab fa-instagram"></i></a>
                                <a style="background-color: #1D85FF; color:white" class="btn btn-lg  btn-lg-square rounded-circle me-3" href="<?= $mbr['facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Footer Start -->
   <?php require('footer.php') ?>
    <!-- Footer End -->


    <!-- Back to Top -->
  
</body>

</html>