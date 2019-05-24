<?php

require($_SERVER['DOCUMENT_ROOT'].'/app/controller/homeController.php');
require($_SERVER['DOCUMENT_ROOT'].'/app/controller/user/userController.php');
require($_SERVER['DOCUMENT_ROOT'].'/app/controller/admin/adminController.php');

try {

	session_start();
	if(!isset($_SESSION['type_connexion']) || empty($_SESSION['type_connexion'])){
		homeController();
	} elseif ($_SESSION['type_connexion'] == "user") {
		userController();
	} elseif ($_SESSION['type_connexion'] == "admin") {
		adminController();
	}

} catch(Exception $e) {
	$errorMessage = $e->getMessage();
	require($_SERVER['DOCUMENT_ROOT'].'/app/view/ErrorView.php');
}