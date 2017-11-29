<?php
if(isset($_POST['email'])) {
	
	// EDIT THE 2 LINES BELOW AS REQUIRED
	$email_to = "info@nobilitassolicitors.com";
	$email_subject = "Contact Form";
	$email_from = $_POST['email'];
	
	function died($error) {
		// your error code can go here
		echo "We are very sorry, but there were error(s) found with the form your submitted. ";
		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}
	
	
	
	$fullname = $_POST['fullname']; // required
	$email = $_POST['email']; // required
	$message = $_POST['message']; // required
	
	


	
	
	$string_exp = "^[a-z .'-]+$";
  if(!eregi($string_exp,$fullname)) {
  	$error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  $error_message = "";
	$email_exp = "^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$";
  if(!eregi($email_exp,$email)) {
  	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
  if(strlen($message) < 2) {
  	$error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  
	$email_message = "Form details below.\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	
	$email_message .= "Name: ".clean_string($fullname)."\n";
	$email_message .= "Email: ".clean_string($email)."\n";
	$email_message .= "Message: ".clean_string($message)."\n";
	
	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>

<!-- include your own success html here -->

<html>
<head>
<meta http-equiv="Refresh"
content="4;url=http://www.nobilitassolicitors.com">
<link rel="shortcut icon" href="favicon.png" type="image/x-icon" >
<link rel="shortcut icon" type="image/png" href="favicon.png" />
</head>

<body>
<div class="container" style="padding-top:120px; font-family: Century Gothic;">
    			<div class="row" style="padding-left: 80px; padding-right: 80px; min-width: 100%; text-align: center;">
    				<div class="col-md-12">
						<h3> Message sent successfully </h3>
					<p> Thanks for contacting us!!! We will get back at you shortly. Hence, you will be redirected to our Home page in five seconds.</p>

						<p>If you see this message for more than 10 seconds, please click <a href="http://www.nobilitassolicitors.com">http://www.nobilitassolicitors.com</a></p>
					</div>
				</div>
</div>
</body>
</html>

<?
}
?>