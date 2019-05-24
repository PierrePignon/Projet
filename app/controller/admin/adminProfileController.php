<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/AdministratorManager.php');

function adminProfileController(){

	if (!isset($_GET['action']) || empty($_GET['action'])) {
		$action = "main";
	} else {
		$action = $_GET['action'];
	}

	switch ($action) {

		case 'main':
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/profileView.php');
		break;

		case 'modifyFirstName':
		if (!empty($_POST['first_name'])) {
			$administratorManager = new AdministratorManager();
			$updatedFirstName = $administratorManager->updateFirstName($_POST['first_name'], $_SESSION['id']);
			if ($updatedFirstName === false) {
				throw new Exception('Impossible de modifier le prenom !');
			} else {
				$_SESSION['first_name'] = $_POST['first_name'];
				header('Location: index.php?page=profile');
			}
		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}
		break;

		case 'modifyLastName':
		if (!empty($_POST['last_name'])) {
			$administratorManager = new AdministratorManager();
			$updatedLastName = $administratorManager->updateLastName($_POST['last_name'], $_SESSION['id']);
			if ($updatedLastName === false) {
				throw new Exception('Impossible de modifier le nom !');
			} else {
				$_SESSION['last_name'] = $_POST['last_name'];
				header('Location: index.php?page=profile');
			}
		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}
		break;

		case 'modifyPassword':
		if (!empty($_POST['password']) && !empty($_POST['password_confirmed'])) {
			if ($_POST['password'] == $_POST['password_confirmed']) {
				$administratorManager = new AdministratorManager();
				$updatedPassword = $administratorManager->updatePassword($_POST['password'], $_SESSION['id']);
				if ($updatedPassword === false) {
					throw new Exception('Impossible de modifier le mot de passe !');
				} else {
					header('Location: index.php?page=profile');
				}
			} else {
				throw new Exception('Vos mots de passe doivent être identiques');
			}
		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}
		break;

		case 'modifyMail':
		if (!empty($_POST['mail'])) {
			$administratorManager = new AdministratorManager();
			$updatedMail = $administratorManager->updateMail($_POST['mail'], $_SESSION['id']);
			if ($updatedMail === false) {
				throw new Exception('Impossible de modifier l\'adresse mail !');
			} else {
				$_SESSION['mail'] = $_POST['mail'];
				header('Location: index.php?page=profile');
			}
		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}
		break;

		case 'modifyPhoneNumber':
		if (!empty($_POST['phone_number'])) {
			$administratorManager = new AdministratorManager();
			$updatedPhoneNumber = $administratorManager->updatePhoneNumber($_POST['phone_number'], $_SESSION['id']);
			if ($updatedPhoneNumber === false) {
				throw new Exception('Impossible de modifier le numero de telephone !');
			} else {
				$_SESSION['phone_number'] = $_POST['phone_number'];
				header('Location: index.php?page=profile');
			}
		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}
		break;

		default:
		throw new Exception('Cette page n\'existe pas !');
		break;

	}

}