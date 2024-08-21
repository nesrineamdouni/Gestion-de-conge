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

  <title>Départements</title>
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
              <h3 class="m-0 text-dark">Liste de départements</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                <li class="breadcrumb-item active">Départements</li>
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

          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_ajouter">
            <i class="fas fa-plus"></i> &nbsp;Créer un département
          </button>
          <br><br>

          <!-- The Modal -->
          <div class="modal fade" id="myModal_ajouter">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"><i class="fas fa-plus"></i> &nbsp;Ajouter un nouveau département</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" action="crud_departements.php" method="POST">

                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="form-row">
                      <label for="validationDefault01">Nom :</label>
                      <input type="text" class="form-control" name="nom" placeholder="Veuillez entrer votre nom" required>
                      <label for="validationDefault02">Manager :</label>
                      <input type="text" class="form-control" name="manager" placeholder="Veuillez entrer votre manager" required>
                      <label for="validationDefaultUsername">Email :</label>
                      <input type="email" class="form-control" name="email" placeholder="Veuillez entrer votre email" aria-describedby="inputGroupPrepend2" required>
                      <label for="validationDefault01">Téléphone :</label>
                      <input type="text" class="form-control" name="telephone" placeholder="Veuillez entrer votre telephone" required>
                    </div>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="enregistrer">Ajouter</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>

                </form>

              </div>
            </div>
          </div>



          <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Manager</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sqlfetsh = "SELECT * FROM `departement`";
              $res = $conn->query($sqlfetsh);
              while ($row = $res->fetch_assoc()) {
              ?>
                <tr tr_id="<?php echo $row['id']; ?>">
                  <td>#<?php echo $row['id']; ?></td>
                  <td><?php echo $row['nom']; ?></td>
                  <td><?php echo $row['manager']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['telephone']; ?></td>
                  <td>
                    <button name='modifier_departement' class="btn btn-warning" data-toggle="modal" data-target="#myModal_update" id_departement="<?php echo $row['id']; ?>" nom="<?php echo  addslashes($row['nom']); ?>" manager="<?php echo  addslashes($row['manager']); ?>" email="<?php echo  addslashes($row['email']); ?>" telephone="<?php echo  addslashes($row['telephone']); ?>">
                      <i class="fas fa-pen"></i>
                    </button>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_supprimer" name='supprimer_departement' id_departement="<?php echo $row['id']; ?>">
                      <i class="fas fa-trash"></i>
                    </button>


                  </td>
                </tr>

              <?php } ?>
            </tbody>
          </table>


          <div class="modal fade" id="modal_supprimer">
            <div class="modal-dialog modal-small">
              <div class="modal-content">
                <div class="modal-header">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5 class="modal-title"><i class="fas fa-trash"></i>&nbsp;&nbsp;&nbsp;Supprimer ce département</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form role="form" action="crud_departements.php" method="POST">
                    <input type="hidden" id="s_id" name="s_id" value="">
                    <div class="card-body">
                      <p id="s_nom" name="s_nom">Êtes-vous sûr de vouloir supprimer ce département</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer">
                  <button type="submit" id="supprimer" name="supprimer" class="btn btn-danger">Supprimer</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->








          <!--   begin modal modifier departement
 -->
          <div class="modal fade" id="myModal_update">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"> <i class="fas fa-edit"></i> &nbsp;Modifier ce département</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" action="crud_departements.php" method="POST">
                  <input type="hidden" id="u_id" name="u_id" value="">
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="form-row">
                      <label for="validationDefault01">Nom :</label>
                      <input type="text" class="form-control" name="u_nom" id="u_nom" placeholder="Veuillez entrer votre nom" required>
                      <label for="validationDefault02">Manager :</label>
                      <input type="text" class="form-control" name="u_manager" id="u_manager" placeholder="Veuillez entrer votre manager" required>
                      <label for="validationDefaultUsername">Email :</label>
                      <input type="email" class="form-control" name="u_email" id="u_email" placeholder="Veuillez entrer votre email" aria-describedby="inputGroupPrepend2" required>
                      <label for="validationDefault01">Téléphone :</label>
                      <input type="text" class="form-control" name="u_telephone" id="u_telephone" placeholder="Veuillez entrer votre telephone" required>
                    </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="modifier">Modifier</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- end modal modifier departement -->

        </div><!--/. container-fluid -->
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

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
      $("[name='modifier_departement']").click(function() {
        var id = $(this).attr('id_employee');
        $("#u_nom").val($(this).attr('nom'));
        $("#u_manager").val($(this).attr('manager'));
        $("#u_email").val($(this).attr('email'));
        $("#u_telephone").val($(this).attr('telephone'));
        $("#u_id").val($(this).attr('id_departement'));
      });

      $("[name='supprimer_departement']").click(function() {
        var id = $(this).attr('id_departement');
        $("#s_id").val($(this).attr('id_departement'));
      });

    });
  </script>
</body>

</html>