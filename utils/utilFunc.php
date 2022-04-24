<?php

function filter_data($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function updateCount() {

	$db = new DB;
	$db->mk_conn();
	$sql1 = "update counter set ViewCount = ViewCount+1 where ViewCount = ViewCount";
	$res = $db->query($sql1);
	$sql2 = "Select ViewCount from counter";
	$result = $db->query($sql2);
	return $result;
}

function getCount() {

	$db = new DB;
	$db->mk_conn();
	$sql = "SELECT ViewCount from counter";
	$result = $db->query($sql);
	$db->close();

	$row = $result->fetch_assoc();

	return $row['ViewCount'];

}

function file_upload($target_dir, $name) {
	$uploadOk = 1;
	$imageFileType = pathinfo(basename($_FILES["eventImage"]["name"]), PATHINFO_EXTENSION);
	$target_file = $target_dir . $name . "." . $imageFileType;

// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["eventImage"]["tmp_name"]);
	if ($check !== false) {
		$uploadOk = 1;
	} else {
		error_log("File Not an Image", 0);
		$uploadOk = 0;
	}
// Check if file already exists
	if (file_exists($target_file)) {
		error_log("File already exists", 0);
		$uploadOk = 0;
	}
// Check file size
	if ($_FILES["eventImage"]["size"] > 500000) {
		error_log("File Size Exceeded", 0);
		$uploadOk = 0;
	}
// Allow certain file formats
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif") {
		error_log("Ivalid Format!", 0);
		$uploadOk = 0;
	}
// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		error_log("File Not Uploaded", 0);
		header("Location: /404");
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["eventImage"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/" . $target_file)) {
			return $target_file;
		} else {
			error_log("Error Uploading File!", 0);
			header("Location: /404");
		}
	}
}

function http_digest_parse($txt) {
	// protect against missing data
	$needed_parts = array('nonce' => 1, 'nc' => 1, 'cnonce' => 1, 'qop' => 1, 'username' => 1, 'uri' => 1, 'response' => 1);
	$data = array();
	$keys = implode('|', array_keys($needed_parts));

	preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

	foreach ($matches as $m) {
		$data[$m[1]] = $m[3] ? $m[3] : $m[4];
		unset($needed_parts[$m[1]]);
	}

	return $needed_parts ? false : $data;
}

function auth_user() {
// function to parse the http auth header

	$realm = 'Restricted area';

//user => password
	$users = array('admin' => 'admin');

	if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
		header('HTTP/1.1 401 Unauthorized');
		header('WWW-Authenticate: Digest realm="' . $realm .
			'",qop="auth",nonce="' . uniqid() . '",opaque="' . md5($realm) . '"');

		return false;
	}

// analyze the PHP_AUTH_DIGEST variable
	if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
		!isset($users[$data['username']])) {
		return false;
	}

// generate the valid response
	$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
	$A2 = md5($_SERVER['REQUEST_METHOD'] . ':' . $data['uri']);
	$valid_response = md5($A1 . ':' . $data['nonce'] . ':' . $data['nc'] . ':' . $data['cnonce'] . ':' . $data['qop'] . ':' . $A2);

	if ($data['response'] != $valid_response) {
		return false;
	}

// ok, valid username & password
	return true;

}

?>