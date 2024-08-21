<?php
session_start();
if (isset($_SESSION['account'])) {
  include('connexion.php');
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

  <title>Liste de demandes de congés</title>
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
              <h3 class="m-0 text-dark">Liste de congés</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                <li class="breadcrumb-item active">Liste de congés</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Button to Open the Modal -->


          <br><br>



          <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom Complet</th>
                <th>Date de départ</th>
                <th>Date de retour</th>
                <th>Type d'absence</th>
                <th>Type d'utilisateur</th>
                <th>Résultat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php



              $type_compte = $_SESSION['account']['type_compte'];

              if ($type_compte === 'admin') {
                $sqlfetsh = "SELECT * FROM `conge`";
              } elseif ($type_compte === 'rh') {
                $sqlfetsh = "SELECT * FROM `conge` WHERE type_compte <> 'rh'";
              }
              $res = $conn->query($sqlfetsh);



              while ($row = $res->fetch_assoc()) {
              ?>
                <tr tr_id="<?php echo $row['id']; ?>">
                  <td>#<?php echo $row['id']; ?></td>
                  <td><?php echo $row['nom']; ?> <?php echo $row['prenom']; ?></td>
                  <td><?php echo $row['date_depart']; ?></td>
                  <td><?php echo $row['date_retour']; ?></td>
                  <td><?php echo $row['type_absence']; ?></td>
                  <td><?php echo $row['type_compte']; ?></td>
                  <td><?php echo $row['etat']; ?></td>
                  <td>
                    <button class="btn btn-success" data-toggle="modal" id_conge="<?php echo $row['id']; ?>">
                      <i class="fas fa-check"></i>
                    </button>

                    <button type="button" class="btn btn-danger" data-toggle="modal" id_conge="<?php echo $row['id']; ?>">
                      <i class="fas fa-times"></i>

                    </button>


                  </td>
                </tr>

              <?php } ?>
            </tbody>
          </table>






          <?php
          include('footer.php');
          ?>

        </div>
        <!-- ./wrapper -->
        <?php
        include('link_js.php');
        ?>

        <script>
          $(document).ready(function() {
            $('#example').DataTable();



          });
        </script>
        <script>
          $(document).ready(function() {
            $('.btn-success').click(function() {
              var idConge = $(this).attr('id_conge');
              updateEtat(idConge, 'accepter');
            });

            $('.btn-danger').click(function() {
              var idConge = $(this).attr('id_conge');
              updateEtat(idConge, 'refuser');
            });

            function updateEtat(idConge, action) {
              $.ajax({
                type: 'POST',
                url: 'update_etat.php',
                data: {
                  id: idConge,
                  action: action
                },
                success: function(response) {
                  updateResultat(idConge, response);
                },
                error: function(xhr, status, error) {
                  console.error(error);
                }
              });
            }

            function updateResultat(idConge, etat) {

              $('#example').find('tr[tr_id="' + idConge + '"] td:nth-child(7)').text(etat);
            }
          });
        </script>
</body>

</html>