<?php
session_start();
$titre = "Planning des jeux";
require('header.inc.php');
?>

<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <img src="Images/Game-Ultimate-09-10-2023.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="navbar-collapse collapse show" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>


        <?php
          if (isset($_SESSION['Username'])) {
            echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"Page des jeux.php\">Jeux</a>
                  </li>";
          }else{
            echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"#\" onclick=\"executerJavascript()\">Jeux</a>
                  </li>";
          }
        ?>

        <?php
          if (isset($_SESSION['Username'])) {
            if ($_SESSION['statutUser'] === 'admin'){
              echo "<li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"pagePlanning_admin.php\">Planning</a>
                    </li>";
            }else{
              echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"pagePlanning_membre.php\">Planning</a>
                  </li>";
            }
            
          }else{
            echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"#\" onclick=\"executerJavascript()\">Planning</a>
                  </li>";
          }
        ?>
        
 
        <?php
          if (isset($_SESSION['Username'])) {
              echo "<li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"Page de connexion.php\"> " . $_SESSION['Username'] . "</a>
                    </li>";
          }else{
              echo '<li class="nav-item">
                      <a href="Page de connexion.php">
                          <button type="button" class="btn btn-outline-light">Connexion / Inscription</button>
                      </a>
                    </li>';
          }
        ?>

      </ul>
    </div>
  </div>
</nav>

  <!------------------- Code pour la page d'accueil (Louis)-------------------------->

<!-- Présentation du site -->
<div class="jumbotron img-jumbo">
  <div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <img src="Images/Game-Ultimate-09-10-2023.png" alt="plateau" style="display: block; margin: 0 auto;" width=250>
    <br>
    <br>
    <div class="positioned-text">Bienvenue sur Game Ultimate</div>
    <br>
    <br>
    <br>
    <div class="positioned-text2">Bienvenue sur Game Ultimate, le site de jeux le plus populaire du moment !</div>
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







  </body>

  </html>


  <script>
  function executerJavascript() {
    // Code JavaScript pour les notifications
    if ('Notification' in window) {
      Notification.requestPermission().then(function(permission) {
        if (permission === 'granted') {
          function afficherNotification(message) {
            var notification = new Notification('Connexion Utilisateur', {
              body: message,
            });
          }
          afficherNotification('Connectez vous pour acceder à cette page !');
        } else {
          console.warn('La permission de notification n\'est pas accordée.');
        }
      });
    } else {
      console.warn('Les notifications ne sont pas prises en charge par ce navigateur.');
    }
  }
</script>





  <div class="footer">
    <!-- fin page -->
    <p>Création du site par Louis et Taher</p>
  </div>

  <?php
  // Fermeture de la connexion à la base de données
  $BD->close();
  ?>