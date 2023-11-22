<?php
$mysqli = new mysqli("localhost", "root", "root", "ultimategame");

$name = $_POST['Name'];
$username=$_POST['Username'];
$mail = $_POST['Mail'];
$password=password_hash($_POST['Password'], PASSWORD_DEFAULT);

$insert_query = "INSERT INTO user (nomUser, pseudoUser, mailUser, mdpUser, statutUser) VALUES ('$name', '$username', '$mail', '$password', 'membre')";

if ($mysqli->query($insert_query) === TRUE) {
    session_start();
    $_SESSION['notificationinsc'] = "Membre inscrit avec succès !";
    header("Location: Page de connexion.php");
} else {
    session_start();
    $_SESSION['notificationinsc'] = "Erreur lors de l'inscription !";
    header("Location: Page de connexion.php");
}

$mysqli->close();

?>