<!DOCTYPE html>

<html>

<head>
 <meta charset="utf-8">
 <title>E-nova</title>
 <link rel="stylesheet" href="public/css/newUserStyle.css">
 <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/header.php'); ?>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/profile/menuProfile.php'); ?>

  <div class="container">

    <div class="main">

      <div id="contain">

        <h2>Ajout d'un Profil :</h2>

        <form action="index.php?page=profile&action=addUser" method= "post">

          <div class ="partie_gauche">
            <div>
              <label for="pseudonym">Nom d'utilisateur :</label><br />
              <input type="text" id="pseudonym" name="pseudonym" />
            </div>
            <div>
              <label for="security_level">Type d'utilisateur :</label><br />
              <select name="security_level" id="security_level">
                <option value= 1 >Utilisateur parent</option>
                <option value= 2 >Utilisateur enfant</option>
              </select>
            </div>
          </div>
          <div class ="partie_droite">    
            <div>
              <label for="password">Mot de passe :</label><br />
              <input type="password" id="password" name="password" />
            </div>
            <div>
              <label for="password_confirmed">Confirmation :</label><br />
              <input type="password" id="password_confirmed" name="password_confirmed" />
            </div>
          </div>
          <input type="submit" id="submit" name="submit" value="Ajouter"><br>
        </form>

      </div>

    </div>

  </div>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>