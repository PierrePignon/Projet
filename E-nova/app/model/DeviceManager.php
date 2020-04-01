<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/Manager.php');

class DeviceManager extends Manager
{

	function getTypeDevice($type)
	{
		$db = $this->databaseConnection();
		$devices = $db->prepare('SELECT id, name FROM type_device WHERE type = ? ORDER BY id');
		$devices->execute(array($type));
		return $devices;
	}

	function insertTypeDevice($name, $type)
	{
		$db = $this->databaseConnection();
		$newTypeDevice = $db->prepare('INSERT INTO type_device(name, type) VALUES(?, ?)');
		$affectedTypeDevice = $newTypeDevice->execute(array($name, $type));
		return $affectedTypeDevice;
	}

	function deleteTypeDevice($id)
	{
		$db = $this->databaseConnection();
		$delTypeDevice = $db->prepare('DELETE FROM type_device where id = ?');
		$deletedTypeDevice = $delTypeDevice->execute(array($id));
		return $deletedTypeDevice;
	}
	
}