<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/MailboxManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/AccountManager.php');

function adminMailboxController(){

	if (!isset($_GET['action']) || empty($_GET['action'])) {
		$action = "main";
	} else {
		$action = $_GET['action'];
	}

	switch ($action) {

		case 'main':
		$mailboxManager = new MailboxManager();
		$listConversation = $mailboxManager->getListConversation($_SESSION['id']);
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/mailbox/homeChatView.php');	
		break;

		case 'redirectionConversation':
		if (!isset($_GET['client_id']) || empty($_GET['client_id'])) {
			throw new Exception('Erreur 404');
		} else {
			$accountManager = new AccountManager();
			$account_administrator_id = $accountManager->getAdministratorIdClient($_GET['client_id']);
			if ($account_administrator_id == $_SESSION['id']) {
				$_SESSION['client_id'] = $_GET['client_id'];
				header('Location: index.php?page=mailbox&action=conversation');
			} else {
				throw new Exception('Erreur 404');
			}
		}
		break;

		case 'conversation':
		$mailboxManager = new MailboxManager();
		$messages = $mailboxManager->getMessagesFromAdmin($_SESSION['id'], $_SESSION['client_id']);
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/mailbox/conversationView.php');		
		break;

		case 'sendMessage':
		if (!empty($_POST['content'])) {
			$mailboxManager = new MailboxManager();
			$affectedMessage = $mailboxManager->insertMessage($_POST['content'], $_SESSION['client_id'], $_SESSION['id'], "admin");
			if ($affectedMessage === false) {
				throw new Exception('Impossible d\'envoyer le message !');
			} else {
				header("Location: index.php?page=mailbox&action=conversation");
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