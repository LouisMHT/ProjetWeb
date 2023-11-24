<?php
session_start();
$titre = "Game Ultimate";
require('header.inc.php')
?>

<body>
<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <img src="Game-Ultimate-09-10-2023.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse show" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Jeux</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Planning</a>
        </li>
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

<!-- Cartes des jeux du moment -->
<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "root", "ultimategame");

// Récupérer les jeux depuis la base de données
$resultat = $mysqli->query("SELECT nomJeu, descriptionJeu, photoJeu FROM jeu");

// Début du container
echo '<div class="container">
        <br>
        <p class="fw-bold fs-2 text-secondary">Page des jeux</p>';

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
        echo '<div class="row">';
        $jeuxLigne = 0;
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

<!-- Barre en bas de la page -->
<div class="footer">
    <p>Création du site par Louis et Taher</p>
</div>

</body>
</html>