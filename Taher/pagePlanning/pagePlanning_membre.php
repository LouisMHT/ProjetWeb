<?php
$titre = "Planning des jeux";
require('header.inc.php');
?>

<body>

  <!------------------ Code pour la barre de navigation (Louis)---------------->

  <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <img src="Game-Ultimate-09-10-2023.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse show" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Jeux</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pagePlanning_membre.php">Planning</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a href="Page de connexion.php">
              <button type="button" class="btn btn-outline-light">Connexion / Inscription</button>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!------------------- Code pour la page d'accueil (Louis)-------------------------->

  <div class="jumbotron img-jumbo">
    <div class="container">
      <br>
      <br>
      <br>
      <br>
      <br>
      <img src="Game-Ultimate-09-10-2023.png" alt="plateau" style="display: block; margin: 0 auto;" width=250>
      <br>
      <br>
      <div class="positioned-text">Bienvenue sur Game Ultimate</div>
      <br>
      <br>
      <br>
      <div class="positioned-text2"> </div>
      <br>
      <br>
    </div>
  </div>

  <?php
  require('bdd_fonctions_membre.php');

  // Récupérer la liste des jeux depuis la base de données
  $jeux = getJeux($BD);

  // Récupérer la liste des jeux dans la liste du joueur
  $listeJeuxJoueur = getListeJeuxJoueur($BD, $_SESSION['idUser']);

  // Récupérer les parties auxquelles le joueur s'est inscrit
  $partiesInscrites = getPartiesInscrites($BD, $_SESSION['idUser']);
  ?>

  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning des jeux</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th,
      td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
      }

      th {
        background-color: #f2f2f2;
      }
    </style>
  </head>

  <body>


    <!-- Tableau qui affiche les parties existantes -->
    <h2>Planning des jeux à venir</h2>
    <table>
      <tr>
        <th>Nom du jeu</th>
        <th>Date</th>
        <th>Heure de la partie</th>
        <th>Action</th>
      </tr>
      <?php foreach ($games as $game) : ?>
        <tr>
          <td><?= $game['nomJeu'] ?></td>
          <td><?= $game['date'] ?></td>
          <td><?= $game['heurePartie'] ?></td>
          <td>
            <?php
            // Vérifier si l'ID du jeu fait partie de la liste de l'utilisateur
            if (in_array($game['idJeu'], $listeJeuxJoueur)) {
              echo "Déjà inscrit";
            } else {
              echo "<a href=\"?action=addWishlist&id={$game['idPartie']}\">S'incrire dans la partie</a>";
            }
            ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>

    <!-- Tableau qui affiche les parties auxquelles le joueur est inscrit -->
    <h2>Parties auxquelles vous êtes inscrit</h2>
    <table>
      <tr>
        <th>Nom du jeu</th>
        <th>Date</th>
        <th>Heure de la partie</th>
      </tr>
      <?php foreach ($partiesInscrites as $partie) : ?>
        <tr>
          <td><?= $partie['nomJeu'] ?></td>
          <td><?= $partie['date'] ?></td>
          <td><?= $partie['heurePartie'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>


  </body>

  </html>

  <div class="footer">
    <!-- fin page -->
    <p>Création du site par Louis et Taher</p>
  </div>

  <?php
  // Fermeture de la connexion à la base de données
  $BD->close();
  ?>