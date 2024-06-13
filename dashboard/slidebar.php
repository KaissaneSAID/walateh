<?php 
session_start();

// Vérifiez si la session est active
if(!isset($_SESSION['connexion'])) {
    // Redirigez vers la page d'index
    header("Location: index.php");
    exit(); // Assurez-vous de terminer le script après la redirection
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


        <div class="header">

            <div class="header-left">
                <a href="../index.php" class="logo">
                    <img src="../img/LOGO_wala.jpg" alt="Logo" width="200" >
                <b class="h4 text-uppercase text-dark mt-4">walatech</b>
                </a>
                <a href="../index.php" class="logo logo-small">
                    <img src="../img/LOGO_wala.jpg" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

          
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">
               

                

                

                <li class="nav-item  has-arrow new-user-menus">
                    <a href="../index.php" class=" nav-link" >
                        <span class="user-img">
                              
                            <div class="user-text">
                                <h6>Acceder au site</h6>
                               
                            </div>
                        </span>
                    </a>
                   
                </li>
                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            
                            <div class="user-text">
                                <h6 class="text-uppercase"><?= $_SESSION['connexion']?></h6>
                                <p class="text-muted mb-0">Administrateur</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            
                            <div class="user-text">
                                <h6 class="text-uppercase"><?= $_SESSION['connexion']?></h6>
                                <p class="text-muted mb-0">Administrateur</p>
                            </div>
                        </div>                   
                        <a class="dropdown-item" href="logout.php">deconnexion</a>
                    </div>
                </li>

            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <li class=" ">
                            <a href="dashboard.php"><i class="feather-grid"></i> <span> Dashboard</span> </a>
                           
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-graduation-cap"></i> <span> Actualités</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="actualite.php">Liste actualités</a></li>
                                <li><a href="ajoutactualite.php">Ajout actualités</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Membres</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="membre.php">Liste membres</a></li>
                                <li><a href="ajoutmembre.php">Ajout membres</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-building"></i> <span> Services</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="service.php">Liste Services</a></li>
                                <li><a href="ajoutservice.php">Ajout Services</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-book-reader"></i> <span> Equipement</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="equipement.php">Liste Equipement</a></li>
                                <li><a href="ajoutequipement.php">Ajout Equipement</a></li>
                            </ul>
                        </li>
                 
                       
                        </li>
                    </ul>
                </div>
            </div>
        </div>


</body>
</html>