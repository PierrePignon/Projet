<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>E-nova</title>
	<link rel="stylesheet" href="public/css/deviceStyle.css">
	<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/header.php'); ?>

	<div class="main">

		<div class="container">

			<div class="listTypeSensor">
				<div class="border">

					<h2>Liste des différents types de capteurs :</h2>

					<p>

						<?php
						while ($typeSensor = $typeSensors->fetch())
						{
							echo htmlspecialchars($typeSensor['name']);
							?> 
							<a href="index.php?page=device&action=deleteDevice&device_id=<?= $typeSensor['id'] ?>" class="supp">supprimer</a>
							<br />
							<?php
						}
						$typeSensors->closeCursor();
						?>

					</p>
				</div>

			</div>

			<div class="listTypeActuator">
				<div class="border">

					<h2>Liste des différents types d'actionneurs :</h2>

					<p>

						<?php
						while ($typeActuator = $typeActuators->fetch())
						{
							echo htmlspecialchars($typeActuator['name']);
							?>
							<a class="supp" href="index.php?page=device&action=deleteDevice&device_id=<?= $typeActuator['id'] ?>">supprimer</a>
							<br />
							<?php
						}
						$typeActuators->closeCursor();
						?>

					</p>

				</div>
			</div>
		</div>

		<button class="btn_newapp" id="btn_newapp">Ajouter un nouveau type d'appareil</button>

	</div>
	
	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>


<div id ="overlay_newapp" class="overlay_newapp">
	<div id="popup" class="popup_newapp"> 
		<div class="titre">
			Ajout d'un nouveau type de capteur/actionneur
		</div>
		<br>
		<div class="corpusover">
			<form action="index.php?page=device&action=addDevice" method="post">
				<div>
					<label class="overlay_h2">Nom</label><br/>
					<input type="text" id="name" name="name" />
				</div>
				<div>
					<label class="overlay_h2">Type</label><br />
					<br>
					<select name="type" id="type">
						<option value="sensor">Capteur</option>
						<option value="actuator">Actionneur</option>
					</select>
				</div>
				<br>
				<div class="choice_container">
					<div class="annuler"><button id="btnClose2" class="annulerbtn" type="button">Annuler</button></div>
					<div class="valider"> <input class="validerbtn" type="submit"></div>
				</div>
			</form>
		</div>
	</div>
</div>

<script >
	var btn_newapp = document.getElementById('btn_newapp');
	var overlay_newapp = document.getElementById('overlay_newapp');
	var btnClose = document.getElementById('btnClose2');

	btn_newapp.addEventListener('click',openModal);

	btnClose2.addEventListener('click',closePopup);

	function closePopup() {
		overlay_newapp.style.display='none';
	}

	function openModal() {
		overlay_newapp.style.display ='block';
	}
</script>