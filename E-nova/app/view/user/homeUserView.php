<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>E-nova</title>
	<link rel="stylesheet" href= "public/css/homeUserStyle.css">
	<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

	<div class="container">

		<h1 id="home_title">E-Nova Team</h1>

		<div id="main">

			<button id="logement" onclick="window.location.href = 'index.php?page=myHome';"><p>Mon Logement</p></button>

			<button id="scenario" onclick="window.location.href = 'index.php?page=myScenario';"><p>Mes Scénarios</p></button>

			<button id="consommation" onclick="window.location.href = 'index.php?page=myConso';"><p>Ma Consommation</p></button>

			<button id="connecte" onclick="window.location.href = 'index.php?page=userSelection';"><p>Mes Utilisateurs</p></button>

			<button id="profil" onclick="window.location.href = 'index.php?page=profile';"><p>Mon Profil</p></button>	

			<button id="assistance" onclick="window.location.href = 'index.php?page=mailbox';"><p>Messagerie</p></button>

			<button id="faq" onclick="window.location.href = 'index.php?page=faq';"><p>FaQ</p></button>

			<button id="deconnecter" onclick="window.location.href = 'index.php?page=logOut';"><p>Se Déconnecter</p></button>

		</div>		

	</div>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>