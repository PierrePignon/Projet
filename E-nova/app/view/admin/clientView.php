<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>E-nova</title>
	<link rel="stylesheet" href= "public/css/clientStyle.css">

</head>

<body>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/header.php'); ?>

	<div class="container">

		<div id="main">

			<div class="listClients">

				<h2>Liste des clients associés à l'administrateur </h2>

				<div class="clientTable">
					
					<table>
						<tr class="Categories">
							<th>Login </th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Adresse Mail</th>
							<th>Numéro de Téléphone </th>
							<th>Numéro Client</th>
						</tr>

						<?php
						$compteur = 0;
						while ($client = $clients->fetch())
						{
							?>
							<tr>
								<td><?=  htmlspecialchars($client['login']); ?></td>
								<td><?=  htmlspecialchars($client['last_name']); ?></td>
								<td><?=  htmlspecialchars($client['first_name']); ?></td>
								<td><?=  htmlspecialchars($client['mail']); ?></td>
								<td><?=  htmlspecialchars("+33" . $client['phone_number']); ?></td>
								<td><?=  htmlspecialchars($client['customer_number']); ?></td>
							</tr>
							
							<?php
							$compteur = $compteur + 1;
						}
						$clients->closeCursor();
						?>	

						
					</table>

					

				</div>

			</div>

		</div>		

	</div>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>