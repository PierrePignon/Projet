<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/Manager.php');

class UserManager extends Manager
{
	
	function getUsers($account_customer_number)
	{
		$db = $this->databaseConnection();
		$users = $db->prepare('SELECT id, pseudonym FROM user WHERE account_customer_number = ? ORDER BY id');
		$users->execute(array($account_customer_number));
		return $users;
	}

	function insertUser($pseudonym, $password, $security_level, $account_customer_number)
	{
		$db = $this->databaseConnection();
		$newUser = $db->prepare('INSERT INTO user(pseudonym, password, security_level, account_customer_number) VALUES(?, ?, ?, ?)');
		$affectedUser = $newUser->execute(array($pseudonym, $password, $security_level, $account_customer_number));
		return $affectedUser;
	}

	function deleteUser($id)
	{
		$db = $this->databaseConnection();
		$delUser = $db->prepare('DELETE FROM user where id = ?');
		$deletedUser = $delUser->execute(array($id));
		return $deletedUser;
	}

	function updatePseudonym($pseudonym, $id)
	{
		$db = $this->databaseConnection();
		$updatedPseudonym = $db->prepare('UPDATE user SET pseudonym = ? WHERE id = ?');
		$updatedPseudonym = $updatedPseudonym->execute(array($pseudonym, $id));
		return $updatedPseudonym;
	}

	function updatePassword($password, $id)
	{
		$db = $this->databaseConnection();
		$updatedPassword = $db->prepare('UPDATE user SET password = ? WHERE id = ?');
		$updatedPassword = $updatedPassword->execute(array($password, $id));
		return $updatedPassword;
	}

	function getAccountCustomerNumberUser($user_id)
	{
		$db = $this->databaseConnection();
		$user_account_customer_number = $db->prepare('SELECT account_customer_number FROM user WHERE id = ?');
		$user_account_customer_number->execute(array($user_id));
		$user_account_customer_number = $user_account_customer_number->fetch();
		return $user_account_customer_number['account_customer_number'];
	}

	function getSecurityLevelUser($user_id)
	{
		$db = $this->databaseConnection();
		$user_security_level = $db->prepare('SELECT security_level FROM user WHERE id = ?');
		$user_security_level->execute(array($user_id));
		$user_security_level = $user_security_level->fetch();
		return $user_security_level['security_level'];
	}

}