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

  <title>Congés</title>
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
              <h3 class="m-0 text-dark">Mes demandes de congés</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                <li class="breadcrumb-item active">Congés</li>
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
            <i class="fas fa-plus"></i> &nbsp;Créer un congé
          </button>
          <br><br>

          <!-- The Modal -->
          <div class="modal fade" id="myModal_ajouter">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"><i class="fas fa-plus"></i> &nbsp;Ajouter un nouveau congé</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" action="crud_conge.php" method="POST">

                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="form-row">
                      <label for="validationDefault01">Date de départ :</label>
                      <input type="date" class="form-control" name="date_depart" required>
                      <label for="validationDefault02">Date de retour :</label>
                      <input type="date" class="form-control" name="date_retour" required>
                      <label for="validationDefaultUsername">Type d'absence :</label>
                      <input type="text" class="form-control" name="type_absence" placeholder="Veuillez entrer le type d'absence" aria-describedby="inputGroupPrepend2" required>
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
                <th>Date de départ</th>
                <th>Date de retour</th>
                <th>Type d'absence</th>
                <th>Résultat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id_utilisateur = $_SESSION['account']['id'];
              $sqlfetsh = "SELECT * FROM `conge` WHERE id_utilisateur=$id_utilisateur";
              $res = $conn->query($sqlfetsh);
              while ($row = $res->fetch_assoc()) {
              ?>
                <tr tr_id="<?php echo $row['id']; ?>">
                  <td>#<?php echo $row['id']; ?></td>
                  <td><?php echo $row['date_depart']; ?></td>
                  <td><?php echo $row['date_retour']; ?></td>
                  <td><?php echo $row['type_absence']; ?></td>
                  <td><?php echo $row['etat']; ?></td>
                  <td>
                    <button name='modifier_conge' class="btn btn-warning" data-toggle="modal" data-target="#myModal_update" id_conge="<?php echo $row['id']; ?>" date_depart="<?php echo  addslashes($row['date_depart']); ?>" date_retour="<?php echo  addslashes($row['date_retour']); ?>" type_absence="<?php echo  addslashes($row['type_absence']); ?>">
                      <i class="fas fa-pen"></i>
                    </button>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_supprimer" name='supprimer_conge' id_conge="<?php echo $row['id']; ?>">
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
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5 class="modal-title"><i class="fas fa-trash"></i>&nbsp;&nbsp;&nbsp;Supprimer ce congé</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form role="form" action="crud_conge.php" method="POST">
                    <input type="hidden" id="s_id" name="s_id" value="">
                    <div class="card-body">
                      <p id="s_nom" name="s_nom">Êtes-vous sûr de vouloir supprimer ce congé</p>
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
                  <h4 class="modal-title"> <i class="fas fa-edit"></i> &nbsp;Modifier ce congé</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" action="crud_conge.php" method="POST">
                  <input type="hidden" id="u_id" name="u_id" value="">
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="form-row">

                      <label for="validationDefault01">Date de départ :</label>
                      <input type="date" class="form-control" name="u_date_depart" id="u_date_depart" required>
                      <label for="validationDefault02">Date de retour :</label>
                      <input type="date" class="form-control" name="u_date_retour" id="u_date_retour" required>
                      <label for="validationDefaultUsername">Type d'absence :</label>
                      <input type="text" class="form-control" name="u_type_absence" id="u_type_absence" placeholder="Veuillez entrer le type d'absence" aria-describedby="inputGroupPrepend2" required>
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

      $("[name='modifier_conge']").click(function() {
        var id = $(this).attr('id_conge');
        $("#u_date_depart").val($(this).attr('date_depart'));
        $("#u_date_retour").val($(this).attr('date_retour'));
        $("#u_type_absence").val($(this).attr('type_absence'));
        $("#u_id").val($(this).attr('id_conge'));
      });

      $("[name='supprimer_conge']").click(function() {
        var id = $(this).attr('id_conge');
        $("#s_id").val($(this).attr('id_conge'));
      });

    });
  </script>
</body>

</html>