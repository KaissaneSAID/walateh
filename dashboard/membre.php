
<?php  $pdo = new PDO("mysql:host=localhost;dbname=walatech", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $pdo->query("SELECT * FROM membres");
$membre = $requete->fetchAll(PDO::FETCH_ASSOC); ?>
<style>
          .desc{
        max-width: 3em; /* ajustez la hauteur en fonction du nombre de lignes souhaité */
      overflow: hidden;
       
    }
    </style>
    <div class="main-wrapper">

    <?php require('slidebar.php') ?>



    <div class="page-wrapper">
    <div class="content container-fluid">

    <div class="page-header">
    <div class="row">
    <div class="col-sm-12">
    <div class="page-sub-header">
    <h3 class="page-title">membres</h3>
    <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">dashboard</a></li>
    <li class="breadcrumb-item active">Tous les membres</li>
    </ul>
    </div>
    </div>
    </div>
    </div>

    
    <div class="row">
    <div class="col-sm-12">
    <div class="card card-table comman-shadow">
    <div class="card-body">

    <div class="page-header">
    <div class="row align-items-center">
    <div class="col">
    <h3 class="page-title">membres</h3>
    </div>
    <div class="col-auto text-end float-end ms-auto download-grp">
    <a href="ajoutmembre.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
    </div>
    </div>
    </div>

    <div class="table-responsive">
    <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
    <thead class="student-thread">
    <tr>
    <th>
    <div class="form-check check-tables">
    </div>
    </th>
    <th>ID</th>
    <th>Photo</th>
    <th>Nom et prenom</th>
    <th>poste</th>
    <th>Telephone</th>
    <th>Email</th>
    <th>Description</th>
    <th class="text-end">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($membre as $mbr): ?>
    <tr>
    <td>
    <div class="form-check check-tables">
    </div>
    </td>
    <td><?= $mbr['id'] ?></td>
    <td>        <a href="student-details.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="../img/<?= $mbr['photo'] ?>" alt="User Image"></a>
        </td>
    <td>
    <h2 class="table-avatar">
        <a href=""><?= $mbr['nom'] ?></a>
        </h2>
        </td>
        
    <td><?= $mbr['poste'] ?></td>
    <td><?= $mbr['tel'] ?></td>
    <td><?= $mbr['email'] ?></td>
    <td class="desc"><?= $mbr['descriptions'] ?></td>
    <td class="text-end">
    <div class="actions ">
    <a href="delete-membre.php?id=<?php echo $mbr['id'];?>" class="btn btn-sm bg-success-light me-2 "onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet element ?')">
    <i class="feather-delete"></i>
    </a>
    <a href="edit-membre.php?id=<?php echo $mbr['id'];?>" class="btn btn-sm bg-danger-light">
    <i class="feather-edit"></i>
    </a>
    </div>
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

    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <script src="assets/js/script.js"></script>
    </body>
    </html>