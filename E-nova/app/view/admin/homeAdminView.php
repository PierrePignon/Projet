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

			<button id="CapteursActionneurs" onclick="window.location.href = 'index.php?page=device';"><p>Capteurs & Actionneurs</p></button>

			<button id="ListeClients" onclick="window.location.href = 'index.php?page=client';"><p>Liste Des Clients </p></button>

			<button id="assistance" onclick="window.location.href = 'index.php?page=mailbox';"><p>Assistance</p></button>

			<button id="faq" onclick="window.location.href = 'index.php?page=faq';"><p>FaQ</p></button>

			<button id="profil" onclick="window.location.href = 'index.php?page=profile';"><p>Profil</p></button>

			<button id="deconnecter" onclick="window.location.href = 'index.php?page=logOut';"><p>Se Déconnecter</p></button>

		</div>		

	</div>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>