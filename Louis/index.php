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
        <li class="nav-item">
          <a class="nav-link" href="Page des jeux.php">Jeux</a>
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
<div class="container">
  <br>  
  <p class="fw-bold fs-2 text-secondary">Jeux du moment</p>
  <div class="row">
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="Images/Monopoly.jpg" class="card-img-top" alt="monopoly">
        <div class="card-body">
          <h5 class="card-title">Monopoly</h5>
          <p class="card-text">Le Monopoly est un jeu de société sur parcours dont le but est, à travers l'achat et la vente de propriétés, de ruiner ses adversaires et ainsi parvenir au monopole.</p>
          <a href="#" class="btn btn-primary">Détails</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="Images/Monopoly.jpg" class="card-img-top" alt="monopoly">
        <div class="card-body">
          <h5 class="card-title">Monopoly</h5>
          <p class="card-text">Le Monopoly est un jeu de société sur parcours dont le but est, à travers l'achat et la vente de propriétés, de ruiner ses adversaires et ainsi parvenir au monopole.</p>
          <a href="#" class="btn btn-primary">Détails</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="Images/Monopoly.jpg" class="card-img-top" alt="monopoly">
        <div class="card-body">
          <h5 class="card-title">Monopoly</h5>
          <p class="card-text">Le Monopoly est un jeu de société sur parcours dont le but est, à travers l'achat et la vente de propriétés, de ruiner ses adversaires et ainsi parvenir au monopole.</p>
          <a href="#" class="btn btn-primary">Détails</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="Images/Monopoly.jpg" class="card-img-top" alt="monopoly">
        <div class="card-body">
          <h5 class="card-title">Monopoly</h5>
          <p class="card-text">Le Monopoly est un jeu de société sur parcours dont le but est, à travers l'achat et la vente de propriétés, de ruiner ses adversaires et ainsi parvenir au monopole.</p>
          <a href="#" class="btn btn-primary">Détails</a>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>

<!-- Barre en bas de la page -->
<div class="footer">
    <p>Création du site par Louis et Taher</p>
</div>


</body>
</html>