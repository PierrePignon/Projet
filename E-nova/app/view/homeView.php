<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>E-nova</title>
	<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
	<link rel="stylesheet" href= "public/css/homeStyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/homeHeader.php'); ?>

	<div class="container">

		<div class="contain">
			<img src="public/images/home.jpg" class="image">
			<div class="centered">
				<div class="liste"> 
					<div class="texttitle">Tout ce qu’il y aura de mieux sous votre toît</div>
				</div>
			</div>
		</div>

		<div class="contain">
			<img src="public/images/pro.jpg"  class="image">
			<div class="overlayleft">
				<div class="centered">
					<div class="text">
						<div class="white">
							Le monde d'aujourd'hui ne s'entend plus sans connexion, sans réseau ou sans la possibilité de contrôler les objets qui nous entourent par un claquement de doigt. Avez vous déjà imaginer un monde où votre maison serait assez intelligente pour éteindre le chauffage et les lumières lorque vous partez et les allumer lorsque vous revenez ? Ce monde est sous vos pieds, rejoignez nous-y.
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="contain">
			<img src="public/images/light.jpg" class="image">
			<div class="overlayright">
				<div class="centered">
					<div class="text">
						<div class="white">
							Envie d'une maison confortable, moderne, qui vous ressemble et respectueuse vis à vis de l'environnement ? E-nova team offre une gamme d’ensembles domotiques complets à des prix très compétitifs afin de vous proposer une solution adaptée à vos envies et besoins. Nous réalisons et installons votre projet Domotique dans toute la France et même ailleurs.
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="contain">
			<img src="public/images/futur.jpg"  alt="">
			<div class="centered">
				<div class="liste"> 

					<div class="text"><div class="white">Tout ce qu’il y aura de mieux sous votre toît</div>
				</div>
				<div class="button"  onclick="window.location.href = 'index.php?page=register'">Inscription</div>
			</div>
		</div>

	</div>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>