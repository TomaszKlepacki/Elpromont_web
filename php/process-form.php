<<<<<<< HEAD
<?php
if (isset($_REQUEST['firstname'],$_REQUEST['email'])) {
      
    $firstname = $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
      
    // Set your email address where you want to receive emails. 
    $to = 'tomaszklepacki@op.pl';
      
    $subject = 'Contact Request From Website';
    $headers = "From: ".$firstname." <".$email."> \r\n";
      
    $send_email = mail($to,$subject,$message,$headers);
      
    echo ($send_email) ? 'success' : 'error';
      
}
=======
<?php
if (isset($_REQUEST['firstname'],$_REQUEST['email'])) {
      
    $firstname = $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
      
    // Set your email address where you want to receive emails. 
    $to = 'tomaszklepacki@op.pl';
      
    $subject = 'Contact Request From Website';
    $headers = "From: ".$firstname." <".$email."> \r\n";
      
    $send_email = mail($to,$subject,$message,$headers);
      
    echo ($send_email) ? 'success' : 'error';
      
}
>>>>>>> 77efbab9ede98ede2643370d140646423ca19032
?>