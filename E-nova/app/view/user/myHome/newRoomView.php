<!DOCTYPE html>

<html>

<head>
 <meta charset="utf-8">
 <title>E-nova</title>
 <link href="public/css/myHomeStyle.css" rel="stylesheet">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/header.php'); ?>

  <div class="container">

    <h1 id="myHome_title">Mon Logement</h1>

    <div class="menuAddresses">
      <div class="dropdown">
        <button onclick="listAddress()" class="dropbtn">Choisissez votre adresse</button>
        <div id="myDropdown" class="dropdown-content">
          <?php
          while ($address = $addresses->fetch())
          {
            ?>
            <ul>
              <li>
                <a href="index.php?page=myHome&action=redirectionAddress&address_id=<?= $address['id'] ?>"><?= htmlspecialchars($address['numero']) . " " . htmlspecialchars($address['street']) . " " . htmlspecialchars($address['zip_code']) . " " . htmlspecialchars($address['city']) . " " . htmlspecialchars($address['country']); ?></a> 
              </li>
            </ul>
            <?php
          }
          $addresses->closeCursor();
          ?>
        </div>
      </div>
    </div>

    <h1 id="address"><?= htmlspecialchars($address_information['numero']) . " " . htmlspecialchars($address_information['street']) . " " . htmlspecialchars($address_information['zip_code']) . " " . htmlspecialchars($address_information['city']) . " " . htmlspecialchars($address_information['country']);?></h1>

    <div class="listRooms">
      <ul>

        <?php
        while ($room = $rooms->fetch())
        {
          ?>

          <li>

            <a href="index.php?page=myHome&action=redirectionRoom&room_id=<?= $room['id'] ?>"><?= htmlspecialchars($room['name']); ?></a> 

            <?php
            if ($_SESSION['user_security_level'] == 1) {
              ?>

              <a id="supprRooms" href="index.php?page=myHome&action=deleteRoom&room_id=<?= $room['id'] ?>">
                <i class="fas fa-trash-alt"></i>
              </a> 

              <?php
            }
            ?>

          </li>

          <?php
        }
        $rooms->closeCursor();
        ?>

      </ul>

    </div>
    <div class="formulaire_container">
      <div class="formulaire_salle">

        <h2 id="titleRoom">Ajout d'une nouvelle salle :</h2>

        <form action="index.php?page=myHome&action=addRoom" method="post">
          <div>
            <label for="name">Nom</label><br>
            <input type="text" id="name" name="name" >
          </div>
          <div>
            <label for="surface">Surface</label><br>
            <input type="number" id="surface" name="surface" >
          </div><br>
          <div>
            <input type="submit" class="validerbtn">
          </div>
        </form>
      </div>
    </div>

  </div>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>

<script type="text/javascript">

    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */

    function listAddress() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    
    // Close the dropdown menu if the user clicks outside of it

    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }

  </script>