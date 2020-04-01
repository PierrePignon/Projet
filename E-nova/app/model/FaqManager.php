<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/Manager.php');

class FaqManager extends Manager
{

	function getFaq()
	{
		$db = $this->databaseConnection();
		$faq = $db->prepare('SELECT * FROM faq ORDER BY date_time DESC');
		$faq->execute();
		return $faq;
	}

	function insertFaq($title, $content)
	{
		$db = $this->databaseConnection();
		$newFaq = $db->prepare('INSERT INTO faq(title, content, date_time) VALUES(?, ?, NOW())');
		$affectedFaq = $newFaq->execute(array($title, $content));
		return $affectedFaq;
	}

	function deleteFaq($id)
	{
		$db = $this->databaseConnection();
		$delFaq = $db->prepare('DELETE FROM faq where id = ?');
		$deletedFaq = $delFaq->execute(array($id));
		return $deletedFaq;
	}


}	