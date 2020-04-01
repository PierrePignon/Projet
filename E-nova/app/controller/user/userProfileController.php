<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/AccountManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/AddressManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/RoomManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/SensorManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/ActuatorManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/UserManager.php');

function userProfileController(){

	if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
		header('Location: index.php?page=userSelection');
	} elseif ($_SESSION['user_security_level'] != 1) {
		throw new Exception('Vous n\'avez pas les droits pour accéder à cette section ! Veuillez vous connectez avec un compte parent !');
	} elseif (!isset($_GET['action']) || empty($_GET['action'])) {
		$action = "main";
	} else {
		$action = $_GET['action'];
	}

	switch ($action) {

		case 'main':
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/profile/myProfileView.php');
		break;

		case 'myUsers':
		$userManager = new UserManager();
		$users = $userManager->getUsers($_SESSION['customer_number']);
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/profile/myUsersView.php');
		break;

		case 'newUser':
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/profile/newUserView.php');
		break;

		case 'addUser':
		if (!empty($_POST['pseudonym']) && !empty($_POST['password']) && !empty($_POST['password_confirmed']) && !empty($_POST['security_level'])) {
			if ($_POST['password'] == $_POST['password_confirmed']) {
				$userManager = new UserManager();
				$affectedUser = $userManager->insertUser($_POST['pseudonym'], $_POST['password'], $_POST['security_level'], $_SESSION['customer_number']);
				if ($affectedUser === false) {
					throw new Exception('Impossible de creer le compte !');
				} else {
					header("Location: index.php?page=profile&action=myUsers");
				}
			} else {
				throw new Exception('Vos mots de passe doivent être identiques');
			}
		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}
		break;

		case 'deleteUser':
		if (!isset($_GET['user_id']) || empty($_GET['user_id'])) {
			throw new Exception('Erreur 404');
		} else {
			$userManager = new UserManager();
			$user_account_customer_number = $userManager->getAccountCustomerNumberUser($_GET['user_id']);
			if ($user_account_customer_number == $_SESSION['customer_number']) {
				$deletedUser = $userManager->deleteUser($_GET['user_id']);
				if ($deletedUser === false) {
					throw new Exception('Impossible de supprimer l\'utilisateur !');
				} else {
					header("Location: index.php?page=profile&action=myUsers");
				}
			} else {
				throw new Exception('Erreur 404');
			}
		}
		break;

		case 'modifyPseudonymUser':
		if (!isset($_GET['user_id']) || empty($_GET['user_id'])) {
			throw new Exception('Erreur 404');
		} else {
			$userManager = new UserManager();
			$user_account_customer_number = $userManager->getAccountCustomerNumberUser($_GET['user_id']);
			if ($user_account_customer_number == $_SESSION['customer_number']) {
				if (!empty($_POST['pseudonym'])) {
					$updatedPseudonym = $userManager->updatePseudonym($_POST['pseudonym'], $_GET['user_id']);
					if ($updatedPseudonym === false) {
						throw new Exception('Impossible de modifier le pseudonyme !');
					} else {
						header('Location: index.php?page=profile&action=myUsers');
					}
				} else {
					throw new Exception('Tous les champs ne sont pas remplis !');
				}
			} else {
				throw new Exception('Erreur 404');
			}
		}
		break;

		case 'modifyPasswordUser':
		if (!isset($_GET['user_id']) || empty($_GET['user_id'])) {
			throw new Exception('Erreur 404');
		} else {
			$userManager = new UserManager();
			$user_account_customer_number = $userManager->getAccountCustomerNumberUser($_GET['user_id']);
			if ($user_account_customer_number == $_SESSION['customer_number']) {
				if (!empty($_POST['password']) && !empty($_POST['password_confirmed'])) {
					if ($_POST['password'] == $_POST['password_confirmed']) {
						$updatedPassword = $userManager->updatePassword($_POST['password'], $_GET['user_id']);
						if ($updatedPassword === false) {
							throw new Exception('Impossible de modifier le mot de passe !');
						} else {
							header('Location: index.php?page=profile&action=myUsers');
						}
					} else {
						throw new Exception('Vos mots de passe doivent être identiques');
					}
				} else {
					throw new Exception('Tous les champs ne sont pas remplis !');
				}
			} else {
				throw new Exception('Erreur 404');
			}
		}
		break;

		case 'myAddresses':
		$addressManager = new AddressManager();
		$addresses = $addressManager->getAddresses($_SESSION['customer_number']);
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/profile/myAddressesView.php');
		break;

		case 'newAddress':
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/profile/newAddressView.php');
		break;

		case 'addAddress':
		if (!empty($_POST['numero']) && !empty($_POST['street']) && !empty($_POST['zip_code']) && !empty($_POST['city']) && !empty($_POST['country'])) {
			$addressManager = new AddressManager();
			$affectedAddress = $addressManager->insertAddress($_POST['numero'], $_POST['street'], $_POST['zip_code'], $_POST['city'], $_POST['country'], $_SESSION['customer_number']);
			if ($affectedAddress === false) {
				throw new Exception('Impossible d\'ajouter l\'adresse !');
			} else {
				header("Location: index.php?page=profile&action=myAddresses");
			}
		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}
		break;

		case 'deleteAddress':

		if (!isset($_GET['address_id']) || empty($_GET['address_id'])) {
			throw new Exception('Erreur 404');
		} else {

			$addressManager = new AddressManager();
			$address_account_customer_number = $addressManager->getAccountCustomerNumberAddress($_GET['address_id']);
			
			if ($address_account_customer_number == $_SESSION['customer_number']) {

				$numberAddress = $addressManager->countAddress($_SESSION['customer_number']);

				if($numberAddress < 2){
					throw new Exception('Vous ne pouvez pas supprimer votre unique adresse ! Veuillez en créer une deuxième pour la supprimer !');
				}

				$roomManager = new RoomManager();
				$sensorManager = new SensorManager();
				$actuatorManager = new ActuatorManager();
				$rooms = $roomManager->getRooms($_GET['address_id']);

				while ($room = $rooms->fetch()) {

					$sensors = $sensorManager->getSensors($room['id']);

					while ($sensor = $sensors->fetch())
					{
						$deletedSensor = $sensorManager->deleteSensor($sensor['id']);
					}

					$sensors->closeCursor();

					$actuators = $actuatorManager->getActuators($room['id']);

					while ($actuator = $actuators->fetch())
					{
						$deletedActuator = $actuatorManager->deleteActuator($actuator['id']);
					}

					$actuators->closeCursor();

					$deletedRoom = $roomManager->deleteRoom($room['id']);

				}

				$rooms->closeCursor();

				$deletedAddress = $addressManager->deleteAddress($_GET['address_id']);

				if ($deletedAddress === false) {
					throw new Exception('Impossible de supprimer l\'adresse ! ERREUR IMPORTANTE');
				} else {
					$addressManager = new AddressManager();
					$addresses = $addressManager->getAddresses($_SESSION['customer_number']);
					$first_address = $addresses->fetch();
					$_SESSION['address_id'] = $first_address['id'];

					$roomManager = new RoomManager();
					$rooms = $roomManager->getRooms($_SESSION['address_id']);
					$first_room = $rooms->fetch();
					$_SESSION['room_id'] = $first_room['id'];

					header("Location: index.php?page=profile&action=myAddresses");
				}

			} else {
				throw new Exception('Erreur 404');
			}

		}

		break;

		case 'modifyFirstName':
		if (!empty($_POST['first_name'])) {
			$accountManager = new AccountManager();
			$updatedFirstName = $accountManager->updateFirstName($_POST['first_name'], $_SESSION['customer_number']);
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
			$accountManager = new AccountManager();
			$updatedLastName = $accountManager->updateLastName($_POST['last_name'], $_SESSION['customer_number']);
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
				$accountManager = new AccountManager();
				$updatedPassword = $accountManager->updatePassword($_POST['password'], $_SESSION['customer_number']);
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
			$accountManager = new AccountManager();
			$updatedMail = $accountManager->updateMail($_POST['mail'], $_SESSION['customer_number']);
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
			$accountManager = new AccountManager();
			$updatedPhoneNumber = $accountManager->updatePhoneNumber($_POST['phone_number'], $_SESSION['customer_number']);
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