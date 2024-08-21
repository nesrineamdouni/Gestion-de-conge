<?php
include('connexion.php');
session_start(); 

if (isset($_REQUEST['enregistrer'])) {
    $date_depart = addslashes($_REQUEST['date_depart']);
    $date_retour = addslashes($_REQUEST['date_retour']);
    $type_absence = addslashes($_REQUEST['type_absence']);
    $nom = $_SESSION['account']['nom'];
    $prenom = $_SESSION['account']['prenom'];
    $id_utilisateur = $_SESSION['account']['id'];
    $type_compte = $_SESSION['account']['type_compte'];

    $sql = "INSERT INTO `conge` (`date_depart`, `date_retour`, `type_absence`, `nom`, `prenom`, `id_utilisateur`, `type_compte`) VALUES ('$date_depart', '$date_retour', '$type_absence', '$nom', '$prenom', '$id_utilisateur', '$type_compte');";
    $conn->query($sql);
    header("location: conge.php");
}

if (isset($_REQUEST['modifier'])) {
    $u_id = addslashes($_REQUEST['u_id']);
    $u_date_depart = addslashes($_REQUEST['u_date_depart']);
    $u_date_retour = addslashes($_REQUEST['u_date_retour']);
    $u_type_absence = addslashes($_REQUEST['u_type_absence']);
    $sql = "UPDATE `conge` SET `date_depart` = '$u_date_depart', `date_retour` = '$u_date_retour', `type_absence` = '$u_type_absence' WHERE `conge`.`id` = $u_id;";
    $conn->query($sql);
    header("location: conge.php");
}

if (isset($_REQUEST['supprimer'])) {
    $s_id = addslashes($_REQUEST['s_id']);
    $sql = "DELETE FROM `conge` WHERE `conge`.`id` = $s_id;";
    $conn->query($sql);
    header("location: conge.php");
}
