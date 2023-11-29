<?php

// -----------------Connexion à la BDD-----------------------------------------
/*
$servername = "localhost";
$username = "root";
$motDePasse = "root";
$dbname = "ultimategame";
*/
$servername = "localhost";
$username = "grp_7_2";
$motDePasse = "5MTDK1pheIqm";
$dbname = "bdd_7_2";


try {
    $BD = new mysqli($servername, $username, $motDePasse, $dbname);

    if ($BD->connect_error) {
        throw new Exception("Problème de connexion à la BDD " . $BD->connect_error);
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

// ------------ Fonctions -----------------------------------------------------

// récupérer les parties depuis la base de données
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

// ajouter une partie dans la base de données----------------------------------
function addGame($BD, $idJeu, $date, $heurePartie)
{
    $sql = "INSERT INTO partie (idJeu, date, heurePartie) VALUES ('$idJeu', '$date', '$heurePartie')";
    $BD->query($sql);
}

// modifier une partie dans la base de données -----------------------------------
function updateGame($BD, $idPartie, $idJeu, $date, $heurePartie)
{
    $sql = "UPDATE partie SET idJeu='$idJeu', date='$date', heurePartie='$heurePartie' WHERE idPartie=$idPartie";
    $BD->query($sql);
}

// récupérere les détails d'un jeu (par son ID)---------------------------------
function getGameById($BD, $idPartie)
{
    $sql = "SELECT * FROM partie WHERE idPartie = $idPartie";
    $result = $BD->query($sql);

    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// supprimer une partie de la base de données-------------------------------------
function deleteGame($BD, $idPartie)
{
    $sql = "DELETE FROM partie WHERE idPartie=$idPartie";
    $BD->query($sql);
}

// récupérer la liste des jeux depuis la base de données -------------------------
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

// Traitement des actions --------------------------------------------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["action"]) && $_POST["action"] === "add") {
        $idJeu = $_POST["jeu"];
        $date = $_POST["date"];
        $heurePartie = $_POST["heurePartie"];
        addGame($BD, $idJeu, $date, $heurePartie);
        // Ajout pour afficher un message d'erreur
        if ($BD->error) {
            echo "Erreur lors de l'ajout de la partie : " . $BD->error;
        }
    } elseif (isset($_POST["action"]) && $_POST["action"] === "update") {
        $idPartie = $_POST["idPartie"];
        $idJeu = $_POST["jeu"];
        $date = $_POST["date"];
        $heurePartie = $_POST["heurePartie"];
        updateGame($BD, $idPartie, $idJeu, $date, $heurePartie);
        // Ajout pour afficher un message d'erreur
        if ($BD->error) {
            echo "Erreur lors de la mise à jour de la partie : " . $BD->error;
        }
    } elseif (isset($_POST["action"]) && $_POST["action"] === "edit") {
        $idPartie = $_POST["idPartie"];
        $gameToEdit = getGameById($BD, $idPartie);
    }
}

// Supprimer une partie --------------------------------------------------------
if (isset($_GET["action"]) && $_GET["action"] === "delete" && isset($_GET["id"])) {
    $idPartieToDelete = $_GET["id"];
    deleteGame($BD, $idPartieToDelete);
}

// Charger les parties --------------------------------------------------------
$games = getGames($BD);
