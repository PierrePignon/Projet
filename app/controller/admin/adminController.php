<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/admin/deviceController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/admin/adminProfileController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/admin/adminMailboxController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/admin/adminFaqController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/admin/clientController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controller/footerController.php');

function adminController(){

	if (!isset($_GET['page']) || empty($_GET['page'])) {
		$page = "main";
	} else {
		$page = $_GET['page'];
	}

	switch ($page) {

		case 'main':
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/homeAdminView.php');
		break;

		case 'device':
		deviceController();
		break;

		case 'client':
		clientController();
		break;

		case 'profile':
		adminProfileController();
		break;

		case 'mailbox':
		adminMailboxController();
		break;

		case 'faq':
		adminFaqController();
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