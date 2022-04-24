<?php
use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';
require_once 'utilFunc.php';
require_once 'Registeration.php';
if (isset($_POST['submitQuery'])) {
    $name = filter_data($_POST['name']);
	$email = filter_data($_POST['email']);
	$query = filter_data($_POST['query']);
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true,
		),
	);
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->SMTPAuth = true;
	$mail->Username = "mohdmonishksg@gmail.com";
	$mail->Password = "compscalgo@4431";
	$mail->setFrom(	$email,$name);
	$mail->addAddress('mohdmonishksg@gmail.com', 'TechMarathon Dduc');
	$mail->Subject = 'Techmarathon Query';
	$mail->isHTML(true);
	$mail->Body = 'Name : ' . $name . " \n";
	$mail->Body = $mail->Body . 'Email : ' . $email . " \n";
	$mail->Body = $mail->Body . 'Query : ' . $query;
	$mail->send();
	if (!$mail->send()) 
	{
	     header("refresh:0; url=/");
	 echo '<script >
	alert("Somthing went wrong, please try after some time !!");
</script>';
	   
	      //echo "<h1> Error Message: Sorry please try after some time !!</h1>";
	   //echo "<h1> Error Message: " . $mail->ErrorInfo."</h1>";
	  //header("refresh:0; url=/");
	}
	else
	{
	   header("refresh:0; url=/");
	 echo '<script >
	alert("Thank You we will contact you soon!!");
</script>';
	}
}else if(isset($_POST['Purchase'])){
    $name = filter_data($_POST['name']);
	$email = filter_data($_POST['email']);
	$number = filter_data($_POST['number']);
	$query = filter_data($_POST['query']);
	$productName= filter_data($_POST['itemName']);
	$event = new Event;
	if ($event->placeOrder($name, $email, $number, $query, $productName)) {

		$event = null;
		  header("refresh:0; url=/");
	 echo '<script >
	alert("Thank You your order placed we will contact you soon!!");
</script>';
		exit;

	}
}
 elseif (isset($_POST['addEvent'])) {

	if (!empty($_POST['eventName'])) {

		$eventName = filter_data($_POST['eventName']);

	}
	if (!empty($_POST['eventTagline'])) {

		$eventTagline = filter_data($_POST['eventTagline']);

	}
	if (!empty($_POST['eventDescription'])) {

		$eventDescription = "description/" . $eventName . ".html";
		$description = $_POST['eventDescription'];

		$descFile = fopen("../" . $eventDescription, "w");
		fwrite($descFile, $description);
		fclose($descFile);

	}
	if (!empty($_FILES['eventImage']['name'])) {

		$eventImage = file_upload('images/', $eventName);

	}
	if (!empty($_POST['eventType'])) {

		$eventType = $_POST['eventType'];

	}
	$event = new Event;

	if ($event->addEvent($eventName, $eventTagline, $eventDescription, $eventImage, $eventType)) {
		$event = null;
		header("Location: /adminPanel19/events");
		exit;

	}

} elseif (isset($_POST['updateEvent'])) {

	$event = new Event;

	$oldEventName = filter_data($_POST['oldEventName']);

	$eventName = filter_data($_POST['eventName']);
	$eventTagline = filter_data($_POST['eventTagline']);
	$eventType = filter_data($_POST['eventType']);

	$olddesc = $event->getEventDescription($oldEventName);
	unlink("../" . $olddesc);

	$eventDescription = "description/" . $eventName . ".html";
	$description = $_POST['eventDescription'];
	$descFile = fopen("../" . $eventDescription, "w");
	fwrite($descFile, $description);
	fclose($descFile);

	$img = $event->getEventImage($oldEventName);

	if (!empty($_FILES['eventImage']['name'])) {

		$oldimg = $img;
		unlink("../" . $oldimg);
		$eventImage = file_upload('images/', $eventName);

	} else {

		if ($oldEventName != $eventName) {

			$oldName = explode(".", $img);
			$eventImage = "images/" . $eventName . "." . $oldName[1];
			rename("../" . $img, "../" . $eventImage);
			unlink("../" . $img);

		} else {
			$eventImage = $img;
		}

	}

	if ($event->updateEvent($oldEventName, $eventName, $eventTagline, $eventDescription, $eventImage, $eventType)) {

		$event = null;
		header("Location: /adminPanel19/events");
		exit;

	}

} 

?>