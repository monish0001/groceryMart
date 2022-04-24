<?php
ini_set('display_errors', 1);
error_reporting(~0);
session_start();
require_once 'vendor/autoload.php';
require_once 'utils/Form.php';
require_once 'utils/Registeration.php';
require_once 'utils/utilFunc.php';

if (!isset($_SESSION['id'])) {
	$_SESSION['id'] = 1;
}


if ($_SESSION['id'] == 1) {
	updateCount();
	$_SESSION['id'] = 2;
} else {
	$script = '';
}

$loader = new Twig_Loader_Filesystem('resources');
$twig = new Twig_Environment($loader);

$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);
$pageFound = false;
$errorMsg = 'Page Not Found';

if (isset($_POST['logout'])) {

	header('HTTP/1.1 401 Unauthorized');
	$errorMsg = 'You have been logged Out';
	unset($_POST);
	goto notFound;

}

if (empty($uri[1])) {
	$pageFound = true;
	$event = new Event;
	$events = $event->getEvents();
	$technicalEvents = $event->getTechnical();
	$nonTechnicalTvents = $event->getNonTechnical();
	$form = new Form;
	$form->startForm('/utils/request.php', 'post', array('onsubmit' => 'return validateForm(this.form)', 'class' => 'form'));
	$form->addItem('text', 'name', 'name', array('onchange' => 'validateText(this)', 'id' => 'name', 'label' => 'Name'));
	$form->addItem('text', 'email', 'email', array('onchange' => 'validateEmail(this)', 'id' => 'email', 'label' => 'Email'));
	$form->addItem('textarea', 'query', 'query', array('id' => 'query', 'rows' => '5', 'cols' => '50', 'class' => 'materialize-textarea', 'label' => 'Query'));
	$form->endForm();

	echo $twig->render('web/home.html', array('title' => 'GROCERY | 2022', 'events' => $events, 'technicalEvents' => $technicalEvents, 'nonTechnicalTvents' => $nonTechnicalTvents));

}else if (strstr($uri[1], 'register')) {
	$pageFound = true;
	$id = $_GET['id'];
	$form = new Form;
	$form->startForm('/utils/request.php', 'post', array('onsubmit' => 'return validateForm(this.form)', 'class' => 'form'));
	$form->addItem('text', 'name', 'name', array('onchange' => 'validateText(this)', 'id' => 'name','class' => 'form-control', 'placeholder' => 'Your Name','data-error' => 'Please Enter  Name '));
	$form->addItem('number', 'number', 'number', array('onchange' => 'validateText(this)', 'id' => 'number','class' => 'form-control', 'placeholder' => 'Moblie Number','data-error' => 'Please Enter Mobile Number '));
	$form->addItem('text', 'email', 'email', array('onchange' => 'validateEmail(this)', 'id' => 'email','class' => 'form-control', 'placeholder' => 'Your Email', 'data-error' => 'Please Enter Email'));
	$form->addItem('textarea', 'query', 'query', array('id' => 'query', 'placeholder' => 'Enter Address','data-error' => 'Please Enter Messsage ','rows' => '5', 'cols' => '50', 'class' => 'form-control'));
	$form->endForm();
	echo $twig->render('web/registration.html', array('title' => 'Registration Form', 'contactUsForm' => $form,'script' => $script,'id'=>$id));
}else if ($uri[1] == 'contact') {
	$pageFound = true;
	$form = new Form;
	$form->startForm('/utils/request.php', 'post', array('onsubmit' => 'return validateForm(this.form)', 'class' => 'form'));
	$form->addItem('text', 'name', 'name', array('onchange' => 'validateText(this)', 'id' => 'name','class' => 'form-control', 'placeholder' => 'Your Name','data-error' => 'Please Enter  Name '));
	$form->addItem('text', 'email', 'email', array('onchange' => 'validateEmail(this)', 'id' => 'email','class' => 'form-control', 'placeholder' => 'Your Email', 'data-error' => 'Please Enter Email'));
	$form->addItem('textarea', 'query', 'query', array('id' => 'query', 'placeholder' => 'Message','data-error' => 'Please Enter Messsage ','rows' => '5', 'cols' => '50', 'class' => 'form-control'));
	$form->endForm();
	echo $twig->render('web/contact.html', array('title' => 'Contact US','contactUsForm' => $form, 'script' => $script));

}else if ($uri[1] == 'contact') {

	$pageFound = true;
	$form = new Form;
	$form->startForm('/utils/request.php', 'post', array('onsubmit' => 'return validateForm(this.form)', 'class' => 'form'));
	$form->addItem('text', 'name', 'name', array('onchange' => 'validateText(this)', 'id' => 'name','data-error' => 'Please Enter Name '));
	$form->addItem('email', 'email', 'email', array('onchange' => 'validateEmail(this)', 'id' => 'email','data-error' => 'Please Enter Email '));
	$form->addItem('textarea', 'query', 'query', array('id' => 'query', 'rows' => '5', 'cols' => '50', 'class' => 'materialize-textarea','data-error' => 'Please Enter Messsage '));
	$form->endForm();
	echo $twig->render('web/contact.html', array('title' => 'Contact US'));

}  else if ($uri[1] == 'events') {

	if(empty($uri[2])) {
		$pageFound = true;
		$event = new Event;
		$events = $event->getEvents();
		$technicalEvents = $event->getTechnical();
		$nonTechnicalTvents = $event->getNonTechnical();
		foreach ($events as $key => $event) {
			$events[$key]["eventDescription"] = file_get_contents($event["eventDescription"]);
		}
		
		echo $twig->render('web/events.html', array('title' => 'Events', 'events' => $events, 'technicalEvents' => $technicalEvents, 'nonTechnicalTvents' => $nonTechnicalTvents));

	} else {
		$eventName = urldecode($uri[2]);
		$event = new Event;
		$title = $event->eventExists($eventName);

		if ($title) {
			$pageFound = true;
			echo $twig->render('web/eventDetails.html', array('title' => $eventName, 'tagline' => $event->getEventTagline($eventName), 'description' => file_get_contents($event->getEventDescription($eventName)), 'image' => $event->getEventImage($eventName)));
		}
	}

} else if ($uri[1] == 'result') {
	$pageFound = true;
	$event = new Event;
		$events = $event->getResult();

	echo $twig->render('web/result.html',array('title' => 'TechMarathon| Announcement', 'events' => $events));
} else if ($uri[1] == 'gallery') {
	$pageFound = true;
	echo $twig->render('web/gallery.html',array('title' => 'Gallery'));
}else if ($uri[1] == 'about') {
	$pageFound = true;
	echo $twig->render('web/aboutus.html',array('title' =>  'About Us'));
}else if ($uri[1] == 'adminPanel19') {

	if (!auth_user()) {
		$errorMsg = 'Invalid Credentials';
		goto notFound;
	}
	if (empty($uri[2])) {
		$pageFound = true;
		$event = new Event;
		$count = getCount();
		$counts = new Event;
		$result = $counts->getEvents();
		
		
		$order=$event->getOrders();
		echo $twig->render('dashboard/dash.html', array('title' => 'Admin Panel', 'counter' => $count,'events' => $order));
	} else if ($uri[2] == 'addEvent') {

		$pageFound = true;
		$form = new Form;
		$form->startForm('/utils/request.php', 'post', array('header' => '<h2>Add Event</h2>', 'class' => 'form', 'enctype' => 'multipart/form-data'));
		$form->addItem('text', 'eventName', 'eventName', array('placeholder' => 'Item Name'));
		$form->addItem('text', 'eventTagline', 'eventTagline', array('placeholder' => 'Item Tag Line'));
		$form->addItem('textarea', 'eventDescription', 'eventDescription', array('placeholder' => 'eventDescription'));
		$form->addItem('file', 'eventImage', 'eventImage');
		$form->addItem('select', 'eventType', 'eventType', array('placeholder' => 'eventType', 'options' => array('Kitchen', 'HouseHold')));
		$form->addItem('submit', 'addEvent', 'addEvent', array('value' => 'Submit'));
		$form->endForm();
		echo $twig->render('forms/form.html', array('title' => 'Add Event', 'form' => $form, 'script' => 'var editor = CKEDITOR.replace( "eventDescription" );'));

	} elseif ($uri[2] == 'events') {
		if (empty($uri[3])){
			$pageFound = true;
			$event = new Event;
			$events = $event->getEvents();
			echo $twig->render('dashboard/event.html', array('title' => 'Events', 'events' => $events));
		} elseif (strstr($uri[3], 'deleteEvent')) {
			$pageFound = true;
			$eventName = $_GET['name'];
			$event = new Event;

			if ($event->deleteEvent($eventName)) {
				
				unlink($eventDescription);
				unlink($eventImage);
				header("Location: /adminPanel19/events");
				$event = null;
				
			}

		} elseif (strstr($uri[3], 'updateEvent')) {
			$pageFound = true;
			$eventName = $_GET['name'];
			$event = new Event;
			$form = new Form;
			$form->startForm('/utils/request.php', 'post', array('header' => '<h2>Update Event</h2>', 'class' => 'form', 'enctype' => 'multipart/form-data'));
			$form->addItem('hidden', 'oldEventName', 'oldEventName', array('value' => $eventName));
			$form->addItem('text', 'eventName', 'eventName', array('placeholder' => 'eventName', 'value' => $eventName));
			$form->addItem('text', 'eventTagline', 'eventTagline', array('placeholder' => 'eventTagline', 'value' => $event->getEventTagline($eventName)));
			$form->addItem('textarea', 'eventDescription', 'eventDescription', array('placeholder' => 'eventDescription', 'value' => file_get_contents($event->getEventDescription($eventName))));
			$form->addItem('file', 'eventImage', 'eventImage');
			$form->addItem('select', 'eventType', 'eventType', array('placeholder' => 'eventType', 'options' => array('Technical', 'Non-Technical')));
			$form->addItem('submit', 'updateEvent', 'updateEvent', array('value' => 'Submit'));
			$form->endForm();
			echo $twig->render('forms/form.html', array('title' => 'Update Event', 'form' => $form, 'script' => 'var editor = CKEDITOR.replace( "eventDescription" );'));
		}
	}
}
notFound:if (!$pageFound) {

	echo $twig->render('404.html', array('error' => $errorMsg));
}
?>
