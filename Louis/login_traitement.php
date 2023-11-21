<?php
$mysqli = new mysqli("localhost", "root", "root", "ultimategame");

$username=$_POST['Username'];
$password=$_POST['Password'];

$res=$mysqli->query("SELECT * FROM user WHERE pseudoUser='$username';");

$row = $res->fetch_assoc(); //première ligne du résultat

if ($row) {
    // Vérifier le mot de passe
    $hash_password = $row['mdpUser'];

    if (password_verify($password, $hash_password)) {

        // Mot de passe correct
        session_start();
        $_SESSION['Username'] = $username;
        $_SESSION['notification'] = "Vous êtes connecté !";
        header("Location: Page de connexion.php");

    } else {

        // Mot de passe incorrect
        header("Location: Page de connexion.php");

    }

} else {
    header("Location: Page de connexion.php");
}
$mysqli->close();
?>