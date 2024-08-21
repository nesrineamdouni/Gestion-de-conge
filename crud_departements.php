<?php
include('connexion.php');
if (isset($_REQUEST['enregistrer'])) {
    $nom = addslashes($_REQUEST['nom']);
    $manager = addslashes($_REQUEST['manager']);
    $email = addslashes($_REQUEST['email']);
    $telephone = addslashes($_REQUEST['telephone']);
    $sql = "INSERT INTO `departement` (`nom`, `manager`, `email`, `telephone`) VALUES ('$nom', '$manager', '$email', '$telephone');";
    $conn->query($sql);
    header("location: departements.php");
}

if (isset($_REQUEST['modifier'])) {
    $u_id = addslashes($_REQUEST['u_id']);
    $u_nom = addslashes($_REQUEST['u_nom']);
    $u_manager = addslashes($_REQUEST['u_manager']);
    $u_email = addslashes($_REQUEST['u_email']);
    $u_telephone = addslashes($_REQUEST['u_telephone']);
    $sql = "UPDATE `departement` SET `nom` = '$u_nom', `manager` = '$u_manager', `email` = '$u_email', `telephone` = '$u_telephone' WHERE `departement`.`id` = $u_id;";
    $conn->query($sql);
    header("location: departements.php");
}

if (isset($_REQUEST['supprimer'])) {
    $s_id = addslashes($_REQUEST['s_id']);
    $sql = "DELETE FROM `departement` WHERE `departement`.`id` = $s_id;";
    $conn->query($sql);
    header("location: departements.php");
}
