<?php
$titre = "Planning des jeux";
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
          <li class="nav-item">
            <a href="Page de connexion.php">
              <button type="button" class="btn btn-outline-light">Connexion / Inscription</button>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


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

  <div style="width: 100%; margin: auto;">
    <h4> Planning des parties de jeux </h4>
    <!-- Paramètres du tableaux: -->
    <table border="1" width="100%">
      <!-- entête du tableau -->
      <thead>
        <tr>
          <th> </th>
          <th> Jeux </th>
          <th> Date et heure de la partie </th>
      </thead>
      <!-- corps du tableau -->
      <tbody>
        <tr class="bg-success">
          <td> </td>
          <td> Echecs </td>
          <td> 2023-16-11 16:00 </td>
        </tr>
        <tr class="bg-warning">
          <td> </td>
          <td> Echecs </td>
          <td> 2023-16-11 16:00 </td>
        </tr>
        <tr class="bg-danger">
          <td> </td>
          <td> Echecs </td>
          <td> 2023-16-11 16:00 </td>
        </tr>
        <tr class="bg-info">
          <td> </td>
          <td> Echecs </td>
          <td> 2023-16-11 16:00 </td>
        </tr>
        <tr class="bg-success">
          <td></td>
          <td> Echecs </td>
          <td> 2023-16-11 16:00 </td>
        </tr>
      </tbody>
    </table>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>

    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
  </div>



  <br>
  <br>

  <div class="footer">
    <p>Création du site par Louis et Taher</p>
  </div>


</body>

</html>