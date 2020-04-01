<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>E-nova</title>
	<link rel="stylesheet" href="public/css/registerStyle.css">
	<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/homeHeader.php'); ?>

	<div class='container'>

		<div class="register_main">

			<h1>Inscription</h1>

			<form action="index.php?page=applyRegister" method= "post">

				<div class="register">

					<div class="register_left">
						<input type="text" name="login" id="login" placeholder="Identifiant"><br>
						<input type="password" name="password" id="password" placeholder="Mot de passe"><br>
						<input type="password" name="password_confirmed" id ="password_confirmed" placeholder="Confirmation"><br>
						<input type="email" name="mail" id="mail" placeholder="Adresse Mail"><br>
						<input type="tel" name="phone_number" id="phone_number" placeholder="Téléphone"><br>
						<input type="text" name="last_name" id="last_name" placeholder="Nom"><br>
						<input type="text" name="first_name" id="first_name" placeholder="Prénom"><br>
					</div>

					<div class="register_right">
						<input type="text" id="numero" name="numero" placeholder="Numéro"><br>
						<input type="text" id="street" name="street" placeholder="Rue"><br>
						<input type="text" id="zip_code" name="zip_code" placeholder="Code Postal"><br>
						<input type="text" id="city" name="city" placeholder="Ville"><br>
						<input type="text" id="country" name="country" placeholder="Pays"><br>
						<input type="submit" id="submit" name="submit" value="S'inscrire"></br>
					</div>

				</div>

			</form>

		</div>

	</div>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>