<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>E-nova</title>
	<link rel="stylesheet" href= "public/css/faqStyle.css">
	<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>


<body>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/header.php'); ?>

	<div class="container">

		<h1 id="faq_title">FAQ</h1>

		<?php
		while ($data = $faqData->fetch())
		{
			?>

			<div class="sujet">
				<div class="title"><h1><?= htmlspecialchars($data['title']) ?> <h1>
				</div>	
				<div class="content"><h2><?= htmlspecialchars($data['content']) ?></h2></div>
				<div class="date_time"><p class="rightp"><?= htmlspecialchars($data['date_time']) ?></p></div>
			</div>

			<br>

			<?php
		}
		$faqData->closeCursor();
		?>

	</div>

	<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>