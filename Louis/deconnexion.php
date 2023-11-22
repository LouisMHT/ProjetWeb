<?php
session_start();
session_unset();
session_destroy();
header("Location: Page de connexion.php");
session_start();
$_SESSION['notificationdeco'] = "Vous êtes déconnecté !";
?>