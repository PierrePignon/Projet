<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/UserManager.php');

function userSelectionController(){

	if (!isset($_GET['action']) || empty($_GET['action'])) {
		$action = "main";
	} else {
		$action = $_GET['action'];
	}

	switch ($action) {

		case 'main':
		$userManager = new UserManager();
		$users = $userManager->getUsers($_SESSION['customer_number']);
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/userChoiceView.php');
		break;

		case 'redirectionUser':
		if (!isset($_GET['user_id']) || empty($_GET['user_id'])) {
			throw new Exception('Erreur 404');
		} else {
			$userManager = new UserManager();
			$user_account_customer_number = $userManager->getAccountCustomerNumberUser($_GET['user_id']);
			if ($user_account_customer_number == $_SESSION['customer_number']) {
				$_SESSION['user_id'] = $_GET['user_id'];
				$_SESSION['user_security_level'] = $userManager->getSecurityLevelUser($_SESSION['user_id']);
				header('Location: index.php');
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