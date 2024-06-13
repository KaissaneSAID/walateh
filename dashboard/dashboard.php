

<?php  $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $pdo->query("SELECT * FROM membres");
$membre = $requete->fetchAll(PDO::FETCH_ASSOC); 

$requetes = $pdo->query("SELECT * FROM contact");
$contact = $requetes->fetchAll(PDO::FETCH_ASSOC); 

$nbmbre = $pdo->prepare("SELECT COUNT(*) as nbmbre FROM membres");
$nbmbre->execute();
$nbmbre = $nbmbre->fetchColumn();

$nbactu = $pdo->prepare("SELECT COUNT(*) as nbactu FROM actualite");
$nbactu->execute();
$nbactu = $nbactu->fetchColumn();

$nbequi = $pdo->prepare("SELECT COUNT(*) as nbequi FROM equipement");
$nbequi->execute();
$nbequi = $nbequi->fetchColumn();

$nbserv = $pdo->prepare("SELECT COUNT(*) as nbserv FROM services");
$nbserv->execute();
$nbserv = $nbserv->fetchColumn();
?>

<div class="main-wrapper">
    <?php require('slidebar.php') ?>

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Bienvenue</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Acceuil</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>actualite</h6>
                                        <h3><?= "$nbactu "?></h3>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>equipement</h6>
                                        <h3><?= "$nbequi "?></h3>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>membres</h6>
                                        <h3><?= "$nbmbre "?>
                                        </h3>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>service</h6>
                                        <h3><?= "$nbserv "?></h3>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
                <div class="row">
                    <div class="col-xl-6 d-flex">

                        <div class="card flex-fill student-space comman-shadow">
                            <div class="card-header d-flex align-items-center">
                                <h5 class="card-title">membres</h5>
                                <ul class="chart-list-out student-ellips">
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table star-student table-hover table-center table-borderless table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom et prenom</th>
                                                <th class="text-center">telephone</th>
                                                <th class="text-center">email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($membre as $mbr): ?>
                                            <tr>
                                                <td class="text-nowrap">
                                                    <div><?= $mbr['id'] ?></div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <a href="profile.html">
                                                        <img class="rounded-circle"
                                                            src="../img/<?= $mbr['photo'] ?>" width="25"
                                                            alt="Star Students">
                                                            <?= $mbr['nom'] ?>
                                                    </a>
                                                </td>
                                                <td class="text-center"><?= $mbr['tel'] ?></td>
                                                <td class="text-center"><?= $mbr['email'] ?></td>
                                                <td class="text-end">
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <div class="col-xl-6 d-flex">
                    <div class="card flex-fill student-space comman-shadow">
                            <div class="card-header d-flex align-items-center">
                                <h5 class="card-title">messages</h5>
                                <ul class="chart-list-out student-ellips">
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table star-student table-hover table-center table-borderless table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nom et prenom</th>
                                                <th class="text-center">email</th>
                                                <th class="text-center">sujet</th>
                                                <th class="text-center">text</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($contact as $contacts): ?>
                                            <tr>
                                                <td class="text-nowrap">
                                                    <div><?= $contacts['nom'] ?></div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <a href="profile.html">
                                                        
                                                            <?= $contacts['email'] ?>
                                                    </a>
                                                </td>
                                                <td class=""><?= $contacts['sujet'] ?></td>
                                                <td class=""><?= $contacts['messages'] ?></td>
                                                <td class="text-end">
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    

                    </div>
                </div>

                
            </div>
           
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>