<?php
if (isset($_REQUEST['email']) && strlen($email) > 3)
//if "email" is filled out, send email
{
	$email = $_REQUEST['email'] ;
	//send email
	$emailTo = 'hoot@robotowl.com' ;
	$subject = 'Submitted message from '.$email ;
	$message = 'Email: '.$email ;
	mail($emailTo, $subject, $message);
	echo "`(OvO)´ Sweet! We'll let you know what's up.";
}else{
	echo "Please check your email address";
}
?>