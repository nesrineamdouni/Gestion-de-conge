<?php
include('connexion.php');
if (isset($_REQUEST['enregistrer'])) {
    $nom = addslashes($_REQUEST['nom']);
    $prenom = addslashes($_REQUEST['prenom']);
    $date_naissance = addslashes($_REQUEST['date_naissance']);
    $lieu_naissance = addslashes($_REQUEST['lieu_naissance']);
    $sexe = addslashes($_REQUEST['sexe']);
    $situation_familiale = addslashes($_REQUEST['situation_familiale']);
    $nombre_enfants = addslashes($_REQUEST['nombre_enfants']);
    $cin = addslashes($_REQUEST['cin']);
    $email = addslashes($_REQUEST['email']);
    $telephone = addslashes($_REQUEST['telephone']);
    $adresse = addslashes($_REQUEST['adresse']);
    $ville = addslashes($_REQUEST['ville']);
    $date_debut = addslashes($_REQUEST['date_debut']);
    $departement = addslashes($_REQUEST['departement']);
    $position = addslashes($_REQUEST['position']);
    $statut = addslashes($_REQUEST['statut']);
    $salaire = addslashes($_REQUEST['salaire']);
    $banque = addslashes($_REQUEST['banque']);
    $type_compte = addslashes($_REQUEST['type_compte']);

    $sql = "INSERT INTO `accounts` (`nom`, `prenom`, `date_naissance`, `lieu_naissance`, `sexe`, `situation_familiale`, `nombre_enfants`, `cin`, `email`, `telephone`, `adresse`, `ville`, `date_debut`, `departement`, `position`, `statut`, `salaire`, `banque`, `type_compte`) VALUES ('$nom', '$prenom', '$date_naissance', '$lieu_naissance', '$sexe', '$situation_familiale', '$nombre_enfants', '$cin', '$email', '$telephone', '$adresse', '$ville', '$date_debut', '$departement', '$position', '$statut', '$salaire', '$banque', '$type_compte');";
    $conn->query($sql);
    header("location: utilisateurs.php");
}

if (isset($_REQUEST['modifier'])) {
    $u_id = addslashes($_REQUEST['u_id']);
    $u_nom = addslashes($_REQUEST['u_nom']);
    $u_prenom = addslashes($_REQUEST['u_prenom']);
    $u_date_naissance = addslashes($_REQUEST['u_date_naissance']);
    $u_lieu_naissance = addslashes($_REQUEST['u_lieu_naissance']);
    $u_sexe = addslashes($_REQUEST['u_sexe']);
    $u_situation_familiale = addslashes($_REQUEST['u_situation_familiale']);
    $u_nombre_enfants = addslashes($_REQUEST['u_nombre_enfants']);
    $u_cin = addslashes($_REQUEST['u_cin']);
    $u_email = addslashes($_REQUEST['u_email']);
    $u_telephone = addslashes($_REQUEST['u_telephone']);
    $u_adresse = addslashes($_REQUEST['u_adresse']);
    $u_ville = addslashes($_REQUEST['u_ville']);
    $u_date_debut = addslashes($_REQUEST['u_date_debut']);
    $u_departement = addslashes($_REQUEST['u_departement']);
    $u_position = addslashes($_REQUEST['u_position']);
    $u_statut = addslashes($_REQUEST['u_statut']);
    $u_salaire = addslashes($_REQUEST['u_salaire']);
    $u_banque = addslashes($_REQUEST['u_banque']);
    $u_type_compte = addslashes($_REQUEST['u_type_compte']);
    $sql = "UPDATE `accounts` SET `nom` = '$u_nom', `prenom` = '$u_prenom', `date_naissance` = '$u_date_naissance', `lieu_naissance` = '$u_lieu_naissance', `sexe` = '$u_sexe', `situation_familiale` = '$u_situation_familiale', `nombre_enfants` = '$u_nombre_enfants', `cin` = '$u_cin', `email` = '$u_email', `telephone` = '$u_telephone', `adresse` = '$u_adresse', `ville` = '$u_ville', `date_debut` = '$u_date_debut', `departement` = '$u_departement', `position` = '$u_position', `statut` = '$u_statut', `salaire` = '$u_salaire', `banque` = '$u_banque', `type_compte` = '$u_type_compte' WHERE `accounts`.`id` = $u_id;";
    $conn->query($sql);
    header("location: utilisateurs.php");
}

if (isset($_REQUEST['supprimer'])) {
    $s_id = addslashes($_REQUEST['s_id']);
    $sql = "DELETE FROM `accounts` WHERE `accounts`.`id` = $s_id;";
    $conn->query($sql);
    header("location: utilisateurs.php");
}
