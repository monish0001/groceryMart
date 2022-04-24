<?php

require_once "DB.php";

class Event {

		public function placeOrder($name, $email, $number, $query, $productName){
			$db = new DB;
		$db->mk_conn();
		$sql = "INSERT INTO ordertable(name,mail,address,itemName,mobNumber) values('$name', '$email', '$query', '$productName', '$number')";
		$result = $db->query($sql);
		$db->close();
		if ($result) {
			return true;
		}
		}

    	public function getResult() {
		$db = new DB;
		$db->mk_conn();
		$sql = "SELECT * from result";
		$result = $db->query($sql);
		$db->close();
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) {
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
		public function getOrders() {
		$db = new DB;
		$db->mk_conn();
		$sql = "SELECT * from ordertable";
		$result = $db->query($sql);
		$db->close();
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) {
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;

	}
	public function getTechnical(){

		$db = new DB;
		$db->mk_conn();
		$sql = "SELECT * from events where eventType = 'Vegetables'";
		$result = $db->query($sql);
		$db->close();
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) {
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;

	}
		public function getNonTechnical(){

		$db = new DB;
		$db->mk_conn();
		$sql = "SELECT * from events where eventType = 'Fruits'";
		$result = $db->query($sql);
		$db->close();
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) {
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;

	}
	public function eventExists($eventName) {

		$db = new DB;
		$db->mk_conn();
		$sql = "SELECT * from events where eventName = '$eventName'";
		$result = $db->query($sql);
		$db->close();

		if ($result->num_rows == 1) {
			return $result->num_rows;
		} else {
			return false;
		}

	}

	public function getEvents() {

		$db = new DB;
		$db->mk_conn();
		$sql = "SELECT * from events";
		$result = $db->query($sql);
		$db->close();

		$events = array();
		$row = $result->fetch_assoc();
		while ($row) {
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;

	}

	public function getEventTagline($eventName) {

		$db = new DB;
		$db->mk_conn();
		$sql = "SELECT eventTagline from events where eventName = '$eventName'";
		$result = $db->query($sql);
		$db->close();

		$row = $result->fetch_assoc();

		return $row['eventTagline'];

	}

	public function getEventDescription($eventName) {

		$db = new DB;
		$db->mk_conn();
		$sql = "SELECT eventDescription from events where eventName = '$eventName'";
		$result = $db->query($sql);
		$db->close();

		$row = $result->fetch_assoc();

		return $row['eventDescription'];

	}

	public function getEventImage($eventName) {

		$db = new DB;
		$db->mk_conn();
		$sql = "SELECT eventImage from events where eventName = '$eventName'";
		$result = $db->query($sql);
		$db->close();

		$row = $result->fetch_assoc();

		return $row['eventImage'];

	}

	public function getEventType($eventName) {

		$db = new DB;
		$db->mk_conn();
		$sql = "SELECT eventType from events where eventName = '$eventName'";
		$result = $db->query($sql);
		$db->close();

		$row = $result->fetch_assoc();

		return $row['eventType'];

	}

	public function addEvent($eventName, $eventTagline, $eventDescription, $eventImage, $eventType) {

		$db = new DB;
		$db->mk_conn();
		$sql = "INSERT INTO events(eventName,eventTagline,eventDescription,eventImage,eventType) values('$eventName', '$eventTagline', '$eventDescription', '$eventImage', '$eventType')";
		$result = $db->query($sql);
		$db->close();

		if ($result) {
			return true;
		}

	}

	public function deleteEvent($eventName) {

		$db = new DB;
		$db->mk_conn();
		$sql = "DELETE FROM events WHERE eventName = '$eventName'";
		$result = $db->query($sql);

		$eventName = str_replace(" ", "", $eventName);
		$eventName = str_replace("-", "", $eventName);
		$db->close();
		if ($result) {
			return true;
		}

	}

	public function updateEvent($oldEventName, $eventName, $eventTagline, $eventDescription, $eventImage, $eventType) {

		$db = new DB;
		$db->mk_conn();

		$tb1 = str_replace(" ", "", $oldEventName);
		$tb1 = str_replace("-", "", $tb1);

		$tb2 = str_replace(" ", "", $eventName);
		$tb2 = str_replace("-", "", $tb2);

		$sql = "RENAME TABLE $tb1 TO $tb2;";
		$result = $db->query($sql);

		$sql = "update events set eventName = '$eventName', eventTagline = '$eventTagline', eventDescription = '$eventDescription', eventImage = '$eventImage', eventType='$eventType' where eventName = '$oldEventName'";
		$result = $db->query($sql);
		$db->close();

		if ($result) {
			return true;
		}

	}

}

?>
