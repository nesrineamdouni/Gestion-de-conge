<?php
include('connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idConge = $_POST['id'];
    $action = $_POST['action'];
    $etat = ($action === 'accepter') ? 'Congé accepté' : 'Congé refusé';

    $sqlUpdate = "UPDATE conge SET etat = '$etat' WHERE id = $idConge";
    if ($conn->query($sqlUpdate) === TRUE) {
        echo $etat;
    } else {
        echo "Erreur lors de la mise à jour de l'état : " . $conn->error;
    }
}
