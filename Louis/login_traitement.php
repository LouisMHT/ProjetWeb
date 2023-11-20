<?php
$mysqli = new mysqli("localhost", "root", "root", "ultimategame");

$username=$_POST['Username'];
$password=$_POST['Password'];

$res=$mysqli->query("SELECT statutUser FROM user WHERE pseudoUser='$username' AND mdpUser='$password';");

$row = $res->fetch_assoc(); //première ligne du résultat

if ($row) {

    session_start();

    $_SESSION['Username']= $username;

    header("Location: index.php");
} else {
    header("Location: Page de connexion.php");
}
$mysqli->close();
?>