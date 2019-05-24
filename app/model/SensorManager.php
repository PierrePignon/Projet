<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/Manager.php');

class SensorManager extends Manager
{

	function getSensors($room_id)
	{
		$db = $this->databaseConnection();
		$sensors = $db->prepare('SELECT id, type, name, value FROM sensor WHERE room_id = ? ORDER BY id');
		$sensors->execute(array($room_id));
		return $sensors;
	}

	function insertSensor($type, $name, $room_id)
	{
		$db = $this->databaseConnection();
		$newSensor = $db->prepare('INSERT INTO sensor(type, name, value, room_id) VALUES(?, ?, ?, ?)');
		$affectedSensor = $newSensor->execute(array($type, $name, 30, $room_id));
		return $affectedSensor;
	}

	function deleteSensor($id)
	{
		$db = $this->databaseConnection();
		$delSensor = $db->prepare('DELETE FROM sensor where id = ?');
		$deletedSensor = $delSensor->execute(array($id));
		return $deletedSensor;
	}

	function getRoomIdSensor($sensor_id)
	{
		$db = $this->databaseConnection();
		$sensor_room_id = $db->prepare('SELECT room_id FROM sensor WHERE id = ?');
		$sensor_room_id->execute(array($sensor_id));
		$sensor_room_id = $sensor_room_id->fetch();
		return $sensor_room_id['room_id'];
	}
	
}