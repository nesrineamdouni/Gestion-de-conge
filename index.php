<?php
session_start();

if (isset($_SESSION['account'])) {
  include('connexion.php');

  // Requête SQL pour compter le nombre total d'utilisateurs
  $sqlCountUsers = "SELECT COUNT(*) as total FROM accounts";
  $result = $conn->query($sqlCountUsers);
  $row = $result->fetch_assoc();
  $totalUsers = $row['total'];

  // Requête SQL pour compter le nombre total de demande de congée
  $sqlCountConge = "SELECT COUNT(*) as total FROM conge";
  $result = $conn->query($sqlCountConge);
  $row = $result->fetch_assoc();
  $totalConge = $row['total'];

  // Requête SQL pour compter le nombre total de demande de congée acceptée
  $sqlCountCongeAcceptee = "SELECT COUNT(*) as total FROM conge WHERE etat='Congé accepté'";
  $result = $conn->query($sqlCountCongeAcceptee);
  $row = $result->fetch_assoc();
  $totalCongeAcceptee = $row['total'];

  // Requête SQL pour compter le nombre total de départements
  $sqlCountDepartement = "SELECT COUNT(*) as total FROM departement";
  $result = $conn->query($sqlCountDepartement);
  $row = $result->fetch_assoc();
  $totalDepartement = $row['total'];
} else {
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Accueil</title>
  <?php
  include('link_css.php');
  ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include('header.php');
    ?>





    <?php
    include('aside.php');
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Accueil</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Accueil</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $totalUsers; ?></h3>

                  <p>Nombre d'utilisateurs</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $totalDepartement; ?></h3>

                  <p>Nombre de départements</p>
                </div>
                <div class="icon">
                  <i class="fas fa-sitemap"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $totalConge ?></h3>

                  <p>Nombre de congée</p>
                </div>
                <div class="icon">
                  <i class="far fa-calendar-alt"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $totalCongeAcceptee ?></h3>

                  <p>Demandes acceptées</p>
                </div>
                <div class="icon">
                  <i class="fas fa-check"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <?php
    include('footer.php');
    ?>

  </div>
  <!-- ./wrapper -->
  <?php
  include('link_js.php');
  ?>

</body>

</html>