<?php

// $db = mysql_connect ("127.0.0.1", "elpromonteu", "123dewde#$45refr#3");
// mysql_select_db ("elpromonteu");


$host="127.0.0.1"; // Host name 
$username="elpromonteu"; // Mysql username 
$password="123dewde#$45refr#3"; // Mysql password 
$db_name=" elpromonteu"; // Database name 
// Connect to server and select databse. 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); mysql_select_db("$db_name")or die("cannot select DB");


$mailToSend = 'tomaszklepacki@op.pl';
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$name       = $_POST['firstname'];
    $lastname   = $_POST['lastname'];
	$message    = $_POST['message'];
    $email      = $_POST['email'];
	$errors     = Array();
	$return     = Array();
	if ( empty( $firstname ) ) {
		array_push( $errors, 'firstname' );
	}
    if ( empty( $lastname ) ) {
		array_push( $errors, 'lastname' );
	}

	if ( empty( $message ) ) {
		array_push( $errors, 'message' );
	}
    
	if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
		array_push( $errors, 'email' );
	}
	

	if ( count( $errors ) > 0 ) {
		$return['errors'] = $errors;
	} else {
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: elpromont.eu' . "\r\n";
		$headers .= 'Reply-to: ' . $email;
		$message = "
			<html>
			<head>
			<meta charset=\"utf-8\">
			</head>
			<style type='text/css'>
				body {font-family:Montserrat, sans-serif; color:#222; padding:20px;}
				div {margin-bottom:10px;}
				.msg-title {margin-top:30px;}
			</style>
			<body>
			<div>Imię: <strong>$firstname</strong></div>
            <div>Nazwisko: <strong>$lastname</strong></div>
			<div>Email: <a href=\"mailto:$email\">$email</a></div>
			<div class=\"msg-title\"> <strong>Wiadomość:</strong></div>
			<div>$message</div>
			</body>
			</html>";

		if ( mail( $mailToSend, 'Wiadomość ze strony elpromont.eu - ' . date( "d-m-Y" ), $message, $headers ) ) {
			$return['status'] = 'ok';
		} else {
			$return['status'] = 'error';
		}
	}

	header( 'Content-Type: application/json' );
	echo json_encode( $return );
}