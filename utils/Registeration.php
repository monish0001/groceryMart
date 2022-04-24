<?php

/**
 * Registeration Handling for Event
 */
require_once "DB.php";
require_once "Event.php";

class Registeration {

	public function register($eventName, $leaderName, $college, $leaderMobile, $leaderEmail, $member1Name = '', $member1Number = '', $member2Name = '', $member2Number = '', $member3Name = '', $member3Number = '') {

		$db = new DB;
		$db->mk_conn();
		$eventName = str_replace(" ", "", $eventName);
		$eventName = str_replace("-", "", $eventName);
		$eventName=strtolower($eventName);
	
		$sql = "Insert into $eventName(leaderName, leaderEmail, leaderNumber, college, member1Name, member1Number, member2Name, member2Number, member3Name, member3Number) values('$leaderName', '$leaderEmail', '$leaderMobile', '$college', '$member1Name', '$member1Number', '$member2Name', '$member2Number', '$member3Name', '$member3Number')";
		$result = $db->query($sql);
		$db->close();

		if ($result) {
			return true;
		}

	}

	public function getRegistrations() {

		$registrations = array();

		$db = new DB;
		$db->mk_conn();
		$event = new Event;
		$result = $event->getEvents();
		foreach ($result as $key => $event) {
			$eventName = $event['eventName'];
			$eventName = str_replace(" ", "", $eventName);
			$eventName = str_replace("-", "", $eventName);
			$eventName=strtolower($eventName);
			$sql = "SELECT * from $eventName";
			$registration = $db->query($sql);
			$registrations[$eventName] = array();

			$row = $registration->fetch_assoc();
			while ($row) {
				array_push($registrations[$eventName], $row);
				$row = $registration->fetch_assoc();
			}
		}

		$db->close();

		return $registrations;

	}

}

?>