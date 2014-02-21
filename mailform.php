<?php
if (isset($_REQUEST['email']))
//if "email" is filled out, send email
{
	//send email
	$emailTo = 'hoot@robotowl.com' ;
	$email = $_REQUEST['email'] ;
	$subject = 'Submitted message from '.$email ;
	$message = 'Email: '.$email ;
	mail($emailTo, $subject, $message);
	echo "Thank you for using our mail form";
}else{
	echo "You did not supply your email address";
}
?>