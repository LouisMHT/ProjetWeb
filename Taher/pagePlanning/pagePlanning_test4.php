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

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "ultimategame";

  // Créer une connexion à la base de données
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Vérifier la connexion
  if ($conn->connect_error) {
    die("problème de connexion à la bdd " . $conn->connect_error);
  }

  // Fonction pour récupérer les parties depuis la base de données
  function getGames($conn)
  {
    $sql = "SELECT * FROM partie";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      return $result->fetch_all(MYSQLI_ASSOC);
    } else {
      return [];
    }
  }

  // Fonction pour ajouter une partie dans la base de données
  function addGame($conn, $nomJeu, $date, $heurePartie)
  {
    $sql = "INSERT INTO partie (nomJeu, date, heurePartie) VALUES ('$nomJeu', '$date', '$heurePartie')";
    $conn->query($sql);
  }

  // Fonction pour modifier une partie dans la base de données
  function updateGame($conn, $idPartie, $nomJeu, $date, $heurePartie)
  {
    $sql = "UPDATE partie SET nomJeu='$nomJeu', date='$date', heurePartie='$heurePartie' WHERE idPartie=$idPartie";
    $conn->query($sql);
  }

  // fonction pour récupérer les détails d'un jeu par son ID 
  function getGameById($conn, $idPartie)
  {
    $sql = "SELECT * FROM partie WHERE idPartie = $idPartie";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      return $result->fetch_assoc();
    } else {
      return null;
    }
  }

  // Fonction pour supprimer une partie de la base de données
  function deleteGame($conn, $idPartie)
  {
    $sql = "DELETE FROM partie WHERE idPartie=$idPartie";
    $conn->query($sql);
  }

  // Traiter les actions
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ajouter une nouvelle partie
    if (isset($_POST["action"]) && $_POST["action"] === "add") {
      $nomJeu = $_POST["nomJeu"];
      $date = $_POST["date"];
      $heurePartie = $_POST["heurePartie"];
      addGame($conn, $nomJeu, $date, $heurePartie);
    }
    /* // Modifier une partie existante v1
    elseif (isset($_POST["action"]) && $_POST["action"] === "update") {
      $idPartie = $_POST["idPartie"];
      $nomJeu = $_POST["nomJeu"];
      $date = $_POST["date"];
      $heurePartie = $_POST["heurePartie"];
      updateGame($conn, $idPartie, $nomJeu, $date, $heurePartie);
    } */
    // Modifier une partie existante v2
    elseif (isset($_POST["action"]) && $_POST["action"] === "edit") {
      $idPartie = $_POST["idPartie"];
      $gameToEdit = getGameById($conn, $idPartie);
    }
  }

  // Supprimer une partie
  if (isset($_GET["action"]) && $_GET["action"] === "delete" && isset($_GET["id"])) {
    $idPartieToDelete = $_GET["id"];
    deleteGame($conn, $idPartieToDelete);
  }

  // Charger les parties
  $games = getGames($conn);
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning des jeux</title>
    <style>
      /* Ajoutez votre style CSS ici selon vos préférences */
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
    <h2>Planning des jeux à venir</h2>

    <form method="post">
      <label for="nomJeu">Nom du jeu:</label>
      <input type="text" id="nomJeu" name="nomJeu" required>

      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required>

      <label for="heurePartie">Heure de la partie:</label>
      <input type="time" id="heurePartie" name="heurePartie" required>

      <input type="hidden" name="action" value="add">
      <input type="submit" value="Ajouter">
    </form>

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
            <a href="?action=delete&id=<?= $game['idPartie'] ?>">Supprimer</a>
            <form method="post" style="display:inline;">
              <input type="hidden" name="action" value="edit">
              <input type="hidden" name="idPartie" value="<?= $game['idPartie'] ?>">
              <input type="submit" value="Modifier">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>

    </table>
    <?php if (isset($gameToEdit)) : ?>
      <!-- Afficher le formulaire de modification si un jeu est en cours de modification -->
      <h3>Modifier la partie</h3>
      <form method="post">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="idPartie" value="<?= $gameToEdit['idPartie'] ?>">
        <label for="editNom">Nom du jeu:</label>
        <input type="text" id="editNom" name="nomJeu" value="<?= $gameToEdit['nomJeu'] ?>" required>

        <label for="editDate">Date:</label>
        <input type="date" id="editDate" name="date" value="<?= $gameToEdit['date'] ?>" required>

        <label for="editHeure">Heure de la partie:</label>
        <input type="time" id="editHeure" name="heurePartie" value="<?= $gameToEdit['heurePartie'] ?>" required>

        <input type="submit" value="Modifier">
      </form>
    <?php endif; ?>
  </body>

  </html>


  <br>

  <div class="footer">
    <p>Création du site par Louis et Taher</p>
  </div>


</body>

</html>