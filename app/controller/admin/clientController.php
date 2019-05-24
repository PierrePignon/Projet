<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/AccountManager.php');

function clientController(){

	if (!isset($_GET['action']) || empty($_GET['action'])) {
		$action = "main";
	} else {
		$action = $_GET['action'];
	}

	switch ($action) {

		case 'main':
		$accountManager = new AccountManager();
		$clients = $accountManager->getClients($_SESSION['id']);
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/clientView.php');
		break;

		default:
		throw new Exception('Cette page n\'existe pas !');
		break;

	}

}