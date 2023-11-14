<?php
session_start();
$titre = "Game Ultimate";
require('header.inc.php')
?>

<body>

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
         //var_dump ($_SESSION['Username']);
          if (isset($_SESSION['Username'])) {
              echo "<li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"Page de connexion.php\"> " . $_SESSION['Username'] . "</a>
                    </li>";
          }else{
              echo ' ';
          }
        ?>
      </ul>
    </div>
  </div>
</nav>


        <?php
         //var_dump ($_SESSION['Username']);
          if (isset($_SESSION['Username'])) {
              echo "<div class=\"container d-flex align-items-center\" style=\"height: 100vh;\">
              <div class=\"col\">
              </div>
              <div class=\"col d-flex flex-column justify-content-center\">
                <p class=\"text-center fs-2\">Paramètre du compte</p>
                <p class=\"text-center\">Pour changer vos informations, remplissez les champs ci-dessous :</p>
                  <form action=\"login_traitement.php\" method=\"post\" class=\"d-flex flex-column justify-content-center\">
                    <div class=\"input-group mb-3\">
                      <span class=\"input-group-text\" id=\"Username\">Nom d'utilisateur : </span>
                      <input name=\"Username\" type=\"text\" class=\"form-control\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">
                    </div>
                    <div class=\"input-group mb-3\">
                            <span class=\"input-group-text\" id=\"basic-addon1\">Adresse Mail : </span>
                            <input type=\"text\" class=\"form-control\" aria-label=\"Mail\" aria-describedby=\"basic-addon1\">
                          </div>
                    <div class=\"input-group mb-3\">
                      <span class=\"input-group-text\" id=\"Password\">Mot de Passe : </span>
                      <input name=\"Password\" type=\"password\" class=\"form-control\" aria-label=\"Password\" aria-describedby=\"basic-addon1\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary btn-sm btn-block\">Modifier vos informations</button>
                  </form>
                <br>
                <br>
                <br>
                <br>
                <a href=\"deconnexion.php\" class=\"d-flex flex-column justify-content-center\" style=\"text-decoration: none;\">
                  <button type=\"button\" class=\"btn btn-danger btn-sm\">Déconnexion</button>
                </a>
              </div>
              <div class=\"col\">
              </div>
          </div>";
          }else{
              echo "<div class=\"container d-flex align-items-center\" style=\"height: 100vh;\">
              <div class=\"col\">
              </div>
              <div class=\"col d-flex flex-column justify-content-center\">
                <p class=\"text-center fs-2\">Page de connexion/inscription</p>
                <p class=\"text-center\">Pour vous connecter, remplissez les champs ci-dessous :</p>
                  <form action=\"login_traitement.php\" method=\"post\" class=\"d-flex flex-column justify-content-center\">
                    <div class=\"input-group mb-3\">
                      <span class=\"input-group-text\" id=\"Username\">Nom d'utilisateur : </span>
                      <input name=\"Username\" type=\"text\" class=\"form-control\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">
                    </div>
                    <div class=\"input-group mb-3\">
                      <span class=\"input-group-text\" id=\"Password\">Mot de Passe : </span>
                      <input name=\"Password\" type=\"password\" class=\"form-control\" aria-label=\"Password\" aria-describedby=\"basic-addon1\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary btn-sm btn-block\">Connexion</button>
                  </form>
                <br>
                <p class=\"text-center\">Pour vous incrire, remplissez les champs ci-dessous :</p>
                <div class=\"input-group mb-3\">
                  <span class=\"input-group-text\" id=\"basic-addon1\">Nom d'utilisateur : </span>
                  <input type=\"text\" class=\"form-control\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group mb-3\">
                  <span class=\"input-group-text\" id=\"basic-addon1\">Adresse Mail : </span>
                  <input type=\"text\" class=\"form-control\" aria-label=\"Mail\" aria-describedby=\"basic-addon1\">
                </div>
                <div class=\"input-group mb-3\">
                  <span class=\"input-group-text\" id=\"basic-addon1\">Mot de Passe : </span>
                  <input type=\"password\" class=\"form-control\" aria-label=\"Password\" aria-describedby=\"basic-addon1\">
                </div>
                <button type=\"button\" class=\"btn btn-primary btn-sm\">Inscription</button>
              </div>
              <div class=\"col\">
              </div>
          </div>";
          }
        ?>


<!--div class="container d-flex align-items-center" style="height: 100vh;">
    <div class="col">
    </div>
    <div class="col d-flex flex-column justify-content-center">
      <p class="text-center fs-2">Paramètre du compte</p>
      <p class="text-center">Pour changer vos informations, remplissez les champs ci-dessous :</p>
        <form action="login_traitement.php" method="post" class="d-flex flex-column justify-content-center">
          <div class="input-group mb-3">
            <span class="input-group-text" id="Username">Nom d'utilisateur : </span>
            <input name="Username" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Adresse Mail : </span>
                  <input type="text" class="form-control" aria-label="Mail" aria-describedby="basic-addon1">
                </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="Password">Mot de Passe : </span>
            <input name="Password" type="password" class="form-control" aria-label="Password" aria-describedby="basic-addon1">
          </div>
          <button type="submit" class="btn btn-primary btn-sm btn-block">Modifier vos informations</button>
        </form>
      <br>
      <br>
      <br>
      <br>
      <a href="deconnexion.php" class="d-flex flex-column justify-content-center" style="text-decoration: none;">
        <button type="button" class="btn btn-danger btn-sm">Déconnexion</button>
      </a>
    </div>
    <div class="col">
    </div>
</div-->

</body>
</html>