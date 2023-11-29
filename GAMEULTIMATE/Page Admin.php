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

<?php
  if (isset($_SESSION['statutUser'])) {
    if ($_SESSION['statutUser'] === 'admin'){
      // Page de connexion avec notification d'inscription
      if (isset($_SESSION['notificationinscadmin'])) {
        echo"<div class=\"container\" style=\"height: 100vh;\">
                <div class=\"row\">
                  <div class=\"col d-flex flex-column justify-content-center\">
                    <div class=\"alert alert-primary text-center\" role=\"alert\">
                      " . $_SESSION['notificationinscadmin'] . "
                    </div>
                  </div>
                </div>
                <br>
                <div class=\"row\">
                <div class=\"col\">
                </div>
                <div class=\"col d-flex flex-column justify-content-center\">
          <p class=\"text-center fs-2\">Page de création compte Administrateur</p>
          <p class=\"text-center\">Pour incrire un admin, remplissez les champs ci-dessous :</p>
          <form action=\"insc_traitement_admin.php\" method=\"post\" class=\"d-flex flex-column justify-content-center\">
            <div class=\"input-group mb-3\">
              <span class=\"input-group-text\" id=\"basic-addon1\">Nom : </span>
              <input name=\"Name\" type=\"text\" class=\"form-control\" aria-label=\"Name\" aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group mb-3\">
              <span class=\"input-group-text\" id=\"basic-addon1\">Nom d'utilisateur : </span>
              <input name=\"Username\" type=\"text\" class=\"form-control\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group mb-3\">
              <span class=\"input-group-text\" id=\"basic-addon1\">Adresse Mail : </span>
              <input name=\"Mail\" type=\"text\" class=\"form-control\" aria-label=\"Mail\" aria-describedby=\"basic-addon1\">
            </div>
            <div class=\"input-group mb-3\">
              <span class=\"input-group-text\" id=\"basic-addon1\">Mot de Passe : </span>
              <input name=\"Password\" type=\"password\" class=\"form-control\" aria-label=\"Password\" aria-describedby=\"basic-addon1\">
            </div>
            <button type=\"submit\" class=\"btn btn-primary btn-sm\">Inscription Admin</button>
          </form>
        </div>
                <div class=\"col\">
                </div>
                </div>
              </div>
              ";
              unset($_SESSION['notificationinscadmin']);
      }else{
        // Page de connexion classique
      echo "<div class=\"container d-flex align-items-center\" style=\"height: 100vh;\">
      <div class=\"col\">
      </div>
      <div class=\"col d-flex flex-column justify-content-center\">
        <p class=\"text-center fs-2\">Page de création compte Administrateur</p>
        <p class=\"text-center\">Pour incrire un admin, remplissez les champs ci-dessous :</p>
        <form action=\"insc_traitement_admin.php\" method=\"post\" class=\"d-flex flex-column justify-content-center\">
          <div class=\"input-group mb-3\">
            <span class=\"input-group-text\" id=\"basic-addon1\">Nom : </span>
            <input name=\"Name\" type=\"text\" class=\"form-control\" aria-label=\"Name\" aria-describedby=\"basic-addon1\">
          </div>
          <div class=\"input-group mb-3\">
            <span class=\"input-group-text\" id=\"basic-addon1\">Nom d'utilisateur : </span>
            <input name=\"Username\" type=\"text\" class=\"form-control\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">
          </div>
          <div class=\"input-group mb-3\">
            <span class=\"input-group-text\" id=\"basic-addon1\">Adresse Mail : </span>
            <input name=\"Mail\" type=\"text\" class=\"form-control\" aria-label=\"Mail\" aria-describedby=\"basic-addon1\">
          </div>
          <div class=\"input-group mb-3\">
            <span class=\"input-group-text\" id=\"basic-addon1\">Mot de Passe : </span>
            <input name=\"Password\" type=\"password\" class=\"form-control\" aria-label=\"Password\" aria-describedby=\"basic-addon1\">
          </div>
          <button type=\"submit\" class=\"btn btn-primary btn-sm\">Inscription Admin</button>
        </form>
      </div>
      <div class=\"col\">
      </div>
    </div>";}
    }else{
      echo "<div class=\"container d-flex align-items-center\" style=\"height: 100vh;\">
        <div class=\"col\">
        </div>
        <div class=\"col d-flex flex-column justify-content-center\">
          <p class=\"fs-1 fw-bold\">ERREUR 404 : PAGE INDISPONIBLE</p>
          <p class=\"fs-6\">Bien essayé, mais c'est bloqué !</p>

          <video width=\"100%\" autoplay=\"true\" muted>
            <source src=\"Erreur.mp4\" type=\"video/mp4\">
          </video>

        </div>
        <div class=\"col\">
        </div>
      </div>
      ";
    }
  }else{
    echo "<div class=\"container d-flex align-items-center\" style=\"height: 100vh;\">
      <div class=\"col\">
      </div>
      <div class=\"col d-flex flex-column justify-content-center\">
        <p class=\"fs-1 fw-bold\">ERREUR 404 : PAGE INDISPONIBLE</p>
        <p class=\"fs-6\">Bien essayé, mais c'est bloqué !</p>

        <video width=\"100%\" autoplay=\"true\" muted>
          <source src=\"Erreur.mp4\" type=\"video/mp4\">
        </video>
        
      </div>
      <div class=\"col\">
      </div>
    </div>
    ";
  }
?>

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