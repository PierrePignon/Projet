<!DOCTYPE html>

<html>

<head>
 <meta charset="utf-8">
 <title>E-nova</title>
 <link rel="stylesheet" href="public/css/newAddressStyle.css">
 <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/header.php'); ?>

  <div class="container">

   <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/profile/menuProfile.php'); ?>

   <div class="main">

    <div id="contain">

      <h2>Ajouter une adresse :</h2>

      <form action="index.php?page=profile&action=addAddress" method="post">
        <div class ="container">
          <div class="partie_gauche">
            <div>
              <label for="numero">Numero :</label><br />
              <input type="number" id="numero" name="numero" />
            </div>
            <div>
              <label for="street">Rue :</label><br />
              <input type="text" id="street" name="street" />
            </div>
            <div>
              <label for="zip_code">Code Postal :</label><br />
              <input type="number" id="zip_code" name="zip_code" />
            </div>
          </div>
          <div class="partie_droite">
            <div>
              <label for="city">Ville :</label><br />
              <input type="text" id="city" name="city" />
            </div>
            <div>
              <label for="country">Pays :</label><br />
              <input type="text" id="country" name="country" />
            </div>
          </div>
        </div>
        <input type="submit" />
      </form>

    </div>

  </div>

</div>

<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>