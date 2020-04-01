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

  <h1 id="address_salle"><?= htmlspecialchars($address_information['numero']) . " " . htmlspecialchars($address_information['street']) . " " . htmlspecialchars($address_information['zip_code']) . " " . htmlspecialchars($address_information['city']) . " " . htmlspecialchars($address_information['country'])." - ".htmlspecialchars($room_name); ?></h1>

  <div class="menu">

    <div class="menuRooms">
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

      <div class="bluebtn">
        <?php
        if ($_SESSION['user_security_level'] == 1) {
          ?>
          <ul>
            <li><a href="index.php?page=myHome&action=newRoom">Ajouter une Salle</a></li>
          </ul>
          <?php
        }
        ?>
      </div>

    </div>


    <div class="listSensors">

      <h2>Capteurs :</h2>

      <div class="Sensors">
        <p>

          <?php
          while ($sensor = $sensors->fetch())
          { 

            echo '<div class="iconSensors">';

            if ($sensor['type']=="Thermomètre"){
              echo '<img src="public/images/thermometer" class="thermometer">';
            } elseif ($sensor['type']=="Luminosité"){
              echo '<img src="public/images/lightbulb" class="lightbulb">';
            } elseif ($sensor['type']=="Infrarouge"){
              echo '<img src="public/images/IR_Sensor" class="IR_Sensor"> ';
            } else {
              echo '<img src="public/images/sensor" class="a_sensor"> ';
            }

            echo '</div>';
            echo '<div class="nameSensors">';
            echo htmlspecialchars($sensor['name']);
            echo '</div>';
            echo '<div class="valueSensors">';
            echo htmlspecialchars($sensor['value']);
            echo '</div>';

            ?>
            <div class="supprSensors">
              <?php
              if ($_SESSION['user_security_level'] == 1) {
                ?>
                <a id = "supprSensors" href="index.php?page=myHome&action=deleteSensor&sensor_id=<?= $sensor['id'] ?>"><i class="fas fa-times fa-2x"></i></a>
                <?php
              }
              ?>
            </div>

            <br />
            <br />
            <br />

            <?php
          }
          $sensors->closeCursor();
          ?>

        </p>

      </div>


      <div class="addCapteurs">
        <?php
        if ($_SESSION['user_security_level'] == 1) {
          ?>
          <p><a id="addCapteurs" ><i class="fas fa-plus-circle fa-2x"></i></a></p>
          <?php
        }
        ?>
      </div>

    </div>

    <div class="listActuators">

      <h2>Actionneurs :</h2>
      <div class="Actuators">
        <p>

          <?php
          while ($actuator = $actuators->fetch())
          { 

            echo '<div class="iconActuators">';

            if ($actuator['type']=="Stores"){
              echo '<img src="public/images/window" class="window"> ';
            } elseif ($actuator['type']=="Ventilateur"){
              echo '<img src="public/images/fan" class="ventilateur"> ';
            } elseif ($actuator['type']=="Caméra"){
              echo '<img src="public/images/camera" class="camera"> ';
            } elseif ($actuator['type']=="Lumière"){
              echo '<img src="public/images/lightbulb" class="lightbulb">';
            } else {
              echo '<img src="public/images/motor" class="motor"> ';
            }

            echo '</div>';
            echo '<div class="nameActuators">';
            echo htmlspecialchars($actuator['name']);
            echo '</div>';
            echo '<div class="valueActuators">';

            if ($actuator['value']=="0"){
              echo '<label class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
              </label>';
            }else if ($actuator['value']=="1"){
              echo '<label class="switch">
              <input type="checkbox" checked>
              <span class="slider round"></span>
              </label>';
            }

            echo '</div>';
            ?>
            
            <div class="supprActuators">
              <?php
              if ($_SESSION['user_security_level'] == 1) {
                ?>
                <a id = "supprActuators" href="index.php?page=myHome&action=deleteActuator&actuator_id=<?= $actuator['id'] ?>"><i class="fas fa-times fa-2x "></i></a>
                <?php
              }
              ?>
            </div>

            <br />
            <br />
            <br />

            <?php
          }
          $actuators->closeCursor();
          ?>

        </p>
      </div>

      <div class="addActionneurs">
        <?php
        if ($_SESSION['user_security_level'] == 1) {
          ?>
          <p><a id="addActionneurs"  ><i class="fas fa-plus-circle fa-2x"></i></a></p>
          <?php
        }
        ?>
      </div>

    </div>
  </div>


  <!-------------------------------------Overlay Capteurs---------------------------------------------------------------->

  <div id="overlay_capteurs" class="overlay">
    <div id="popup" class="popup"> 
      <div class="titre">Ajouter un capteur à <?= $room_name ?> :  </div>
      <form action="index.php?page=myHome&action=addSensor" method="post">

        <div class="type_container">
          <div class="type_selection">
            <select name="type" id="type_sensor" onchange="myFunction()">
              <?php
              while ($typeSensor = $typeSensors->fetch())
              {
                ?>
                <option value="<?= $typeSensor['name'] ?>"><?= htmlspecialchars($typeSensor['name']); ?></option>
                <?php
              }
              $typeSensors->closeCursor();
              ?>
            </select>
          </div>
          <div class="type_icons">
            <p id="icon_sensor"></p>
          </div>
        </div>
        <div class="textform">
          <label for="name">Nom du capteur</label><br />
          <input type="text" id="name" name="name" />
        </div><br />
        <div class="choice_container">
          <div class="annuler"><button id="annuler_capteurs" class="annulerbtn" type="button" onclick="closePopup1()">Annuler</button></div>
          <div class="valider"> <input class="validerbtn" type="submit"></div>
        </div>
      </form>
    </div>
  </div>

  <!-------------------------------------Overlay Actionneurs---------------------------------------------------------------->

  <div id="overlay_actionneurs" class="overlay">
    <div id="popup" class="popup"> 
      <div class="titre">Ajouter un actionneur à <?= $room_name ?> :  </div>
      <form action="index.php?page=myHome&action=addActuator" method="post">

        <div class="type_container">
          <div class="type_selection">
            <select name="type" id="type_actuator" onchange="myFunction2()">
              <?php
              while ($typeActuator = $typeActuators->fetch())
              {
                ?>
                <option value="<?= $typeActuator['name'] ?>"><?= htmlspecialchars($typeActuator['name']); ?></option>
                <?php
              }
              $typeActuators->closeCursor();
              ?>
            </select>
          </div>
          <div class="type_icons">
            <p id="icon_actuator"></p>
          </div>
        </div>
        <div class="textform">
          <label for="name">Nom de l'actionneur</label><br />
          <input type="text" id="name" name="name" />

        </div><br />
        <div class="choice_container">
          <div class="annuler"><button id="annuler_actionneurs" class="annulerbtn" type="button" onclick="closePopup2()">Annuler</button></div>
          <div class="valider"> <input class="validerbtn" type="submit"></div>
        </div>
      </form>
    </div>
  </div>

  <!----------------------------------Overlay Supprimer Capteurs------------------------------------------------------------
  <div id="overlay_supprimer_sensors" class="overlay">
    <div id="popup" class="popup">
      <div class="titre">Voulez vous supprimer ce capteur ?</div>
      <div class="choice_container">
        <div class="annuler"><i id="annuler_suppr_sensors" class="fas fa-times fa-2x "></i></div>
        <div class="valider"><a  href="index.php?page=myHome&action=deleteSensor&sensor_id=<?= $sensor['id'] ?>" > <input class="validerbtn" id="validerbtn_sensors"  type="submit" value="Valider"></a>
        </div>
      </div>
    </div>
  </div>
