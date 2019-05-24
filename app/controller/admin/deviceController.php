<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/DeviceManager.php');

function deviceController(){

	if (!isset($_GET['action']) || empty($_GET['action'])) {
		$action = "main";
	} else {
		$action = $_GET['action'];
	}

	switch ($action) {

		case 'main':
		$deviceManager = new DeviceManager();
		$typeSensors = $deviceManager->getTypeDevice("sensor");
		$typeActuators = $deviceManager->getTypeDevice("actuator");
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/deviceView.php');
		break;

		case 'addDevice':
		if (!empty($_POST['type']) && !empty($_POST['name'])) {

			$deviceManager = new DeviceManager();
			$affectedTypeDevice = $deviceManager->insertTypeDevice($_POST['name'], $_POST['type']);

			if ($affectedTypeDevice === false) {
				throw new Exception('Impossible d\'ajouter le type d\'appareil !');
			} else {
				header("Location: index.php?page=device");
			}

		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}
		break;

		case 'deleteDevice':
		if (!isset($_GET['device_id']) || empty($_GET['device_id'])) {
			throw new Exception('Erreur 404');
		} else {
			$deviceManager = new DeviceManager();
			$deletedTypeDevice = $deviceManager->deleteTypeDevice($_GET['device_id']);
			if ($deletedTypeDevice === false) {
				throw new Exception('Impossible de supprimer ce type d\'appareil !');
			} else {
				header("Location: index.php?page=device");
			}
		}
		break;

		default:
		throw new Exception('Cette page n\'existe pas !');
		break;

	}

}