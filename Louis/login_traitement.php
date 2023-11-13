<?php
$mysqli = new mysqli("localhost", "root", "root", "ultimategame");

$input=$_POST['Username'];//aucun filtrage ni validation !!
$password=$_POST['Password'];

$res=$mysqli->query("SELECT statutUser FROM user WHERE pseudoUser='$input' AND mdpUser='$password';");

$row = $res->fetch_assoc(); //première ligne du résultat

if ($row) {
    $statutUser = $row['statutUser'];
    //echo "Statut de l'utilisateur : $statutUser";

    session_start();

    $_SESSION['Username']= $input;


    header("Location: index.php");
} else {
    header("Location: Page de connexion.php");
}



?>