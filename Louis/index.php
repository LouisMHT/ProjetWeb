<?php
session_start();
$titre = "Game Ultimate";
require('header.inc.php')
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
            echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"#\">Planning</a>
                  </li>";
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


<!-- Cartes des jeux du moment -->
<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "root", "ultimategame");

// Récupérer les jeux depuis la base de données
$resultat = $mysqli->query("SELECT nomJeu, descriptionJeu, photoJeu FROM jeu");

// Début du container
echo '<div class="container">
        <br>
        <p class="fw-bold fs-2 text-secondary">Jeux</p>';

// Compteur pour suivre le nombre de jeux par ligne
$jeuxLigne = 0;

// Début de la première ligne
echo '<div class="row">';

// Afficher les jeux dans les cartes HTML
while ($jeu = $resultat->fetch_assoc()) {
    echo '
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="' . $jeu['photoJeu'] . '" class="card-img-top" alt="' . $jeu['nomJeu'] . '">
            <div class="card-body">
                <h5 class="card-title">' . $jeu['nomJeu'] . '</h5>
                <p class="card-text">' . $jeu['descriptionJeu'] . '</p>
                <a href="#" class="btn btn-primary">Détails</a>
            </div>
        </div>
    </div>';

    // Incrémenter le compteur
    $jeuxLigne = $jeuxLigne + 1;

    // Vérifier si 4 jeux ont été affichés, si oui, commencer une nouvelle ligne
    if ($jeuxLigne === 4) {
        echo '</div>';
        $jeuxLigne = 0;
        break;
    }
}

// Fin de la dernière ligne
echo '</div>
      <br>';

// Fin du container
echo '</div>';

// Fermeture de la connexion avec la BDD
$mysqli->close();
?>

<br>
<br>

<!-- Barre en bas de la page -->
<div class="footer">
    <p>Création du site par Louis et Taher</p>
</div>


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







</body>
</html>