<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/footerController.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/AccountManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/AdministratorManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/UserManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/AddressManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/RoomManager.php');

function homeController(){

	if (!isset($_GET['page']) || empty($_GET['page'])) {
		$page = "main";
	} else {
		$page = $_GET['page'];
	}

	switch ($page) {

		case 'main':
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/homeView.php');
		break;

		case 'logIn':
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/logInView.php');
		break;

		case 'register':
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/registerView.php');
		break;

		case 'applyLogIn':

		if (!empty($_POST['login']) && !empty($_POST['password'])) {
			
			$accountManager = new AccountManager();
			$true_login_user = $accountManager->checkLogin($_POST['login']);

			$administratorManager = new AdministratorManager();
			$true_login_admin = $administratorManager->checkLogin($_POST['login']);

			if ($true_login_user->fetch()) {

				$password_db = $accountManager->getPassword($_POST['login']);

				if (password_verify($_POST['password'], $password_db)) {
					
					$_SESSION['type_connexion'] = "user";

					$_SESSION['login'] = $_POST['login'];

					$accountManager = new AccountManager();
					$account_information = $accountManager->getAccountInformation($_POST['login']);

					$_SESSION['customer_number'] = $account_information['customer_number'];
					$_SESSION['mail'] = $account_information['mail'];
					$_SESSION['phone_number'] = $account_information['phone_number'];
					$_SESSION['last_name'] = $account_information['last_name'];
					$_SESSION['first_name'] = $account_information['first_name'];
					$_SESSION['administrator_id'] = $account_information['administrator_id'];

					$addressManager = new AddressManager();
					$addresses = $addressManager->getAddresses($_SESSION['customer_number']);
					$first_address = $addresses->fetch();
					$_SESSION['address_id'] = $first_address['id'];

					$roomManager = new RoomManager();
					$rooms = $roomManager->getRooms($_SESSION['address_id']);
					$first_room = $rooms->fetch();
					$_SESSION['room_id'] = $first_room['id'];

					header('Location: index.php');
					
				} else {
					throw new Exception('Mauvais mot de passe');
				}

			} elseif ($true_login_admin->fetch()) {

				$password_db = $administratorManager->getPassword($_POST['login']);

				if (password_verify($_POST['password'], $password_db)) {
					
					$_SESSION['type_connexion'] = "admin";

					$_SESSION['login'] = $_POST['login'];

					$account_information = $administratorManager->getAdministratorInformation($_POST['login']);

					$_SESSION['id'] = $account_information['id'];
					$_SESSION['mail'] = $account_information['mail'];
					$_SESSION['phone_number'] = $account_information['phone_number'];
					$_SESSION['last_name'] = $account_information['last_name'];
					$_SESSION['first_name'] = $account_information['first_name'];
					
					$accountManager = new AccountManager();
					$clients = $accountManager->getClients($_SESSION['id']);
					$first_client = $clients->fetch();
					$_SESSION['client_id'] = $first_client['customer_number'];

					header('Location: index.php');
					
				} else {
					throw new Exception('Mauvais mot de passe');
				}

			}
			else { 
				throw new Exception('Cet utilisateur n\'existe pas');
			}

		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}

		break;

		case 'applyRegister':

		if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password_confirmed']) && !empty($_POST['mail']) && !empty($_POST['phone_number']) && !empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['numero']) && !empty($_POST['street']) && !empty($_POST['zip_code']) && !empty($_POST['city']) && !empty($_POST['country'])) {

			if ($_POST['password'] == $_POST['password_confirmed']) {

				$administratorManager = new AdministratorManager();

				$validLoginAdmin = $administratorManager->checkLogin($_POST['login']);

				if ($validLoginAdmin->fetch()) {
					throw new Exception('Ce nom d\'utilisateur est déjà utilisé !');
				}

				$validEmailAdmin = $administratorManager->checkMail($_POST['mail']);

				if ($validEmailAdmin->fetch()) {
					throw new Exception('Cette adresse mail est déjà utilisé !');
				}

				$accountManager = new AccountManager();

				$validLoginUser = $accountManager->checkLogin($_POST['login']);

				if ($validLoginUser->fetch()) {
					throw new Exception('Ce nom d\'utilisateur est déjà utilisé !');
				}

				$validEmailUser = $accountManager->checkMail($_POST['mail']);

				if ($validEmailUser->fetch()) {
					throw new Exception('Cette adresse mail est déjà utilisée !');
				}

				$affectedAccount = $accountManager->insertAccount($_POST['login'], $_POST['password'], $_POST['mail'], $_POST['phone_number'], $_POST['last_name'], $_POST['first_name']);

				if ($affectedAccount === false) {
					throw new Exception('Impossible de creer le compte !');
				}

				$new_account_customer_number = $accountManager->getIdNewAccount($_POST['login']);

				$userManager = new userManager();

				$affectedUser = $userManager->insertUser("Parent", "parent", 1, $new_account_customer_number);

				if ($affectedUser === false) {
					throw new Exception('Erreur dans la création du profil de l\'utilisateur !');
				}

				$addressManager = new AddressManager();

				$affectedAddress = $addressManager->insertAddress($_POST['numero'], $_POST['street'], $_POST['zip_code'], $_POST['city'], $_POST['country'], $new_account_customer_number);

				if ($affectedAddress === false) {
					throw new Exception('Impossible d\'ajouter l\'adresse au compte ! Mais le compte a été créé...');
				} else {
					header("Location: index.php?page=logIn");
				}

			} else {
				throw new Exception('Vos mots de passe doivent être identiques');
			}

		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}

		break;

		case 'footer':
		footerController();
		break;

		default:
		throw new Exception('Cette page n\'existe pas !');
		break;

	}

}