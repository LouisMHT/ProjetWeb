<?php
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
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Jeux</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Planning</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container d-flex align-items-center" style="height: 100vh;">
    <div class="col">
    </div>
    <div class="col d-flex flex-column justify-content-center">
      <p class="text-center fs-2">Page de connexion/inscription</p>
      <p class="text-center">Pour vous connecter, remplissez les champs ci-dessous :</p>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nom d'utilisateur : </span>
        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Mot de Passe : </span>
        <input type="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <button type="button" class="btn btn-primary btn-sm">Connexion</button>
      <br>
      <p class="text-center">Pour vous incrire, remplissez les champs ci-dessous :</p>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nom d'utilisateur : </span>
        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Adresse Mail : </span>
        <input type="text" class="form-control" aria-label="Mail" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Mot de Passe : </span>
        <input type="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <button type="button" class="btn btn-primary btn-sm">Inscription</button>
    </div>
    <div class="col">
    </div>
</div>

</body>
</html>