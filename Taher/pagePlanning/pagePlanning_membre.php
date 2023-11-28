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
            <a class="nav-link active" aria-current="page" href="pagePlanning.php">Planning</a>
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
  $titre = "Planning des jeux";

  require('bdd_fonctions_membre.php');

  // Récupérer la liste de souhaits du membre (exemple avec $idUser = 1, à remplacer par la session utilisateur)
  $userWishlist = getWishlist($BD, 1);

  // Récupérer la liste des jeux depuis la base de données
  $jeux = getJeux($BD);

  // Récupérer les parties à venir depuis la base de données
  $games = getGames($BD);

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



    <h2>Liste de souhaits</h2>

    <ul>
      <?php foreach ($userWishlist as $wishlistItem) : ?>
        <li><?= $wishlistItem['jeuxListe'] ?></li>
      <?php endforeach; ?>
    </ul>

    <!-- Tableau des parties à venir -->
    <h2>Parties à venir</h2>

    <table>
      <tr>
        <th>Nom du jeu</th>
        <th>Date</th>
        <th>Heure de la partie</th>
        <th>Inscription</th>
      </tr>
      <?php foreach ($games as $game) : ?>
        <tr>
          <td><?= $game['nomJeu'] ?></td>
          <td><?= $game['date'] ?></td>
          <td><?= $game['heurePartie'] ?></td>
          <td>
            <!-- formulaire d'inscription à une partie -->
            <form method="post" action="bdd_fonctions_membre.php">
              <input type="hidden" name="action" value="register">
              <input type="hidden" name="idPartie" value="<?= $game['idPartie'] ?>">
              <input type="submit" value="S'inscrire">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>


  </body>

  </html>

  <div class="footer">
    <!-- fin page -->
    <p>Création du site par Louis et Taher</p>
  </div>

</body>

</html>

<?php

// Fermeture de la connexion à la base de données
$BD->close();
?>