<?php

session_start();

// Connexion à la base de données en ligne
$mysqli = new mysqli("localhost", "grp_7_2", "5MTDK1pheIqm", "bdd_7_2");

// Définition des variables que l'on va utiliser
$name = $_POST['Name'];
$desc = $_POST['Desc'];
$Categorie = $_POST['Categorie'];
$Regle = $_POST['Regle'];

// Vérifier si le jeu existe déjà dans la base de données
$check_query = "SELECT * FROM jeu WHERE nomJeu='$name'";
$check_result = $mysqli->query($check_query);

if ($check_result->num_rows > 0) {
    // Le pseudo ou le mail existe déjà, donc afficher une erreur
    // Démarrage de la session
    session_start();
    // Création d'une variable pour le message d'erreur
    $_SESSION['notificationjeuadmin'] = "Le jeu existe déjà !";
    // Redirection vers la page de connexion
    header("Location: Page Admin Jeu.php");
} else {

    if(isset($_FILES['imageUpload'])) {
        $targetDirectory = "Images/"; // Répertoire où les images seront stockées
        $targetFile = $targetDirectory . basename($_FILES["imageUpload"]["name"]);
        
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
        // Autoriser certains formats de fichier
        $allowedFormats = array("jpg", "jpeg", "png");
        if (!in_array($imageFileType, $allowedFormats)) {
            $uploadOk = 0;
        }
    
        // Vérifier si $uploadOk est à 0 à cause d'une erreur
        if ($uploadOk == 0) {
            $_SESSION['notificationjeuadmin'] = "Désolé, votre fichier n'a pas été téléchargé.";
            header("Location: Page Admin Jeux.php");
        } else {
            // Si tout est OK, essayez de télécharger le fichier
            if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFile)) {
                $_SESSION['notificationjeuadmin'] = "Le fichier ". htmlspecialchars(basename($_FILES["imageUpload"]["name"])) . " a été téléchargé.";
            } else {
                $_SESSION['notificationjeuadmin'] = "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                header("Location: Page Admin Jeux.php");
            }
        }
    }
    $nomImage = $_FILES["imageUpload"]["name"];
    // Le pseudo et le mail sont uniques, donc procéder à l'insertion
    $insert_query = "INSERT INTO jeu (nomJeu, descriptionJeu, categorieJeu, regleJeu, photoJeu) VALUES ('$name', '$desc', '$Categorie', '$Regle', 'Images/$nomImage')";

    if ($mysqli->query($insert_query) === TRUE) { //Exécution de la ligne SQL et vérification du résultat
        // Démarrage de la session
        session_start();
        // Envoie du message
        $_SESSION['notificationjeuadmin'] = "Jeu ajouté avec succès !";
        // Redirection vers la page de connexion
        header("Location: Page Admin Jeux.php");
    } else {
        // Démarrage de la session
        session_start();
        // Envoie du message 
        $_SESSION['notificationjeuadmin'] = "Erreur lors de l'ajout !";
        // Redirection vers la page de connexion
        header("Location: Page Admin Jeux.php");
    }
}
// Fermeture de la connexion avec la base de données
$mysqli->close();
?>
