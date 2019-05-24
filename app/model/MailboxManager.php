<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/Manager.php');

class MailboxManager extends Manager
{

	function getMessagesFromUser($account_customer_number)
	{
		$db = $this->databaseConnection();
		$messages = $db->prepare('SELECT content, date_time, sender FROM mailbox WHERE account_customer_number = ? ORDER BY date_time');
		$messages->execute(array($account_customer_number));
		return $messages;
	}

	function getMessagesFromAdmin($administrator_id, $account_customer_number)
	{
		$db = $this->databaseConnection();
		$messages = $db->prepare('SELECT content, date_time, sender FROM mailbox WHERE administrator_id = ? AND account_customer_number = ? ORDER BY date_time');
		$messages->execute(array($administrator_id, $account_customer_number));
		return $messages;
	}

	function insertMessage($content, $account_customer_number, $administrator_id, $sender)
	{
		$db = $this->databaseConnection();
		$newMessage = $db->prepare('INSERT INTO mailbox(content, date_time, account_customer_number, administrator_id, sender) VALUES(?, NOW(), ?, ?, ?)');
		$affectedMessage = $newMessage->execute(array($content, $account_customer_number, $administrator_id, $sender));
		return $affectedMessage;
	}

	function getListConversation($id)
	{
		$db = $this->databaseConnection();
		$listConversation = $db->prepare('SELECT date_time, mb2.content, first_name, last_name, customer_number FROM ( SELECT MAX(date_time) last_date_time, account_customer_number FROM mailbox WHERE mailbox.administrator_id = ? GROUP BY account_customer_number) AS mb INNER JOIN mailbox mb2 ON mb2.date_time = mb.last_date_time AND mb2.account_customer_number = mb.account_customer_number INNER JOIN account ON mb.account_customer_number = customer_number ORDER BY date_time DESC');
		$listConversation->execute(array($id));
		return $listConversation;
	}

}