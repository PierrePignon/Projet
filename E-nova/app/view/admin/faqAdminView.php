<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>E-nova</title>
	<link rel="stylesheet" href= "public/css/faqStyle.css">
	<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>


<body>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/header.php'); ?>

	<div class="container">

		<h1 id="faq_title">FAQ</h1>

		<?php
		while ($data = $faqData->fetch())
		{
			?>

			<div class="sujet">
				<div class="title"><h1><?= htmlspecialchars($data['title']) ?></h1></div>	
				<div class="content"><h2><?= htmlspecialchars($data['content']) ?></h2></div>
				<div class="date_time"><p class="rightp"><?= htmlspecialchars($data['date_time']) ?></p></div>
				<div class="delete_faq"><p class="rightp"><a href="index.php?page=faq&action=deleteFaq&faq_id=<?= $data['id'] ?>">Supprimer</a></p></div>
			</div>

			<br>

			<?php
		}
		$faqData->closeCursor();
		?>

		<div class="newFaqEntry">
			<form action="index.php?page=faq&action=addFaq" method="post">
				<p class="leftp">Titre de votre sujet</p>
				<input type="text" name="title" id="title" />
				<p class="leftp">Coeur du message</p>
				<textarea rows = "5" type="text" name="content" id="content" /></textarea><br><br>
				<button id="ajouter">Ajouter</button>
			</form>
		</div>

	</div>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>