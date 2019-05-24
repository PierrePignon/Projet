<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/Manager.php'); 

class ActuatorManager extends Manager
{

	function getActuators($room_id)
	{
		$db = $this->databaseConnection();
		$actuators = $db->prepare('SELECT id, type, name, value FROM actuator WHERE room_id = ? ORDER BY id');
		$actuators->execute(array($room_id));
		return $actuators;
	}

	function insertActuator($type, $name, $room_id)
	{
		$db = $this->databaseConnection();
		$newActuator = $db->prepare('INSERT INTO actuator(type, name, value,  room_id) VALUES(?, ?, ?, ?)');
		$affectedActuator = $newActuator->execute(array($type, $name, 0, $room_id));
		return $affectedActuator;
	}

	function deleteActuator($id)
	{
		$db = $this->databaseConnection();
		$delActuator = $db->prepare('DELETE FROM actuator where id = ?');
		$deletedActuator = $delActuator->execute(array($id));
		return $deletedActuator;
	}

	function getRoomIdActuator($actuator_id)
	{
		$db = $this->databaseConnection();
		$actuator_room_id = $db->prepare('SELECT room_id FROM actuator WHERE id = ?');
		$actuator_room_id->execute(array($actuator_id));
		$actuator_room_id = $actuator_room_id->fetch();
		return $actuator_room_id['room_id'];
	}
	
}