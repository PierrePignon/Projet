<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/Manager.php'); 

class AdministratorManager extends Manager
{

	function getAdministratorInformation($login) 
	{
		$db = $this->databaseConnection();
		$administrator_information = $db->prepare('SELECT id, last_name, first_name, mail, phone_number FROM administrator WHERE login = ?');
		$administrator_information->execute(array($login));
		$administrator_information = $administrator_information->fetch();
		return $administrator_information;
	}

	function checkLogin($login) 
	{
		$db = $this->databaseConnection();
		$true_login = $db->prepare('SELECT login FROM administrator WHERE login = ?');
		$true_login->execute(array($login)); 
		return $true_login;
	}

	function checkMail($mail) 
	{
		$db = $this->databaseConnection();
		$true_mail = $db->prepare('SELECT mail FROM administrator WHERE mail = ?');
		$true_mail->execute(array($mail)); 
		return $true_mail;
	}

	function getPassword($login) 
	{
		$db = $this->databaseConnection();
		$password = $db->prepare('SELECT password FROM administrator WHERE login = ?');
		$password->execute(array($login));
		$password_db = $password->fetch();
		return $password_db['password'];
	}

	function updateFirstName($first_name, $id)
	{
		$db = $this->databaseConnection();
		$updatedFirstName = $db->prepare('UPDATE administrator SET first_name = ? WHERE id = ?');
		$updatedFirstName = $updatedFirstName->execute(array($first_name, $id));
		return $updatedFirstName;
	}

	function updateLastName($last_name, $id)
	{
		$db = $this->databaseConnection();
		$updatedLastName = $db->prepare('UPDATE administrator SET last_name = ? WHERE id = ?');
		$updatedLastName = $updatedLastName->execute(array($last_name, $id));
		return $updatedLastName;
	}

	function updatePassword($password, $id)
	{
		$db = $this->databaseConnection();
		$updatedPassword = $db->prepare('UPDATE administrator SET password = ? WHERE id = ?');
		$updatedPassword = $updatedPassword->execute(array(password_hash($password, PASSWORD_DEFAULT), $id));
		return $updatedPassword;
	}

	function updateMail($mail, $id)
	{
		$db = $this->databaseConnection();
		$updatedMail = $db->prepare('UPDATE administrator SET mail = ? WHERE id = ?');
		$updatedMail = $updatedMail->execute(array($mail, $id));
		return $updatedMail;
	}

	function updatePhoneNumber($phone_number, $id)
	{
		$db = $this->databaseConnection();
		$updatedPhoneNumber = $db->prepare('UPDATE administrator SET phone_number = ? WHERE id = ?');
		$updatedPhoneNumber = $updatedPhoneNumber->execute(array($phone_number, $id));
		return $updatedPhoneNumber;
	}

}