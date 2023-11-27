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
    
    /* Règles de style pour la classe 'year' */
    .year {
      color: red;    /* Texte en rouge */
      font-size: 70px; /* Taille de police plus grande (20 pixels, par exemple) */
    }

    .months {
      color: grey;       /* Texte en blu */
      font-size: 20px;  /* Taille de police plus grande (20 pixels, par exemple) */
      text-decoration: none; /* Suppression du soulignement */
      list-style-type: none;  /* Suppression des points */
      margin: 0;  /* Suppression de la marge */
      padding: 0; /* Suppression du padding */
    }

    /*[fmt]0020-000A-3*/
body{  background:#EEEEEE;  letter-spacing:1px;  font-family:Helvetica; padding:10px;}
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


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Calendrier</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script type="text/javascript">
            jQuery(function($){
               $('.month').hide();
               $('.month:first').show();
               $('.months a:first').addClass('active');
               var current = 1;
               $('.months a').click(function(){
                    var month = $(this).attr('id').replace('linkMonth','');
                    if(month != current){
                        $('#month'+current).slideUp();
                        $('#month'+month).slideDown();
                        $('.months a').removeClass('active'); 
                        $('.months a#linkMonth'+month).addClass('active'); 
                        current = month;
                    }
                    return false; 
               });
            });
        </script>
    </head>
    <body>
        <?php
        date_default_timezone_set('Europe/Paris');
        require('config.php'); 
        require('date.php');
        $date = new Date();
        $year = date('Y');
        $events = $date->getEvents($year);
        $dates = $date->getAll($year);
        ?>
        <div class="periods">
            <div class="year"><?php echo $year; ?></div>
            <div class="months">
                <ul>
                    <?php foreach ($date->months as $id=>$m): ?>
                         <li><a href="#" id="linkMonth<?php echo $id+1; ?>"><?php echo utf8_encode(substr(utf8_decode($m),0,3)); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="clear"></div>
            <?php $dates = current($dates); ?>
            <?php foreach ($dates as $m=>$days): ?>
               <div class="month relative" id="month<?php echo $m; ?>">
               <table>
                   <thead>
                       <tr>
                           <?php foreach ($date->days as $d): ?>
                                <th><?php echo substr($d,0,3); ?></th>
                           <?php endforeach; ?>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                       <?php $end = end($days); foreach($days as $d=>$w): ?>
                           <?php $time = strtotime("$year-$m-$d"); ?>
                           <?php if($d == 1 && $w != 1): ?>
                                <td colspan="<?php echo $w-1; ?>" class="padding"></td>
                           <?php endif; ?>
                           <td<?php if($time == strtotime(date('Y-m-d'))): ?> class="today" <?php endif; ?>>
                                <div class="relative">
                                    <div class="day"><?php echo $d; ?></div>
                                </div>
                               <div class="daytitle">
                                   <?php echo $date->days[$w-1]; ?> <?php echo $d; ?>  <?php echo $date->months[$m-1]; ?>
                               </div>
                               <ul class="events">
                                   <?php if(isset($events[$time])): foreach($events[$time] as $e): ?>
                                        <li><?php echo $e; ?></li>
                                   <?php endforeach; endif;  ?>
                               </ul>
                           </td>
                           <?php if($w == 7): ?>
                            </tr><tr>
                           <?php endif; ?>
                       <?php endforeach; ?>
                       <?php if($end != 7): ?>
                            <td colspan="<?php echo 7-$end; ?>" class="padding"></td>
                       <?php endif; ?>
                       </tr>
                   </tbody>
               </table>
               </div>
            <?php endforeach; ?>
        </div>
        <div class="clear"></div>
        <pre><?php print_r($events); ?></pre>
    </body>
</html>

<br>
<br>

<div class="footer">
    <p>Création du site par Louis et Taher</p>
</div>


  </body>
</html> 