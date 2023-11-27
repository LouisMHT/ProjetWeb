<?php

// -----------------Connexion à la BDD-----------------------------------------

$servername = "localhost";
$username = "root";
$motDePasse = "root";
$dbname = "ultimategame";

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
    $sql = "SELECT * FROM partie";
    $result = $BD->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// ajouter une partie dans la base de données----------------------------------
function addGame($BD, $nomJeu, $date, $heurePartie)
{
    $sql = "INSERT INTO partie (nomJeu, date, heurePartie) VALUES ('$nomJeu', '$date', '$heurePartie')";
    $BD->query($sql);
}

// modifier une partie dans la base de données -----------------------------------
function updateGame($BD, $idPartie, $nomJeu, $date, $heurePartie)
{
    $sql = "UPDATE partie SET nomJeu='$nomJeu', date='$date', heurePartie='$heurePartie' WHERE idPartie=$idPartie";
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

// Traiter les actions --------------------------------------------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["action"]) && $_POST["action"] === "add") {
        $nomJeu = $_POST["nomJeu"];
        $date = $_POST["date"];
        $heurePartie = $_POST["heurePartie"];
        addGame($BD, $nomJeu, $date, $heurePartie);
    } elseif (isset($_POST["action"]) && $_POST["action"] === "update") {
        $idPartie = $_POST["idPartie"];
        $nomJeu = $_POST["nomJeu"];
        $date = $_POST["date"];
        $heurePartie = $_POST["heurePartie"];
        updateGame($BD, $idPartie, $nomJeu, $date, $heurePartie);
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
