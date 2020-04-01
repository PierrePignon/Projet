<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <title>E-nova</title>
  <link rel="stylesheet" href="public/css/myAddressesStyle.css">
  <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/header.php'); ?>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/profile/menuProfile.php'); ?>

  <div class="container">

    <h1 id="profile_title">Mes adresses</h1>

    <div id="main">

      <div class="listAddresses">

        <?php
        while ($address = $addresses->fetch())
        {
          ?>
          <li><?= htmlspecialchars($address['numero']) . " " . htmlspecialchars($address['street']) . " " . htmlspecialchars($address['zip_code']) . " " . htmlspecialchars($address['city']) . " " . htmlspecialchars($address['country']); ?> 
          <a class ="supp" href="index.php?page=profile&action=deleteAddress&address_id=<?= $address['id'] ?>">Supprimer</a></li>
          <?php
        }
        $addresses->closeCursor();
        ?>
        <br>   
        <a class="ajout" href="index.php?page=profile&action=newAddress">Ajouter une adresse</a>

      </div>

    </div>

  </div>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>