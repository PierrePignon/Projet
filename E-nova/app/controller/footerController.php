<?php

function footerController(){

	if (!isset($_GET['action']) || empty($_GET['action'])) {
		$action = "main";
	} else {
		$action = $_GET['action'];
	}
	
	switch ($action) {

		case 'cgu':
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/cguView.php');
		break;

		case 'aboutUs':
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/aboutUsView.php');
		break;

		default:
		throw new Exception('Cette page n\'existe pas !');
		break;

	}

}