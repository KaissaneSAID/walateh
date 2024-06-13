    <?php require('header.php')?>
    <?php $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $requete = $pdo->query("SELECT * FROM services");
    $service = $requete->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST["submit"])) {
        if (!empty($_POST["commentaire"]) and !empty($_POST["nom"] and !empty($_POST["profession"]))) {
            $photo_path = 'img/'; // Emplacement où vous stockez les photos (ajusté le chemin)
            $photo_name = $_FILES['photo']['name'];
            $photo_tmp = $_FILES['photo']['tmp_name'];

            // Assurez-vous que le dossier spécifié existe
            if (!is_dir($photo_path)) {
                mkdir($photo_path, 0777, true);
            }

            move_uploaded_file($photo_tmp, $photo_path . $photo_name);
            
            $commentaire_texte = $_POST["commentaire"];
            $libelle = $_POST["nom"];
            $profession = $_POST["profession"];

    
        // Enregistrez le commentaire dans la base de données
        $requete = $pdo->prepare("INSERT INTO client (nomClient,profession,images,texte) VALUES (?, ?, ?, ?)");
        $requete->execute([$libelle,$profession,$photo_name, $commentaire_texte]);
    }
    }
    $requetes = $pdo->query("SELECT * FROM client ");
        $services = $requetes->fetchAll(PDO::FETCH_ASSOC);
        
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
                    
                        <div style="position: relative;height: 400px;text-align:justify;" class="bg-light rounded overflow-hidden card_equipement   bg-light rounded d-flex flex-column   ">
                                    <div class="image-container">
                                    <img style="height:150px; width:100%;object-fit: cover;" class="img-fluid " src="img/<?php echo $serv['photo'];?> " alt="">
                                    </div>
                                    <div class="p-4 mb-2">
                                    <h5 class="mb-2"><?php echo $serv['titre'];?></h5>
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
                            
                        <?php foreach ($services as $serv): ?>
                            <div class="testimonial-item text-center">
                                <div class="position-relative mb-5">
                                    <img class="img-fluid rounded-circle mx-auto" src="img/<?php echo $serv['images'];?>" alt="">
                                    <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                        <i style="color: #1D85FF;" class="fa fa-quote-left fa-2x "></i>
                                    </div>
                                </div>
                                <p class="fs-4 fw-normal" ><?php echo $serv['texte'];?></p>
                                <hr class="w-25 mx-auto">
                                <h3><?php echo $serv['nomClient'];?></h3>
                                <h6 style="color: #1D85FF;" class="fw-normal  mb-3"><?php echo $serv['profession'];?></h6>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div>
            <div  class="bg-light rounded p-5">
                            <h4 style="color: #1D85FF;" class="d-inline-block  text-uppercase border-bottom border-5 border-white mb-4">laissez nous votre avis</h4>
                            <form method="post" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control bg-white border-0" placeholder="Votre nom" name="nom" style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control bg-white border-0" placeholder="Votre profession" name="profession" style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <input type="file" class="form-control bg-white border-0"  name="photo" style="height: 55px;">
                                    </div>
                                    
                                    <div class="col-12">
                                        <textarea class="form-control bg-white border-0" rows="5" placeholder="Commentaire" name ="commentaire"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button style="background-color:#1D85FF;" class="btn btn-primary w-100 py-3" name="submit" type="submit">Ajouté</button>
                                    </div>
                                </div>
                            </form>
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