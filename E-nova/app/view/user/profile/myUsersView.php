<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <title>E-nova</title>
  <link rel="stylesheet" href="public/css/myUsersStyle.css">
  <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/header.php'); ?>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/profile/menuProfile.php'); ?>

  <div class="container">

    <h1 id="profile_title">Mes utilisateurs</h1>

    <div id="main">

      <div class="list">

       <?php
       while ($user = $users->fetch())
       {
        ?>

        <div class="compte"> <p class = "pseudo"><?= htmlspecialchars($user['pseudonym']); ?> </p>

          <form action="index.php?page=profile&action=modifyPseudonymUser&user_id=<?= $user['id'] ?>" method="post">
            <div id = "formu1">
              <label class ="lab1" for="name">Pseudonyme :</label><br />
              <div class="input_1">
                <input type="text" id="pseudonym" name="pseudonym" placeholder= <?= $user['pseudonym']; ?> />
                <input type="submit" value="modifier" />
              </div>
            </div>
          </form>

          <form action="index.php?page=profile&action=modifyPasswordUser&user_id=<?= $user['id'] ?>" method="post">
            <div id = "formu1">
              <label class ="lab3" for="name">Mot de passe :</label><br />
              <div class="input_2">
                <input type="password" id="password" name="password" placeholder="*****" />
              </div>
            </div>
            <div id = "formu1">
              <label class = "lab2" for="name">Confirmation :</label><br />
              <div class="input_1">
                <input type="password" id="password_confirmed" name="password_confirmed" placeholder="*****" />
                <input type="submit" value="modifier" />
              </div>
            </div>
          </form> 

          <a class="supp" href="index.php?page=profile&action=deleteUser&user_id=<?= $user['id'] ?>">Supprimer</a>

        </div>
        <?php
      }
      $users->closeCursor();
      ?>

      <a class="ajouter" href="index.php?page=profile&action=newUser">Ajouter un utilisateur</a>

    </div>

  </div> 

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>