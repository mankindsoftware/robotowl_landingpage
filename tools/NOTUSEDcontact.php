<?php 
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP

//If the form is submitted
if(isset($_POST['submitted'])) {
		
	// upon no failure errors let's email now!
	if(!isset($hasError)) {
		$email = trim($_POST['email']);
		$emailTo = 'hoot@robotowl.com';
		$subject = 'Submitted message from '.$email;
		$sendCopy = trim($_POST['sendCopy']);
		$body = "Email: $email";
		$headers = 'From: ' .' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
		mail($emailTo, $subject, $headers);
        // set our boolean completion value to TRUE
		$emailSent = true;
	}
}
?>
<!DOCTYPE html>
<html xml:lang="en" lang="en"> 
<head> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<link href="../css/formstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- @begin contact -->
	<div id="contact" class="section">
			<div class="container content">
					<form id="contact-us" action="contact.php" method="post">
						<div class="formblock">
							<label class="screen-reader-text"></label>
							<input type="email" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email field cursor" placeholder="your@email.com" />
							<?php if($emailError != '') { ?>
								class="error"><?php echo $emailError;?>
							<?php } ?>
						</div>
							<button name="submit" type="submit" class="subbutton submit"></button>
							<input type="hidden" name="submitted" id="submitted" value="true" />
					</form>			
				</div>
				
		</div>
    </div><!-- End #contact -->
	
<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	$(document).ready(function() {
		$('form#contact-us').submit(function() {
			$('form#contact-us .error').remove();
			var hasError = false;
			$('.requiredField').each(function() {
				if($.trim($(this).val()) == '') {
					var labelText = $(this).prev('label').text();
					$(this).parent().next().next().before('</br><span class="error">&nbsp&nbsp&nbsp`(OvO)´ we\'ll need your email address to contact you</span>');
					$(this).addClass('inputError');
					hasError = true;
				} 			});
			if(!hasError) {
				var formInput = $(this).serialize();
				$.post($(this).attr('action'),formInput, function(data){
					$('form#contact-us').slideUp("fast", function() {				   
						$(this).before('<p class="tick"><strong>Sweet!</strong> We\'ll let you know what\'s up!</p>');
					});
				});
			}
			return false;	
		});
	});
	//-->!]]>
</script>

</body>
</html>