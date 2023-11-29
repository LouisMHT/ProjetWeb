<!-- // Ajouter un jeu à la liste de souhaits Vlongue--------------------------------------- -->
<?php

function addWishlist($BD, $idUser, $idPartie)
{
    // Récupérer le jeu associé à la partie
    $sql = "SELECT idJeu FROM partie WHERE idPartie = $idPartie";
    $result = $BD->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $idJeu = $row['idJeu'];

        // Vérifier si l'entrée existe déjà dans la liste du joueur
        $sqlCheck = "SELECT idListe FROM liste WHERE userListe = $idUser AND jeuxListe = $idJeu";
        echo "Requête de vérification : $sqlCheck<br>";  // Affichez la requête SQL
        $resultCheck = $BD->query($sqlCheck);

        if ($resultCheck && $resultCheck->num_rows > 0) {
            echo "Le jeu est déjà dans la liste du joueur.";
        } else {
            // Ajouter le jeu à la liste du joueur
            $sqlInsert = "INSERT INTO liste (userListe, jeuxListe) VALUES ($idUser, $idJeu)";
            $resultInsert = $BD->query($sqlInsert);

            if (!$resultInsert) {
                echo "Erreur lors de l'ajout du jeu à la liste : " . $BD->error;
            } else {
                echo "Le jeu a été ajouté à la liste du joueur.";
            }
        }
    } else {
        echo "Erreur lors de la récupération du jeu associé à la partie.";
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
