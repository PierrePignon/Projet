<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/user/myHomeController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/user/userSelectionController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/user/userProfileController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/user/userMailboxController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/user/userFaqController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/footerController.php');

function userController(){

	if (!isset($_GET['page']) || empty($_GET['page'])) {
		$page = "main";
	} else {
		$page = $_GET['page'];
	}

	switch ($page) {

		case 'main':
		if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
			header('Location: index.php?page=userSelection');
		} else {
			require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/homeUserView.php');
		}
		break;

		case 'myHome':
		myHomeController();
		break;

		case 'myScenario':
		if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
			header('Location: index.php?page=userSelection');
		} else {
			require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/scenarioView.php');
		}
		break;

		case 'myConso':
		if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
			header('Location: index.php?page=userSelection');
		} else {
			require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/consoView.php');
		}
		break;

		case 'userSelection':
		userSelectionController();
		break;

		case 'profile':
		userProfileController();
		break;

		case 'mailbox':
		userMailboxController();
		break;

		case 'faq':
		userFaqController();
		break;

		case 'logOut':
		session_destroy();
		header("Location: index.php");
		break;

		case 'footer':
		footerController();
		break;
		
		default:
		throw new Exception('Cette page n\'existe pas !');
		break;

	}

}