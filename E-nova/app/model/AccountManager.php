<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/Manager.php'); 

class AccountManager extends Manager
{

	function getAccountInformation($login) 
	{
		$db = $this->databaseConnection();
		$account_information = $db->prepare('SELECT customer_number, mail, phone_number, last_name, first_name, administrator_id FROM account WHERE login = ?');
		$account_information->execute(array($login));
		$account_information = $account_information->fetch();
		return $account_information;
	}

	function insertAccount($login, $password, $mail, $phone_number, $last_name, $first_name)
	{
		$db = $this->databaseConnection();
		$newAccount = $db->prepare('INSERT INTO account(login, password, mail, phone_number, last_name, first_name, administrator_id) VALUES(?, ?, ?, ?, ?, ?, ?)');
		$affectedAccount = $newAccount->execute(array($login, password_hash($password, PASSWORD_DEFAULT), $mail, $phone_number, $last_name, $first_name, 1));
		return $affectedAccount;
	}
	
	function checkLogin($login) 
	{
		$db = $this->databaseConnection();
		$true_login = $db->prepare('SELECT login FROM account WHERE login = ?');
		$true_login->execute(array($login)); 
		return $true_login;
	}

	function checkMail($mail) 
	{
		$db = $this->databaseConnection();
		$true_mail = $db->prepare('SELECT mail FROM account WHERE mail = ?');
		$true_mail->execute(array($mail)); 
		return $true_mail;
	}

	function getPassword($login) 
	{
		$db = $this->databaseConnection();
		$password = $db->prepare('SELECT password FROM account WHERE login = ?');
		$password->execute(array($login));
		$password_db = $password->fetch();
		return $password_db['password'];
	}

	function getIdNewAccount($login)
	{
		$db = $this->databaseConnection();
		$new_account_customer_number = $db->prepare('SELECT customer_number FROM account WHERE login = ?');
		$new_account_customer_number->execute(array($login));
		$new_account_customer_number = $new_account_customer_number->fetch();
		return $new_account_customer_number['customer_number'];
	}

	function getClients($administrator_id)
	{
		$db = $this->databaseConnection();
		$clients = $db->prepare('SELECT customer_number, login, mail, phone_number, last_name, first_name FROM account WHERE administrator_id = ?');
		$clients->execute(array($administrator_id));
		return $clients;
	}

	function getAdministratorIdClient($customer_number)
	{
		$db = $this->databaseConnection();
		$account_administrator_id = $db->prepare('SELECT administrator_id FROM account WHERE customer_number = ?');
		$account_administrator_id->execute(array($customer_number));
		$account_administrator_id = $account_administrator_id->fetch();
		return $account_administrator_id['administrator_id'];
	}

	function updateFirstName($first_name, $customer_number)
	{
		$db = $this->databaseConnection();
		$updatedFirstName = $db->prepare('UPDATE account SET first_name = ? WHERE customer_number = ?');
		$updatedFirstName = $updatedFirstName->execute(array($first_name, $customer_number));
		return $updatedFirstName;
	}

	function updateLastName($last_name, $customer_number)
	{
		$db = $this->databaseConnection();
		$updatedLastName = $db->prepare('UPDATE account SET last_name = ? WHERE customer_number = ?');
		$updatedLastName = $updatedLastName->execute(array($last_name, $customer_number));
		return $updatedLastName;
	}

	function updatePassword($password, $customer_number)
	{
		$db = $this->databaseConnection();
		$updatedPassword = $db->prepare('UPDATE account SET password = ? WHERE customer_number = ?');
		$updatedPassword = $updatedPassword->execute(array(password_hash($password, PASSWORD_DEFAULT), $customer_number));
		return $updatedPassword;
	}

	function updateMail($mail, $customer_number)
	{
		$db = $this->databaseConnection();
		$updatedMail = $db->prepare('UPDATE account SET mail = ? WHERE customer_number = ?');
		$updatedMail = $updatedMail->execute(array($mail, $customer_number));
		return $updatedMail;
	}

	function updatePhoneNumber($phone_number, $customer_number)
	{
		$db = $this->databaseConnection();
		$updatedPhoneNumber = $db->prepare('UPDATE account SET phone_number = ? WHERE customer_number = ?');
		$updatedPhoneNumber = $updatedPhoneNumber->execute(array($phone_number, $customer_number));
		return $updatedPhoneNumber;
	}

}