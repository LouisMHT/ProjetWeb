<?php
// Connexion à la base de données en ligne
$mysqli = new mysqli("localhost", "root", "root", "ultimategame");

// Définition des variables que l'on va utiliser
$name = $_POST['Name'];
$username = $_POST['Username'];
$mail = $_POST['Mail'];
// Hash du Mot de Passe
$password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

// Vérifier si le pseudo ou le mail existe déjà dans la base de données
$check_query = "SELECT * FROM user WHERE pseudoUser='$username' OR mailUser='$mail'";
$check_result = $mysqli->query($check_query);

if ($check_result->num_rows > 0) {
    // Le pseudo ou le mail existe déjà, donc afficher une erreur
    // Démarrage de la session
    session_start();
    // Création d'une variable pour le message d'erreur
    $_SESSION['notificationinsc'] = "Le Nom d'utilisateur ou le Mail existe déjà !";
    // Redirection vers la page de connexion
    header("Location: Page de connexion.php");
} else {
    // Le pseudo et le mail sont uniques, donc procéder à l'insertion
    $insert_query = "INSERT INTO user (nomUser, pseudoUser, mailUser, mdpUser, statutUser) VALUES ('$name', '$username', '$mail', '$password', 'membre')";

    if ($mysqli->query($insert_query) === TRUE) { //Exécution de la ligne SQL et vérification du résultat
        // Démarrage de la session
        session_start();
        // Envoie du message
        $_SESSION['notificationinsc'] = "Membre inscrit avec succès !";
        // Redirection vers la page de connexion
        header("Location: Page de connexion.php");
    } else {
        // Démarrage de la session
        session_start();
        // Envoie du message 
        $_SESSION['notificationinsc'] = "Erreur lors de l'inscription !";
        // Redirection vers la page de connexion
        header("Location: Page de connexion.php");
    }
}
// Fermeture de la connexion avec la base de données
$mysqli->close();
?>
