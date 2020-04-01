<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/FaqManager.php');

function adminFaqController(){

	if (!isset($_GET['action']) || empty($_GET['action'])) {
		$action = "main";
	} else {
		$action = $_GET['action'];
	}

	switch ($action) {

		case 'main':
		$faqManager = new FaqManager();
		$faqData = $faqManager->getFaq();
		require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/faqAdminView.php');
		break;

		case 'addFaq':
		if (!empty($_POST['title']) && !empty($_POST['content'])) {

			$faqManager = new FaqManager();
			$affectedFaq = $faqManager->insertFaq($_POST['title'], $_POST['content']);

			if ($affectedFaq === false) {
				throw new Exception('Impossible d\'ajouter à la FaQ !');
			} else {
				header("Location: index.php?page=faq");
			}

		} else {
			throw new Exception('Tous les champs ne sont pas remplis !');
		}
		break;

		case 'deleteFaq':
		if (!isset($_GET['faq_id']) || empty($_GET['faq_id'])) {
			throw new Exception('Erreur 404');
		} else {
			$faqManager = new FaqManager();
			$deletedFaq = $faqManager->deleteFaq($_GET['faq_id']);
			if ($deletedFaq === false) {
				throw new Exception('Impossible de supprimer ce contenu de FaQ !');
			} else {
				header("Location: index.php?page=faq");
			}
		}
		break;

		default:
		throw new Exception('Cette page n\'existe pas !');
		break;

	}

}