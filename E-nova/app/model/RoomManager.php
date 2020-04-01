<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/Manager.php');

class RoomManager extends Manager
{

	function getRooms($address_id)
	{
		$db = $this->databaseConnection();
		$rooms = $db->prepare('SELECT id, name FROM room WHERE address_id = ? ORDER BY id');
		$rooms->execute(array($address_id));
		return $rooms;
	}

	function insertRoom($name, $surface, $address_id)
	{
		$db = $this->databaseConnection();
		$newRoom = $db->prepare('INSERT INTO room(name, surface, address_id) VALUES(?, ?, ?)');
		$affectedRoom = $newRoom->execute(array($name, $surface, $address_id));
		return $affectedRoom;
	}

	function deleteRoom($id)
	{
		$db = $this->databaseConnection();
		$delRoom = $db->prepare('DELETE FROM room where id = ?');
		$deletedRoom = $delRoom->execute(array($id));
		return $deletedRoom;
	}

	function getIdNewRoom($address_id)
	{
		$db = $this->databaseConnection();
		$new_room_id = $db->prepare('SELECT id FROM room WHERE address_id = ? ORDER BY id DESC');
		$new_room_id->execute(array($address_id));
		$new_room_id = $new_room_id->fetch();
		return $new_room_id['id'];
	}

	function getNameRoom($room_id)
	{
		$db = $this->databaseConnection();
		$room_name = $db->prepare('SELECT name FROM room WHERE id = ?');
		$room_name->execute(array($room_id));
		$room_name = $room_name->fetch();
		return $room_name['name'];
	}

	function getAddressIdRoom($room_id)
	{
		$db = $this->databaseConnection();
		$room_address_id = $db->prepare('SELECT address_id FROM room WHERE id = ?');
		$room_address_id->execute(array($room_id));
		$room_address_id = $room_address_id->fetch();
		return $room_address_id['address_id'];
	}

	function countRoom($address_id)
	{
		$db = $this->databaseConnection();
		$number_room = $db->prepare('SELECT COUNT(*) FROM room WHERE address_id = ?');
		$number_room->execute(array($address_id));
		$number_room = $number_room->fetch();
		return $number_room['COUNT(*)'];
	}
	
}