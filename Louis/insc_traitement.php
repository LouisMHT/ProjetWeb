<?php
$mysqli = new mysqli("localhost", "root", "root", "ultimategame");

$name = $_POST['Name'];
$username=$_POST['Username'];
$mail = $_POST['Mail'];
$password=$_POST['Password'];

$insert_query = "INSERT INTO user (nomUser, pseudoUser, mailUser, mdpUser, statutUser) VALUES ('$name', '$username', '$mail', '$password', 'membre')";

if ($mysqli->query($insert_query) === TRUE) {
    echo "Membre inscrit avec succès!";
} else {
    echo "Erreur lors de l'inscription";
}

$mysqli->close();

?>