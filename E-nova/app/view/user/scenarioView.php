<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>E-nova</title>
  <link rel="stylesheet" href="public/css/scenarioStyle.css">
  <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/header.php'); ?>

  <div class="container">

    <h1 id="scenario_title">Scénario</h1>

    <div class ="contain">

      <div class = "confort">

        <h2> Mode confort </h2> 
        <em> Options générales</em> <br>
        <p>Eteint les lumières lors d'une abscence de 30 secondes dans une salle. </br></p>
        <p>Ouverture/fermeture des stores </br></p>


        <em>Départ au travail </em> </br>
        <p>- Les lumières et appareils électroniques s'éteignent </br></p>
        <p>- Les portes se verouillent après avoir franchi le portail </br></p>


        <em> Retour à la maison </em></br>
        <p>- Désactive l'alarme </br></p>
        <p>- Déverrouille les portes et ouvre le portail </br></p>
        <p>- Chauffage mode confort 21°C</br></p>
        <p>- Luminosité des lieux de présence à 80%</br></p>

        <em> Intrusion </em> </br>
        <p>- La personne n'est pas identifiée donc l'alarme sonne</br></p>
        <p>- Message d'urgence envoyé à la police au bout de 3 minutes</br></p>
        <p>- Vérouille toutes les portes et désactive les lumières</br></p></br>

        <button> Utiliser </button>

      </div>

      <div class="eco">

        <h2> Mode économie d'énergie </h2> </br>
        <em> Options générales</em> <br><br> 
        <p>Eteint les lumieres lors d'une absence de 10 secondes dans une salle </br></p>
        <p>Ouverture/fermeture des stores </br></p>
        <p>Eteint les multiprises et appareils electronique non utilisés depuis 20 minutes </br></p>


        <em>Départ au travail </em> </br>
        <p>- Les lumières et appareils electronique s'éteignent </br></p>
        <p>- Les portes se vérouillent après avoir franchi le portail </br></p>


        <em> Retour à la maison </em> </br>
        <p>- Désactive l'alarme </br></p>
        <p>- Déverrouille les portes et ouvre le portail </br></p>
        <p>- Chauffage mode confort 18°C</br></p>
        <p>- Luminosité des lieux de présence à 60%</br></p>

        <em> Intrusion </em> </br>
        <p>- La personne n'est pas identifiée donc l'alarme sonne</br></p>
        <p>- Message d'urgence envoyé à la police au bout de 3 minutes</br></p>
        <p>- Vérouille toutes les portes et désactive les lumières</br></p></br>

        <button> Utiliser </button>

      </div>

    </div>
    
  </div>

</body>

<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</html>