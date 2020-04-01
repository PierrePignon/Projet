<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>E-nova</title>
	<link rel="stylesheet" type="text/css" href="public/css/aboutUsStyle.css">
	<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

	<?php 
	if(!isset($_SESSION['type_connexion']) || empty($_SESSION['type_connexion'])){
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/homeHeader.php'); 
	} elseif ($_SESSION['type_connexion'] == "user") {
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/header.php');
	} elseif ($_SESSION['type_connexion'] == "admin") {
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/header.php');
	}
	?>

	<div class="container">

		<div class="principal">	
			<h1>Qui sommes-nous ?</h1>
			<img src="public/images/team.jpg" class="logo" alt="E-nova">
		</div>

		<div id="contain">

			<div class="bio">
				<h2>E-nova, tout ce qu'il y aura de mieux sous votre toit</h2>

				E-nova est une société spécialisée dans l’intégration de solutions domotiques et de gestion technique du bâtiment. Nous accompagnons les particuliers et les professionnels de l’étude préalable à la mise en service, afin d’intégrer sans contraintes les nouvelles technologies d’automatisme et de multimédia dans vos projets de bâtiments résidentiels ou tertiaires.

			</div>

			<div class="team">

				<h2>E-nova, une équipe de choc</h2>

				Notre équipe est composé de jeunes ingénieurs talentueux ayant longtemps travaillé ensemble dans le domaine de la domotique. Connu jadis sous le nom de G9C, le groupe a sû évolué et s'est perfectionné afin de vous proposer les meilleures solutions du marché. 

			</div>

		</div>
		
		<img src="public/images/team2.jpg" class="pic" alt="E-nova groupe">

	</div>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>