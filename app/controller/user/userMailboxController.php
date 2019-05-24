<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/MailboxManager.php');

function userMailboxController(){

	if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
		header('Location: index.php?page=userSelection');
	} elseif ($_SESSION['user_security_level'] != 1) {
		throw new Exception('Vous n\'avez pas les droits pour accéder à cette section ! Veuillez vous connecter avec un compte parent !');
	} elseif (!isset($_GET['action']) || empty($_GET['action'])) {
		$action = "main";
	} else {
		$action = $_GET['action'];
	}

	switch ($action) {

		case 'main':
		$mailboxManager = new MailboxManager();
		$messages = $mailboxManager->getMessagesFromUser($_SESSION['customer_number']);
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/mailboxView.php');
		break;

		case 'sendMessage':
		if (!empty($_POST['content'])) {
			$mailboxManager = new MailboxManager();
			$affectedMessage = $mailboxManager->insertMessage($_POST['content'], $_SESSION['customer_number'], $_SESSION['administrator_id'], "user");
			if ($affectedMessage === false) {
				throw new Exception('Impossible d\'envoyer le message !');
			} else {
				header("Location: index.php?page=mailbox");
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