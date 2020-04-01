<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/Manager.php');

class AddressManager extends Manager
{

	function getAddresses($account_customer_number)
	{
		$db = $this->databaseConnection();
		$addresses= $db->prepare('SELECT id, numero, street, zip_code, city, country FROM address WHERE account_customer_number = ? ORDER BY id');
		$addresses->execute(array($account_customer_number));
		return $addresses;
	}

	function insertAddress($numero, $street, $zip_code, $city, $country, $account_customer_number)
	{
		$db = $this->databaseConnection();
		$newAddress = $db->prepare('INSERT INTO address(numero, street, zip_code, city, country, account_customer_number) VALUES(?, ?, ?, ?, ?, ?)');
		$affectedAddress = $newAddress->execute(array($numero, $street, $zip_code, $city, $country, $account_customer_number));
		return $affectedAddress;
	}

	function deleteAddress($id)
	{
		$db = $this->databaseConnection();
		$delAddress = $db->prepare('DELETE FROM address where id = ?');
		$deletedAddress = $delAddress->execute(array($id));
		return $deletedAddress;
	}

	function getIdNewAddress($account_customer_number)
	{
		$db = $this->databaseConnection();
		$new_address_id = $db->prepare('SELECT id FROM address WHERE account_customer_number = ? ORDER BY id DESC');
		$new_address_id->execute(array($account_customer_number));
		$new_address_id = $new_address_id->fetch();
		return $new_address_id['id'];
	}

	function getAccountCustomerNumberAddress($address_id)
	{
		$db = $this->databaseConnection();
		$address_account_customer_number = $db->prepare('SELECT account_customer_number FROM address WHERE id = ?');
		$address_account_customer_number->execute(array($address_id));
		$address_account_customer_number = $address_account_customer_number->fetch();
		return $address_account_customer_number['account_customer_number'];
	}

	function getInformationAddress($address_id)
	{
		$db = $this->databaseConnection();
		$address_information = $db->prepare('SELECT numero, street, zip_code, city, country FROM address WHERE id = ?');
		$address_information->execute(array($address_id));
		$address_information = $address_information->fetch();
		return $address_information;
	}

	function countAddress($account_customer_number)
	{
		$db = $this->databaseConnection();
		$number_address = $db->prepare('SELECT COUNT(*) FROM address WHERE account_customer_number = ?');
		$number_address->execute(array($account_customer_number));
		$number_address = $number_address->fetch();
		return $number_address['COUNT(*)'];
	}

}