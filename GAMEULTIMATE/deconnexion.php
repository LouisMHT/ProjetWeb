<?php
// On démarre la session
session_start();
// On supprime toutres les variables de la session
session_unset();
// On détruit la session
session_destroy();
// Redirection vers la Page de connexion après la déconnexion
header("Location: Page de connexion.php");
// Création d'une session temporaire pour le message de déconnexion
session_start();
// Envoie du message de déconnexion vers Page de connexion
$_SESSION['notificationdeco'] = "Vous êtes déconnecté !";
?>