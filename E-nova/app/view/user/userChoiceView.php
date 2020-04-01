<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <title>E-nova</title>
  <link rel="stylesheet" type="text/css" href="public/css/userChoiceStyle.css">
</head>

<body>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/header.php'); ?>

  <div class="container">

    <h1>
      Qui est-ce ?
    </h1>

    <div class="profils">

      <?php
      while ($user = $users->fetch())
      {
        ?>

        <button class="btn_valid" onclick="window.location.href = 'index.php?page=userSelection&action=redirectionUser&user_id=<?= $user['id'] ?>';"><p><?= htmlspecialchars($user['pseudonym']); ?></p></button>

        <?php
      }
      $users->closeCursor();
      ?>

    </div>

  </div>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>