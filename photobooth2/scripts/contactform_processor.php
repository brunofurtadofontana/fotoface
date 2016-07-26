<?php
$email_to = "xxx@domain.com";
$success_message = "You message has been successfully sent. We will respond to you ASAP";
$site_name = "Xero Template <noreply@xerotemplate.com>";

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);
$submitted = $_POST['submitted'];

if(isset($submitted)){
	if($name === ''){
		$name_empty = true;
		$error = true;
	} elseif ($email === '') {
		$email_empty = true;
		$error = true;
	} elseif (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", $email)){
		$email_unvalid = true;
		$error = true;	
	} elseif ($message === ''){
		$message_empty = true;
		$error = true;
	}
	
	if(isset($error)){
		echo '<span class="error_notice"><ul>';
		if($name_empty){
			echo '<li>Please enter your name</li>';
		} elseif ($email_empty) {
			echo '<li>Please enter your email address</li>';
		} elseif ($email_unvalid) {
			echo '<li>Please enter a valid email address</li>';
		} elseif ($message_empty) {
			echo '<li>Please enter your message</li>';
		} else {
			echo '<li>An error has occurred while sending your message. Please try again later.</li>';
		}
		echo "</ul></span>";
	}
	
	if(!isset($error)){
		$subject = 'Contact Form Submission from '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nMessage: $message";
		$headers = 'From: ' . $site_name . ' <' . $emailTo . '> ' . "\r\n" . 'Reply-To: ' . $email;
		mail($email_to, $subject, $body, $headers);
		
		echo '<span class="success_notice">' . $success_message . '</span>';
	}
}
?>