<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="public/css/profileStyle.css">
  <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
  <title>E-nova</title>
</head>

<body>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/header.php'); ?>

  <div class="container">

    <h1 id="profile_title">Mon profil</h1>

    <div id="main">

      <div>
        <form action="index.php?page=profile&action=modifyFirstName" method="post">
          <div id="formu1">
            <label class = "lab4" for="name">Prénom</label><br />
            <input type="text" id="first_name" name="first_name" placeholder= <?= htmlspecialchars($_SESSION['first_name']); ?> />
            <input type="submit" value="modifier" />
          </div>
        </form>
      </div>

      <form action="index.php?page=profile&action=modifyLastName" method="post">
        <div id = "formu1">
          <label class ="lab1" for="name">Nom</label><br />
          <input type="text" id="last_name" name="last_name" placeholder= <?= htmlspecialchars($_SESSION['last_name']); ?> />
          <input type="submit" value="modifier" />
        </div>
      </form>

      <form action="index.php?page=profile&action=modifyPassword" method="post">
        <div id = "formu1">
          <label class ="lab3" for="name">Password</label><br />
          <input type="password" id="password" name="password" placeholder="*****" />
        </div>
        <div id = "formu1">
          <label class = "lab2" for="name">Confirmer</label><br />
          <input type="password" id="password_confirmed" name="password_confirmed" placeholder="*****" />
          <input type="submit" value="modifier" />
        </div>
      </form>

      <form action="index.php?page=profile&action=modifyMail" method="post">
        <div id = "formu1">
          <label class = "lab5" for="name">Email</label><br />
          <input type="email" id="mail" name="mail" placeholder= <?= htmlspecialchars($_SESSION['mail']); ?> />
          <input type="submit" value="modifier" />
        </div>
      </form>

      <form action="index.php?page=profile&action=modifyPhoneNumber" method="post">
        <div id = "formu1">
          <label class="lab2" for="name">Telephone</label><br />
          <input type="tel" id="phone_number" name="phone_number" placeholder= <?= htmlspecialchars($_SESSION['phone_number']); ?> />
          <input type="submit" value="modifier" />
        </div>
      </form>

    </div>    

  </div>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>