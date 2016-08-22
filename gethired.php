<html>
<head>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<title>Confirmation</title>
</head>
<?php

require_once('PHPMailer/class.phpmailer.php');
include("PHPMailer/class.smtp.php");
require ('PHPMailer/PHPMailerAutoload.php');
//$name=$_POST["name"];
//$email=$_POST["email"];
//$message=$_POST["message"];
$name="Harsha";
$email="xyz@gmail.com";
$message="Hiee";
if(strcmp($name,"")){
$message="Name: ".$name."\nEmail: ".$email."\nMessage: ".$message;
smtpmailer('youremail', $email, 'Request for Querry', 'Hiring', $message);
echo $error;
}
else{
	$mess='<br></br><br></br><center><h2>Please enter your Details.....</h2></center>';
	echo $mess;
}
function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = 'youremail';  
	$mail->Password = 'password';           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}
 ?> 
 </html>