-->

  <!----------------------------------Overlay Supprimer Actionneurs------------------------------------------------------------

  <div id="overlay_supprimer_actuators" class="overlay">
    <div id="popup" class="popup">
      <div class="titre">Voulez vous supprimer cet actionneur ?</div>
      <div class="choice_container">
        <div class="annuler"><i id="annuler_suppr_actuators" class="fas fa-times fa-2x "></i></div>
        <div class="valider"> <a href="index.php?page=myHome&action=deleteActuator&actuator_id=<?= $actuator['id'] ?>"> <input class="validerbtn" id="validerbtn_actuators"  type="submit" value="Valider"></a>
        </div>
      </div>
    </div>
  </div>
-->

  <!----------------------------------Overlay Supprimer Rooms------------------------------------------------------------
  <div id="overlay_supprimer_rooms" class="overlay">
    <div id="popup" class="popup">
      <div class="titre">Voulez vous supprimer cette salle ?</div>
      <div class="choice_container">
        <div class="annuler"><i id="annuler_suppr_rooms" class="fas fa-times fa-2x "></i></div>
        <div class="valider"> <a href="index.php?page=myHome&action=deleteRoom&room_id=<?= $room['id'] ?>"><input class="validerbtn" id="validerbtn_rooms"  type="submit" value="Valider"></a>
        </div>
      </div>
    </div>
  </div>
-->

