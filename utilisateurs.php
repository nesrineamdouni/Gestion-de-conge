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

  <title>Utilisateurs</title>
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
              <h3 class="m-0 text-dark">Liste des utilisateurs</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                <li class="breadcrumb-item active">Utilisateurs</li>
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
            <i class="fas fa-plus"></i> &nbsp;Ajouter un nouveau utilisateur
          </button>
          <br><br>
          <!-- début modal ajouter employee
 -->
          <!-- The Modal -->
          <div class="modal fade" id="myModal_ajouter">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"><i class="fas fa-plus"></i> &nbsp;Ajouter un nouveau utilisateur</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" action="crud_utilisateur.php" method="POST">

                  <!-- Modal body -->
                  <div class="modal-body">

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Nom :</label>
                        <input type="text" class="form-control" name="nom" placeholder="Veuillez entrer votre nom" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Prénom :</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Veuillez entrer votre prénom" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Date de naissance :</label>
                        <input type="date" class="form-control" name="date_naissance" placeholder="Veuillez entrer votre date de naissance" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Lieu de naissance :</label>
                        <input type="text" class="form-control" name="lieu_naissance" placeholder="Veuillez entrer votre lieu de naissance" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Sexe :</label>
                        <select class="form-control" name="sexe" required>
                          <option value="">Choisissez ...</option>
                          <option value="Femme">Femme</option>
                          <option value="Homme">Homme</option>
                        </select>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Situation familiale : </label>
                        <select class="form-control" name="situation_familiale" required>
                          <option value="">Choisissez ...</option>
                          <option value="Célibataire">Célibataire</option>
                          <option value="Marié(e)">Marié(e)</option>
                          <option value="Veuf(e)">Veuf(e)</option>
                          <option value="Divorcé(e)">Divorcé(e)</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Nombre d'enfants :</label>
                        <input type="text" class="form-control" name="nombre_enfants" placeholder="Veuillez entrer votre Nombre d'enfants" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">CIN :</label>
                        <input type="text" class="form-control" name="cin" placeholder="Veuillez entrer votre CIN" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Email :</label>
                        <input type="text" class="form-control" name="email" placeholder="Veuillez entrer votre email" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Téléphone :</label>
                        <input type="text" class="form-control" name="telephone" placeholder="Veuillez entrer votre téléphone" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Adresse :</label>
                        <input type="text" class="form-control" name="adresse" placeholder="Veuillez entrer votre adresse" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Ville :</label>
                        <input type="text" class="form-control" name="ville" placeholder="Veuillez entrer votre ville" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Date de début :</label>
                        <input type="date" class="form-control" name="date_debut" placeholder="Veuillez entrer votre date de début" required>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Département :</label>
                        <select class="form-control" name="departement" required>
                          <option value="">Choisissez ...</option>

                          <?php
                          $sqlfetsh = "SELECT * FROM `departement`";
                          $res = $conn->query($sqlfetsh);
                          while ($row = $res->fetch_assoc()) {
                          ?>
                            <option value="<?php echo $row['nom']; ?>"><?php echo $row['nom']; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Position :</label>
                        <input type="text" class="form-control" name="position" placeholder="Veuillez entrer votre position" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Statut :</label>
                        <input type="text" class="form-control" name="statut" placeholder="Veuillez entrer votre statut" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Salaire :</label>
                        <input type="number" step="0.01" class="form-control" name="salaire" placeholder="Veuillez entrer votre salaire" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Banque :</label>
                        <input type="text" class="form-control" name="banque" placeholder="Veuillez entrer votre banque" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Type utilisateur : </label>
                        <select class="form-control" name="type_compte" required>
                          <option value="">Choisissez ...</option>
                          <option value="admin">admin</option>
                          <option value="rh">rh</option>
                          <option value="employe">employe</option>
                        </select>
                      </div>
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
          <!-- fin modal ajouter employee
 -->
          <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom Complet</th>
                <th>Département</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Statut</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sqlfetsh = "SELECT * FROM `accounts`";
              $res = $conn->query($sqlfetsh);
              while ($row = $res->fetch_assoc()) {
              ?>
                <tr tr_id="<?php echo $row['id']; ?>">
                  <td>#<?php echo $row['id']; ?></td>
                  <td><?php echo $row['nom']; ?> <?php echo $row['prenom']; ?></td>
                  <td><?php echo $row['departement']; ?></td>
                  <td><?php echo $row['telephone']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['statut']; ?></td>
                  <td>
                    <button name='modifier_employee' class="btn btn-warning" data-toggle="modal" data-target="#myModal_update" id_employee="<?php echo $row['id']; ?>" nom="<?php echo  addslashes($row['nom']); ?>" prenom="<?php echo  addslashes($row['prenom']); ?>" date_naissance="<?php echo  addslashes($row['date_naissance']); ?>" lieu_naissance="<?php echo  addslashes($row['lieu_naissance']); ?>" sexe="<?php echo  addslashes($row['sexe']); ?>" situation_familiale="<?php echo  addslashes($row['situation_familiale']); ?>" nombre_enfants="<?php echo  addslashes($row['nombre_enfants']); ?>" cin="<?php echo  addslashes($row['cin']); ?>" email="<?php echo  addslashes($row['email']); ?>" telephone="<?php echo  addslashes($row['telephone']); ?>" adresse="<?php echo  addslashes($row['adresse']); ?>" ville="<?php echo  addslashes($row['ville']); ?>" date_debut="<?php echo  addslashes($row['date_debut']); ?>" departement="<?php echo  addslashes($row['departement']); ?>" position="<?php echo  addslashes($row['position']); ?>" statut="<?php echo  addslashes($row['statut']); ?>" salaire="<?php echo  addslashes($row['salaire']); ?>" banque="<?php echo  addslashes($row['banque']); ?>" type_compte="<?php echo  addslashes($row['type_compte']); ?>">
                      <i class="fas fa-pen"></i>
                    </button>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_supprimer" name='supprimer_employee' id_employee="<?php echo $row['id']; ?>">
                      <i class="fas fa-trash"></i>
                    </button>


                  </td>
                </tr>

              <?php } ?>
            </tbody>
          </table>

          <!-- début modal supprimer employee
 -->
          <div class="modal fade" id="modal_supprimer">
            <div class="modal-dialog modal-small">
              <div class="modal-content">
                <div class="modal-header">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5 class="modal-title"><i class="fas fa-trash"></i>&nbsp;&nbsp;&nbsp;Supprimer cet utilisateur</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form role="form" action="crud_utilisateur.php" method="POST">
                    <input type="hidden" id="s_id" name="s_id" value="">
                    <div class="card-body">
                      <p id="s_nom" name="s_nom">Êtes-vous sûr de vouloir supprimer cet utilisateur</p>
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
          <!-- fin modal supprimer employee
 -->

          <!--   début modal modifier employee
 -->
          <div class="modal fade" id="myModal_update">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"> <i class="fas fa-edit"></i> &nbsp;Modifier cet utilisateur</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" action="crud_utilisateur.php" method="POST">
                  <input type="hidden" id="u_id" name="u_id" value="">

                  <!-- Modal body -->
                  <div class="modal-body">

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Nom :</label>
                        <input type="text" class="form-control" name="u_nom" id="u_nom" placeholder="Veuillez entrer votre nom" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Prénom :</label>
                        <input type="text" class="form-control" name="u_prenom" id="u_prenom" placeholder="Veuillez entrer votre prénom" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Date de naissance :</label>
                        <input type="date" class="form-control" name="u_date_naissance" id="u_date_naissance" placeholder="Veuillez entrer votre date de naissance" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Lieu de naissance :</label>
                        <input type="text" class="form-control" name="u_lieu_naissance" id="u_lieu_naissance" placeholder="Veuillez entrer votre lieu de naissance" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Sexe :</label>
                        <select class="form-control" name="u_sexe" id="u_sexe" required>
                          <option value="">Choisissez ...</option>
                          <option value="Femme">Femme</option>
                          <option value="Homme">Homme</option>
                        </select>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Situation familiale : </label>
                        <select class="form-control" name="u_situation_familiale" id="u_situation_familiale" required>
                          <option value="">Choisissez ...</option>
                          <option value="Célibataire">Célibataire</option>
                          <option value="Marié(e)">Marié(e)</option>
                          <option value="Veuf(e)">Veuf(e)</option>
                          <option value="Divorcé(e)">Divorcé(e)</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Nombre d'enfants :</label>
                        <input type="text" class="form-control" name="u_nombre_enfants" id="u_nombre_enfants" placeholder="Veuillez entrer votre Nombre d'enfants" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">CIN :</label>
                        <input type="text" class="form-control" name="u_cin" id="u_cin" placeholder="Veuillez entrer votre CIN" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Email :</label>
                        <input type="text" class="form-control" name="u_email" id="u_email" placeholder="Veuillez entrer votre email" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Téléphone :</label>
                        <input type="text" class="form-control" name="u_telephone" id="u_telephone" placeholder="Veuillez entrer votre téléphone" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Adresse :</label>
                        <input type="text" class="form-control" name="u_adresse" id="u_adresse" placeholder="Veuillez entrer votre adresse" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Ville :</label>
                        <input type="text" class="form-control" name="u_ville" id="u_ville" placeholder="Veuillez entrer votre ville" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Date de début :</label>
                        <input type="date" class="form-control" name="u_date_debut" id="u_date_debut" placeholder="Veuillez entrer votre date de début" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Département :</label>
                        <select class="form-control" name="u_departement" id="u_departement" required>
                          <option value="">Choisissez ...</option>

                          <?php
                          $sqlfetsh = "SELECT * FROM `departement`";
                          $res = $conn->query($sqlfetsh);
                          while ($row = $res->fetch_assoc()) {
                          ?>
                            <option value="<?php echo $row['nom']; ?>"><?php echo $row['nom']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Position :</label>
                        <input type="text" class="form-control" name="u_position" id="u_position" placeholder="Veuillez entrer votre position" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Statut :</label>
                        <input type="text" class="form-control" name="u_statut" id="u_statut" placeholder="Veuillez entrer votre statut" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Salaire :</label>
                        <input type="number" step="0.01" class="form-control" name="u_salaire" id="u_salaire" placeholder="Veuillez entrer votre salaire" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Banque :</label>
                        <input type="text" class="form-control" name="u_banque" id="u_banque" placeholder="Veuillez entrer votre banque" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationDefaultUsername">Type utilisateur : </label>
                        <select class="form-control" name="u_type_compte" id="u_type_compte" required>
                          <option value="">Choisissez ...</option>
                          <option value="admin">admin</option>
                          <option value="rh">rh</option>
                          <option value="employe">employe</option>
                        </select>
                      </div>
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
          <!-- fin modal modifier employee -->

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
      $("[name='modifier_employee']").click(function() {
        var id = $(this).attr('id_employee');
        $("#u_nom").val($(this).attr('nom'));
        $("#u_prenom").val($(this).attr('prenom'));
        $("#u_date_naissance").val($(this).attr('date_naissance'));
        $("#u_lieu_naissance").val($(this).attr('lieu_naissance'));
        $("#u_sexe").val($(this).attr('sexe'));
        $("#u_situation_familiale").val($(this).attr('situation_familiale'));
        $("#u_nombre_enfants").val($(this).attr('nombre_enfants'));
        $("#u_cin").val($(this).attr('cin'));
        $("#u_email").val($(this).attr('email'));
        $("#u_telephone").val($(this).attr('telephone'));
        $("#u_adresse").val($(this).attr('adresse'));
        $("#u_ville").val($(this).attr('ville'));
        $("#u_date_debut").val($(this).attr('date_debut'));
        $("#u_departement").val($(this).attr('departement'));
        $("#u_position").val($(this).attr('position'));
        $("#u_statut").val($(this).attr('statut'));
        $("#u_salaire").val($(this).attr('salaire'));
        $("#u_banque").val($(this).attr('banque'));
        $("#u_type_compte").val($(this).attr('type_compte'));
        $("#u_id").val($(this).attr('id_employee'));
      });

      $("[name='supprimer_employee']").click(function() {
        var id = $(this).attr('id_employee');
        $("#s_nom").val($(this).attr('nom'));
        $("#s_id").val($(this).attr('id_employee'));
      });

    });
  </script>
</body>

</html>