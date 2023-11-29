<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "root", "ultimategame");

// Création des variables 
$username=$_POST['Username'];
$password=$_POST['Password'];

// Exécution du SQL dans la BDD pour vérifier que l'utilisateur existe
$res=$mysqli->query("SELECT * FROM user WHERE pseudoUser='$username';");

// Lecture de la première ligne du résultat
$row = $res->fetch_assoc();

$statutUser = $row['statutUser'];


// Vérification du résultat
if ($row) {
    // Vérifier le mot de passe
    $hash_password = $row['mdpUser'];

    if (password_verify($password, $hash_password)) {// Si le mot de passe est bon, alors
        // Mot de passe correct
        // Démarrage de la session
        session_start();
        // Création des variables de session
        $_SESSION['Username'] = $username;
        $_SESSION['statutUser'] = $statutUser;
        // Envoie du message
        $_SESSION['notificationlogin'] = "Vous êtes connecté !";
        // Redirection vers la page de connexion
        header("Location: Page de connexion.php");

    } else {

        // Mot de passe incorrect
        // Redirection vers la page de connexion
        header("Location: Page de connexion.php");

    }

} else {
    // Redirection vers la page de connexion
    header("Location: Page de connexion.php");
}
// Fermeture de la connexion avec la BDD
$mysqli->close();
?>