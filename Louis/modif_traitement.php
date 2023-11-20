<?php
session_start();
$mysqli = new mysqli("localhost", "root", "root", "ultimategame");

$old = $_POST['Oldpassword'];
$new = $_POST['Newpassword'];
$username = $_SESSION['Username'];
//echo "$username";
$modif_query = "UPDATE user SET mdpUser = '$new' WHERE pseudoUser = '$username'";

if ($mysqli->query($modif_query) === TRUE) {
    echo "Mot de Passe modifié avec succès!";
} else {
    echo "Erreur lors de la modification";
}

$mysqli->close();

?>