<?php
session_start();

if (isset($_SESSION['account'])) {
    include('connexion.php');

    $user_id = $_SESSION['account']['id'];
    $sql_departements = "SELECT id, nom FROM departement";
    $result_departements = $conn->query($sql_departements);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date_naissance = $_POST['date_naissance'];
        $lieu_naissance = $_POST['lieu_naissance'];
        $email = $_POST['email'];
        $sexe = $_POST['sexe'];
        $situation_familiale = $_POST['situation_familiale'];
        $nombre_enfants = $_POST['nombre_enfants'];
        $cin = $_POST['cin'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $date_debut = $_POST['date_debut'];
        $departement = $_POST['departement'];
        $position = $_POST['position'];
        $statut = $_POST['statut'];
        $salaire = $_POST['salaire'];
        $banque = $_POST['banque'];


        $ancien_mot_de_passe = md5($_POST['ancien_mot_de_passe']);
        $nouveau_mot_de_passe = md5($_POST['nouveau_mot_de_passe']);


        // Requête SQL pour récupérer l'ancien mot de passe de l'utilisateur
        $sql = "SELECT password FROM accounts WHERE id = $user_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $mot_de_passe_db = $row['password'];

            if ($ancien_mot_de_passe === $mot_de_passe_db) {
                $sql_update = "UPDATE accounts SET nom='$nom', prenom='$prenom', date_naissance='$date_naissance', lieu_naissance='$lieu_naissance', email='$email', sexe='$sexe', situation_familiale='$situation_familiale', nombre_enfants='$nombre_enfants', cin='$cin', telephone='$telephone', adresse='$adresse', ville='$ville', date_debut='$date_debut', departement='$departement', position='$position', statut='$statut', salaire='$salaire', banque='$banque', password='$nouveau_mot_de_passe' WHERE id=$user_id";
            }
        }
        if (mysqli_query($conn, $sql_update)) {
            header('Location: index.php');
        } else {
            echo "Erreur lors de la mise à jour des informations du compte: " . mysqli_error($conn);
        }
    }

    $sql = "SELECT * FROM accounts WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $date_naissance = $row['date_naissance'];
        $lieu_naissance = $row['lieu_naissance'];
        $email = $row['email'];
        $sexe = $row['sexe'];
        $situation_familiale = $row['situation_familiale'];
        $nombre_enfants = $row['nombre_enfants'];
        $cin = $row['cin'];
        $telephone = $row['telephone'];
        $adresse = $row['adresse'];
        $ville = $row['ville'];
        $date_debut = $row['date_debut'];
        $departement = $row['departement'];
        $position = $row['position'];
        $statut = $row['statut'];
        $salaire = $row['salaire'];
        $banque = $row['banque'];


    } else {
        echo "Aucune information trouvée pour cet utilisateur.";
    }

    mysqli_close($conn);
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Mon compte</title>
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                                <li class="breadcrumb-item active">Mon compte</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Modifier mes informations personnelles</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <div class="card-body">

                                        <div class="row mb-3">
                                            <div class="form-group col-md-3">
                                                <label for="nom">Nom :</label>
                                                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom; ?>" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="prenom">Prénom :</label>
                                                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $prenom; ?>" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="date_naissance">Date de naissance :</label>
                                                <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo $date_naissance; ?>" placeholder="Enter Date de naissance" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="lieu_naissance">Lieu de naissance :</label>
                                                <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" value="<?php echo $lieu_naissance; ?>" placeholder="Enter lieu de naissance" required>
                                            </div>
                                        </div>




                                        <div class="row mb-3">
                                            <div class="form-group col-md-3">
                                                <label for="sexe">Sexe :</label>
                                                <select class="form-control" id="sexe" name="sexe" required>
                                                    <option value="Femme" <?php if ($sexe === "Femme") {
                                                                                echo "selected";
                                                                            } ?>>Femme</option>
                                                    <option value="Homme" <?php if ($sexe === "Homme") {
                                                                                echo "selected";
                                                                            } ?>>Homme</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="situation_familiale">Situation familiale :</label>
                                                <select class="form-control" name="situation_familiale" id="situation_familiale" required>
                                                    <option value="">Choisissez ...</option>
                                                    <option value="Célibataire" <?php if ($situation_familiale === "Célibataire") {
                                                                                    echo "selected";
                                                                                } ?>>Célibataire</option>
                                                    <option value="Marié(e)" <?php if ($situation_familiale === "Marié(e)") {
                                                                                    echo "selected";
                                                                                } ?>>Marié(e)</option>
                                                    <option value="Veuf(e)" <?php if ($situation_familiale === "Veuf(e)") {
                                                                                echo "selected";
                                                                            } ?>>Veuf(e)</option>
                                                    <option value="Divorcé(e)" <?php if ($situation_familiale === "Divorcé(e)") {
                                                                                    echo "selected";
                                                                                } ?>>Divorcé(e)</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nombre_enfants">Nombre d'enfants :</label>
                                                <input type="number" class="form-control" id="nombre_enfants" name="nombre_enfants" value="<?php echo $nombre_enfants; ?>" placeholder="Enter nombre d'enfants" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cin">CIN :</label>
                                                <input type="number" class="form-control" id="cin" name="cin" value="<?php echo $cin; ?>" placeholder="Enter CIN" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-3">
                                                <label for="telephone">Téléphone :</label>
                                                <input type="number" class="form-control" id="telephone" name="telephone" value="<?php echo $telephone; ?>" placeholder="Enter Téléphone" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="adresse">Adresse :</label>
                                                <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $adresse; ?>" placeholder="Enter adresse" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="ville">Ville :</label>
                                                <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $ville; ?>" placeholder="Enter ville" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="date_debut">Date de début :</label>
                                                <input type="date" class="form-control" id="date_debut" name="date_debut" value="<?php echo $date_debut; ?>" placeholder="Enter date de début" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-3">
                                                <label for="departement">Département :</label>
                                                <select class="form-control" name="departement" id="departement" required>
                                                    <?php
                                                    while ($row = $result_departements->fetch_assoc()) {
                                                        $selected = ($departement == $row['nom']) ? "selected" : "";
                                                        echo "<option value='" . $row['nom'] . "' $selected>" . $row['nom'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="position">Position :</label>
                                                <input type="text" class="form-control" id="position" name="position" value="<?php echo $position; ?>" placeholder="Enter position" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="statut">Statut :</label>
                                                <input type="text" class="form-control" id="statut" name="statut" value="<?php echo $statut; ?>" placeholder="Enter statut" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="salaire">Salaire :</label>
                                                <input type="number" class="form-control" id="salaire" name="salaire" value="<?php echo $salaire; ?>" placeholder="Enter salaire" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-3">
                                                <label for="banque">Banque :</label>
                                                <input type="text" class="form-control" id="banque" name="banque" value="<?php echo $banque; ?>" placeholder="Enter banque" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="email">Adresse E-mail :</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter email" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="ancien_mot_de_passe">Ancien mot de passe :</label>
                                                <input type="password" class="form-control" name="ancien_mot_de_passe" placeholder="Enter l'ancien mot de passe" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nouveau_mot_de_passe">Nouveau mot de passe :</label>
                                                <input type="password" class="form-control" name="nouveau_mot_de_passe" placeholder="Enter nouveau mot de passe" required>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success">Modifier</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->




                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
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