<script >
  var btn_addCapteurs = document.getElementById('addCapteurs');
  var btn_addActionneurs = document.getElementById('addActionneurs');
  var btn_supprRooms = document.getElementById("supprRooms");
  var btn_supprSensors = document.getElementById("supprSensors");
  var btn_supprActuators = document.getElementById("supprActuators");

  var overlay1 = document.getElementById('overlay_capteurs');
  var overlay2 = document.getElementById('overlay_actionneurs');
  var overlay3 = document.getElementById("overlay_supprimer_rooms");
  var overlay4 = document.getElementById("overlay_supprimer_sensors");
  var overlay5 = document.getElementById("overlay_supprimer_actuators");
  
  
  
  var btnClose3 = document.getElementById("annuler_suppr_rooms");
  var btnClose4 = document.getElementById("annuler_suppr_sensors");
  var btnClose5 = document.getElementById("annuler_suppr_actuators");

  btn_addCapteurs.addEventListener('click',openModal1);
  btn_addActionneurs.addEventListener('click',openModal2);
  btn_supprRooms.addEventListener('click',openModal3);
  btn_supprSensors.addEventListener('click',openModal4);
  btn_supprActuators.addEventListener('click',openModal5);

 
  
  btnClose3.addEventListener('click',closePopup3);
  btnClose4.addEventListener('click',closePopup4);
  btnClose5.addEventListener('click',closePopup5);


  function closePopup1() {
    var btnClose1 = document.getElementById("annuler_capteurs");
    btnClose1.addEventListener('click',closePopup1);
    overlay1.style.display='none';
  }
 
  function closePopup2() {
    var btnClose2 = document.getElementById("annuler_actionneurs");
    btnClose2.addEventListener('click',closePopup2);
    overlay2.style.display='none';
  }
  function closePopup3() {
    overlay3.style.display='none';
  }
  function closePopup4() {
    overlay4.style.display='none';
  }
  function closePopup5() {
    overlay5.style.display='none';
  }


  function openModal1() {
    overlay1.style.display ='block';
  }
  function openModal2() {
    overlay2.style.display ='block';
  }
  function openModal3(){
    overlay3.style.display = 'block';
  }
  function openModal4(){
    overlay4.style.display = 'block';
  }
  function openModal5(){
    overlay5.style.display = 'block';
  }

  function myFunction() {
    var x = document.getElementById("type_sensor").value;
    if (x=="Thermomètre"){
      document.getElementById("icon_sensor").innerHTML = 'Vous avez séléctionné le capteur suivant : <br><br><img src="public/images/thermometer" id="thermometer">';
      document.getElementById("thermometer").style.width ="25%";
    }else if (x=="Luminosité"){
      document.getElementById("icon_sensor").innerHTML = 'Vous avez séléctionné le capteur suivant : <br><br><img src="public/images/lightbulb" id="lightbulb">';
      document.getElementById("lightbulb").style.width ="25%";
    }else if (x=="Infrarouge"){
      document.getElementById("icon_sensor").innerHTML = 'Vous avez séléctionné le capteur suivant : <br><br><img src="public/images/IR_Sensor" id="IR_Sensor">';
      document.getElementById("IR_Sensor").style.width ="25%";
    }else{
      document.getElementById("icon_sensor").innerHTML = "Vous avez séléctionné l'actionneur suivant : <br><br><img src='public/images/sensor' id='sensor'>";
      document.getElementById("sensor").style.width ="25%";
    }
    
  }

  function myFunction2() {
    var y = document.getElementById("type_actuator").value;
    if (y=="Stores"){
      document.getElementById("icon_actuator").innerHTML = "Vous avez séléctionné l'actionneur suivant : <br><br><img src='public/images/window' id='window'>";
      document.getElementById("window").style.width ="25%";
    }else if (y=="Ventilateur"){
      document.getElementById("icon_actuator").innerHTML = "Vous avez séléctionné l'actionneur suivant : <br><br><img src='public/images/fan' id='fan'>";
      document.getElementById("fan").style.width ="25%";
    }else if (y=="Caméra"){
      document.getElementById("icon_actuator").innerHTML = "Vous avez séléctionné l'actionneur suivant : <br><br><img src='public/images/camera' id='camera'>";
      document.getElementById("camera").style.width ="25%";
    } else if (y=="Lumière"){
      document.getElementById("icon_actuator").innerHTML = "Vous avez séléctionné l'actionneur suivant : <br><br><img src='public/images/lightbulb' id='lumiere'>";
      document.getElementById("lumiere").style.width ="25%";
    } else {
      document.getElementById("icon_actuator").innerHTML = "Vous avez séléctionné l'actionneur suivant : <br><br><img src='public/images/motor' id='motor'>";
      document.getElementById("motor").style.width ="25%";
    }
  }
</script>

</div>

<?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>