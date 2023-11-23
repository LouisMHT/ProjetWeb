<?php
$mysqli = new mysqli("localhost", "root", "root", "ultimategame");

$name = $_POST['Name'];
$username = $_POST['Username'];
$mail = $_POST['Mail'];
$password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

// Vérifier si le pseudo ou le mail existe déjà dans la base de données
$check_query = "SELECT * FROM user WHERE pseudoUser='$username' OR mailUser='$mail'";
$check_result = $mysqli->query($check_query);

if ($check_result->num_rows > 0) {
    // Le pseudo ou le mail existe déjà, donc afficher une erreur
    session_start();
    $_SESSION['notificationinsc'] = "Le Nom d'utilisateur ou le Mail existe déjà !";
    header("Location: Page de connexion.php");
} else {
    // Le pseudo et le mail sont uniques, donc procéder à l'insertion
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
}

$mysqli->close();
?>
