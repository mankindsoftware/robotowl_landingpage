<?php
if (isset($_REQUEST['email']) && filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL))
//if "email" is filled out, send email
{
	$email = $_REQUEST['email'] ;
	//send email
	$emailTo = 'hoot@robotowl.com' ;
	$subject = 'Submitted message from '.$email ;
	$message = 'Email: '.$email ;
	mail($emailTo, $subject, $message);
	echo "`(OvO)´ Sweet! We'll let you know what's up";
}else{
	echo "`(OvO)´ Please check your email address";
}
?>