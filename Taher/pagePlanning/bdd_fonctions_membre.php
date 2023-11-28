<?php

// -----------------Connexion à la BDD-----------------------------------------

$servername = "localhost";
$username = "root";
$motDePasse = "root";
$dbname = "ultimategame";
/*
$servername = "moduleweb.esigelec.fr";
$username = "grp_7_2";
$motDePasse = "5MTDK1pheIqm";
$dbname = "bdd_7_2";
*/

try {
    $BD = new mysqli($servername, $username, $motDePasse, $dbname);

    if ($BD->connect_error) {
        throw new Exception("Problème de connexion à la BDD " . $BD->connect_error);
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

// ------------ Fonctions -----------------------------------------------------


//---------------------------------------------------------------
//---------MEMBRE-----------------------------------------------



// Récupérer les parties à venir depuis la base de données -------------------------
function getGames($BD)
{
    $sql = "SELECT partie.*, jeu.nomJeu FROM partie JOIN jeu ON partie.idJeu = jeu.idJeu";
    $result = $BD->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Récupérer la liste de souhaits d'un membre -------------------------------------
function getWishlist($BD, $idUser)
{
    $sql = "SELECT * FROM liste WHERE userListe = $idUser";
    $result = $BD->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Récupérer la liste des jeux depuis la base de données -------------------------
function getJeux($BD)
{
    $sql = "SELECT idJeu, nomJeu FROM jeu";
    $result = $BD->query($sql);

    $jeux = [];
    while ($row = $result->fetch_assoc()) {
        $jeux[$row['idJeu']] = $row['nomJeu'];
    }

    return $jeux;
}

// Inscrire un membre à une partie ------------------------------------------------
function registerToGame($BD, $idUser, $idPartie)
{
    // Vérifier si le membre est déjà inscrit à la partie
    $checkSql = "SELECT * FROM inscriptions WHERE idUser = $idUser AND idPartie = $idPartie";
    $checkResult = $BD->query($checkSql);

    if ($checkResult->num_rows > 0) {
        echo "Vous êtes déjà inscrit à cette partie.";
        return;
    }

    // Ajouter l'inscription à la partie
    $insertSql = "INSERT INTO inscriptions (idUser, idPartie) VALUES ($idUser, $idPartie)";
    $BD->query($insertSql);

    if ($BD->error) {
        echo "Erreur lors de l'inscription à la partie : " . $BD->error;
    } else {
        echo "Inscription réussie !";
    }
}

// Traitement des actions --------------------------------------------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["action"]) && $_POST["action"] === "register") {
        $idUser = 1; // Remplacez 1 par la logique pour obtenir l'ID de l'utilisateur connecté
        $idPartie = $_POST["idPartie"];
        registerToGame($BD, $idUser, $idPartie);
        // Ajout pour afficher un message d'erreur
        if ($BD->error) {
            echo "Erreur lors de l'inscription à la partie : " . $BD->error;
        }
    }
}
