<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>E-nova</title>
	<link rel="stylesheet" href="public/css/logInStyle.css">
	<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/homeHeader.php'); ?>

	<div class="container">

		<div class="connexion">

			<div class="connexion_main">

				<h1>Connexion</h1>	

				<form action="index.php?page=applyLogIn" method= "post">
					<input type="text" name="login" placeholder="Identifiant"></br>
					<input type="password" name="password" placeholder="Mot de passe"></br>
					<input type="submit" value="Se connecter" name="submit"></br>
				</form>

			</div>

		</div>
		
	</div>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>
	
</body>

</html>