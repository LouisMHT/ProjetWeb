<?php

// -----------------Connexion à la BDD-----------------------------------------

$servername = "localhost";
$username = "root";
$motDePasse = "root";
$dbname = "ultimategame";
/*
$servername = "localhost";
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
$idUser = $_SESSION['idUser'];

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

// récupérer la liste des jeux dans la liste du joueur ---------------------------
function getListeJeuxJoueur($BD, $idUser)
{
    $sql = "SELECT jeuxListe FROM liste WHERE userListe = $idUser";
    $result = $BD->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return explode(',', $row['jeuxListe']);
    } else {
        return [];
    }
}

// Ajouter un jeu à la liste de souhaits ---------------------------------------
function addWishlist($BD, $idUser, $idPartie)
{
    // Récupérer le jeu associé à la partie
    $sql = "SELECT idJeu FROM partie WHERE idPartie = $idPartie";
    $result = $BD->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $idJeu = $row['idJeu'];

        // Ajouter le jeu à la liste du joueur
        $sql = "INSERT INTO liste (userListe, jeuxListe) VALUES ($idUser, $idJeu)";
        $BD->query($sql);
    }
}


// Traitement des actions --------------------------------------------------------
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Ajouter d'autres actions au besoin
}

// Ajouter un jeu à la liste de souhaits ---------------------------------------
if (isset($_GET["action"]) && $_GET["action"] === "addWishlist" && isset($_GET["id"])) {
    $idPartieToAdd = $_GET["id"];
    addWishlist($BD, $_SESSION['idUser'], $idPartieToAdd);
}

// Charger les parties --------------------------------------------------------
$games = getGames($BD);
