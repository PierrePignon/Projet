<!DOCTYPE html>

<html>

<head>
  <title>E-nova</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="public/css/consoStyle.css">
  <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/ ">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/header.php'); ?>

  <div class="container">

    <h1 id="conso_title">Ma consomation</h1>

    <div class="container-fluid">  
      <!-- Card Body -->
      <div class ="text1">
      Voici la consommation de votre maison, la consommation a été détaillée </br>
      afin que vous ayez une vision sur vos habitudes les plus énergivores.  
    </div>
    <div class="row">
     <div class="col-md-6">
      <div class="card-body">
       <canvas id="myPieChart" width="250" height="500" class="chartjs-render-monitor" style="display: block; 
       height:220px; width: 400px;"></canvas>
     </div>
   </div>
   
   <div class ="text2">
    Ici vous trouverez votre consommation horaire d'aujourd'hui.
  </div>
  <div class="col-md-6">
    <div class="card-body2">
      <canvas id="myAreaChart" width="250" height="300" class="chartjs-render-monitor" style="display: block; 
      height: 400px; width: 300px;"></canvas>
    </div>
  </div>

  <div class="text3">
    Vous avez également une  vision de votre consommation des mois précédents, <br> 
    ainsi vous pouvez analyser l'évolution de votre consommation.
  </div>
  <div class="col-md-6">
    <div class="card-body3">
      <canvas id="myBarChart" width="500" height="300" class="chartjs-render-monitor" style="display: block; 
      height: 300px; width: 250px;"></canvas>
    </div>
  </div>

</div>
</body>

<script src="public/js/chart.min.js"></script>
<script src="public/js/chart-pie.js"></script>
<script src="public/js/chart-area.js"></script>
<script src="public/js/chart-bar.js"></script>

</div>

<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>