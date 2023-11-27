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



<html> 
  <head>
    <meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" />
    <title>Calendrier</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
    <script type="text/javascript" src= "https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script> 
    <style>
    /*[fmt]0020-000A-3*/

.year{  color:#D90000;  font-size:85px;}
.relative{  position:relative;}
.months{}
.month{  margin-top:12px;}
.months ul{  list-style:none;  margin:0px;  padding:0px;}
.months ul li a{  float:left;  margin:-1px;  padding:0px 15px 0px 0px;  color:#888888;  text-decoration:none;  font-size:35px;  font-weight:bold;  text-transform:uppercase;}
.months ul li a:hover, .months ul li a.active{  color:#D90000;}
table{  border-collapse:collapse;}
table td{  border:1px solid #A3A3A3;  width:80px;  height:80px;}
table td.today{  border:2px solid #D90000;  width:80px;  height:80px;}
table td.padding{  border:none;}
table td:hover{  background:#DFDFDF;  cursor:pointer;}
table th{  font-weight:normal;  color:#A8A8A8;}
table td .day{  position:absolute;  color:#8C8C8C;  bottom:-40px;  right:5px;  font-weight:bold;  font-size:24.3pt;}
table td .events{  position:relative;  width:79px;  height:0px;  margin:-39px 0px 0px;  padding:0px;}
table td .events li{  width:10px;  height:10px;  float:left;  background:#000;  /*+border-radius:10px;*/  -moz-border-radius:10px;  -webkit-border-radius:10px;  -khtml-border-radius:10px;  border-radius:10px 10px 10px 10px;  margin-left:6px;  overflow:hidden;  text-indent:-3000px;}
table td:hover .events{  position:absolute;  left:582px;  top:66px;  width:442px;  list-style:none;  margin:0px;  padding:11px 0px 0px;}
table td:hover .events li{  height:40px;  line-height:40px;  font-weight:bold;  border-bottom:1px solid #D6D6D6;  padding-left:41px;  text-indent:0;  background:none;  width:500px;}
table td:hover .events li:first-child{  border-top:1px solid #D6D6D6;}
table td .daytitle{  display:none;}
table td:hover .daytitle{  position:absolute;  left:582px;  top:21px;  width:442px;  list-style:none;  margin:0px 0px 0px 16px;  padding:0px;  color:#D90000;  font-size:41px;  display:block;  font-weight:bold;}
.clear{  clear:both;}

  </style>
  </head>  
  <body>
    <?php ?>
  </body>
</html> 


<?php 
      //https://www.youtube.com/watch?v=wjF7vP_cudg&ab_channel=Grafikart.fr
      date_default_timezone_set('Europe/Paris');
      
      /* echo "testtt"         // TEST ZONE
      
      echo date('d/m/Y h:i:s'); 
      echo '<br/>';
      $date = '1970-01-02';
      echo $date;
      echo '<br/>' ;
      echo 'strtotime : ', strtotime($date); */

      require('date_test1.php');
      $date = new Date();
      $year = date('Y');
      $dates = $date->getAll($year);  //Calendrier OK
      
?> 



<div class="periods"> 
  <div class="year"> <?php echo $year; ?> </div>
  <div class="months">
    <ul>
      <?php foreach ($date->months as $id=>$m): ?>
          <li> 
           <!--<a href=""> <?php echo substr($m,0,3); ?> </a>-->
           <a href="#" id="linkMonth <?php echo $id+1; ?>"><?php echo utf8_encode(substr(utf8_decode($m),0,3)); ?> </a> 
          </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php $dates = current($dates); ?>
<?php foreach($dates as $m=>$days): ?> 
  <div class="month" id="month <?php echo $m; ?>">
  <table>
    <thead>
      <tr>
        <?php foreach($date->days as $d): ?>
          <th><?php echo substr($d,0,3); ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php foreach ($days as $d=>$w): ?>
          <td><?php echo $d; ?></td>
          <?php if($w == 7): ?>
            <tr></tr>
          <?php endif; ?>
      <?php endforeach; ?>
      </tr>    
    </tbody>
  </table>
<?php endforeach; ?> 
  </div>


</div>

<pre> <?php print_r($dates); ?> </pre> // affichage de toutes les dates de l'année



<br>
<br>

<div class="footer">
    <p>Création du site par Louis et Taher</p>
</div>


  </body>
</html> 