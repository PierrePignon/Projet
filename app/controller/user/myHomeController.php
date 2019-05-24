<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/AddressManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/RoomManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/SensorManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/ActuatorManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/DeviceManager.php');

function myHomeController(){

	if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
		header('Location: index.php?page=userSelection');
	} elseif (!isset($_GET['action']) || empty($_GET['action'])) {
		$action = "main";
	} else {
		$action = $_GET['action'];
	}

	switch ($action) {

		case 'main':

		$roomManager = new RoomManager();
		$numberRoom = $roomManager->countRoom($_SESSION['address_id']);
		if($numberRoom < 1){
			header('Location: index.php?page=myHome&action=newRoom');
		}

		$addressManager = new AddressManager();
		$sensorManager = new SensorManager();
		$actuatorManager = new ActuatorManager();
		$deviceManager = new DeviceManager();
		$typeSensors = $deviceManager->getTypeDevice("sensor");
		$typeActuators = $deviceManager->getTypeDevice("actuator");
		$addresses = $addressManager->getAddresses($_SESSION['customer_number']);
		$address_information = $addressManager->getInformationAddress($_SESSION['address_id']);
		$rooms = $roomManager->getRooms($_SESSION['address_id']);
		$room_name = $roomManager->getNameRoom($_SESSION['room_id']);
		$sensors = $sensorManager->getSensors($_SESSION['room_id']);
		$actuators = $actuatorManager->getActuators($_SESSION['room_id']);

		require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/myHome/myHomeView.php');

		break;

		case 'redirectionRoom':
		if (!isset($_GET['room_id']) || empty($_GET['room_id'])) {
			throw new Exception('Erreur 404');
		} else {
			$roomManager = new RoomManager();
			$room_address_id = $roomManager->getAddressIdRoom($_GET['room_id']);
			if ($room_address_id == $_SESSION['address_id']) {
				$_SESSION['room_id'] = $_GET['room_id'];
				header('Location: index.php?page=myHome');
			} else {
				throw new Exception('Erreur 404');
			}
		}
		break;

		case 'redirectionAddress':
		if (!isset($_GET['address_id']) || empty($_GET['address_id'])) {
			throw new Exception('Erreur 404');
		} else {
			$addressManager = new AddressManager();
			$address_account_customer_number = $addressManager->getAccountCustomerNumberAddress($_GET['address_id']);
			if ($address_account_customer_number == $_SESSION['customer_number']) {
				$_SESSION['address_id'] = $_GET['address_id'];

				$roomManager = new RoomManager();
				$rooms = $roomManager->getRooms($_SESSION['address_id']);
				$first_room = $rooms->fetch();
				$_SESSION['room_id'] = $first_room['id'];

				header('Location: index.php?page=myHome');
			} else {
				throw new Exception('Erreur 404');
			}
		}
		break;

		case 'newRoom':
		$addressManager = new AddressManager();
		$roomManager = new RoomManager();
		$addresses = $addressManager->getAddresses($_SESSION['customer_number']);
		$rooms = $roomManager->getRooms($_SESSION['address_id']);
		$address_information = $addressManager->getInformationAddress($_SESSION['address_id']);
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/myHome/newRoomView.php');
		break;

		case 'addRoom':

		if (!empty($_POST['name']) && !empty($_POST['surface'])) {
			
			$roomManager = new RoomManager();
			$affectedRoom = $roomManager->insertRoom($_POST['name'], $_POST['surface'], $_SESSION['address_id']);

			if ($affectedRoom === false) {
				throw new Exception('Impossible d\'ajouter la salle !');
			} else {
				$new_room_id = $roomManager->getIdNewRoom($_SESSION['address_id']);
				header("Location: index.php?page=myHome&action=redirectionRoom&room_id=" . $new_room_id);
			}

		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}

		break;

		case 'addSensor':

		if (!empty($_POST['type']) && !empty($_POST['name'])) {

			$sensorManager = new SensorManager();
			$affectedSensor = $sensorManager->insertSensor($_POST['type'], $_POST['name'], $_SESSION['room_id']);

			if ($affectedSensor === false) {
				throw new Exception('Impossible d\'ajouter le capteur !');
			} else {
				header("Location: index.php?page=myHome");
			}

		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}

		break;

		case 'addActuator':

		if (!empty($_POST['type']) && !empty($_POST['name'])) {
			
			$actuatorManager = new ActuatorManager();
			$affectedActuator = $actuatorManager->insertActuator($_POST['type'], $_POST['name'], $_SESSION['room_id']);

			if ($affectedActuator === false) {
				throw new Exception('Impossible d\'ajouter l\'actionneur !');
			} else {
				header("Location: index.php?page=myHome");
			}

		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}

		break;

		case 'deleteRoom':

		if (!isset($_GET['room_id']) || empty($_GET['room_id'])) {
			throw new Exception('Erreur 404');
		} else {

			$roomManager = new RoomManager();
			$room_address_id = $roomManager->getAddressIdRoom($_GET['room_id']);
			
			if ($room_address_id == $_SESSION['address_id']) {

				$sensorManager = new SensorManager();
				$sensors = $sensorManager->getSensors($_GET['room_id']);

				while ($sensor = $sensors->fetch())
				{
					$deletedSensor = $sensorManager->deleteSensor($sensor['id']);
				}

				$sensors->closeCursor();

				$actuatorManager = new ActuatorManager();
				$actuators = $actuatorManager->getActuators($_GET['room_id']);

				while ($actuator = $actuators->fetch())
				{
					$deletedActuator = $actuatorManager->deleteActuator($actuator['id']);
				}
				
				$actuators->closeCursor();

				$deletedRoom = $roomManager->deleteRoom($_GET['room_id']);

				if ($deletedRoom === false) {
					throw new Exception('Impossible de supprimer la salle ! ERREUR IMPORTANTE');
				} else {
					$roomManager = new RoomManager();
					$rooms = $roomManager->getRooms($_SESSION['address_id']);
					$first_room = $rooms->fetch();
					$_SESSION['room_id'] = $first_room['id'];
					header("Location: index.php?page=myHome");
				}

			} else {
				throw new Exception('Erreur 404');
			}

		}

		break;

		case 'deleteSensor':

		if (!isset($_GET['sensor_id']) || empty($_GET['sensor_id'])) {
			throw new Exception('Erreur 404');
		} else {

			$sensorManager = new SensorManager();
			$sensor_room_id = $sensorManager->getRoomIdSensor($_GET['sensor_id']);

			if ($sensor_room_id == $_SESSION['room_id']) {

				$deletedSensor = $sensorManager->deleteSensor($_GET['sensor_id']);

				if ($deletedSensor === false) {
					throw new Exception('Impossible de supprimer le capteur !');
				} else {
					header("Location: index.php?page=myHome");
				}

			} else {
				throw new Exception('Erreur 404');
			}

		}

		break;

		case 'deleteActuator':

		if (!isset($_GET['actuator_id']) || empty($_GET['actuator_id'])) {
			throw new Exception('Erreur 404');
		} else {

			$actuatorManager = new ActuatorManager();
			$actuator_room_id = $actuatorManager->getRoomIdActuator($_GET['actuator_id']);

			if ($actuator_room_id == $_SESSION['room_id']) {

				$deletedActuator = $actuatorManager->deleteActuator($_GET['actuator_id']);

				if ($deletedActuator === false) {
					throw new Exception('Impossible de supprimer l\' actionneur !');
				} else {
					header("Location: index.php?page=myHome");
				}

			} else {
				throw new Exception('Erreur 404');
			}

		}

		break;

		default:
		throw new Exception('Cette page n\'existe pas !');
		break;

	}

}