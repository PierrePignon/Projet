<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/FaqManager.php');

function userFaqController(){

	if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
		header('Location: index.php?page=userSelection');
	} elseif (!isset($_GET['action']) || empty($_GET['action'])) {
		$action = "main";
	} else {
		$action = $_GET['action'];
	}

	switch ($action) {

		case 'main':
		$faqManager = new FaqManager();
		$faqData = $faqManager->getFaq();
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/faqView.php');
		break;

		default:
		throw new Exception('Cette page n\'existe pas !');
		break;

	}

}