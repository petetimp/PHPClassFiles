<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Password Reminder</title>
</head>
<body>
<?php
	if (!array_key_exists('Submitted',$_POST))
	{
?>
		Enter your email in the form below to have your password sent to you.
		<form method="post" action="PasswordReminder.php">
		<input type="hidden" name="Submitted" value="true"><br>
		Email: <input type="text" name="To" size="25"><br>
		<input type="submit" value="Send Password">
		</form>
<?php
	}
	else
	{
		﻿$to = $_POST['To'];
		@$db = new mysqli('localhost','root','pwdpwd','Northwind');
		if (mysqli_connect_errno())
		{
		  echo 'Cannot connect to database: ' . mysqli_connect_error();
		}
		else
		{
		 	$query = "SELECT Password FROM Employees WHERE Email = '$to'";
		  	$result = $db->query($query);
		  	$row=$result->fetch_assoc();
			$password = $row['Password'];
			
			require("../class.phpmailer.php");
			
			$message = "Your password is <u>$password</u>.";
		
			$mail = new PHPMailer();
			$mail->IsSMTP(); // send via SMTP
			$mail->Host = 'mail.yourserver.com'; //SMTP server. You'll need to set this.
		
		  	//$mail->SMTPAuth=true;
		  	//$mail->Username='';
		  	//$mail->Password='';
		
		  	$mail->From = 'admin@northwind.com';
			$mail->FromName = 'Northwind Admin';
			$mail->AddAddress($to); //change it to your email address to actually get the email! 
			$mail->AddBCC('ndunn@webucator.com'); 
			$mail->AddReplyTo('admin@northwind.com');
		
			$mail->IsHTML(true); // send as HTML
		
			$mail->Subject  = 'Password Reminder';
			$mail->Body = $message;
		
			if($mail->Send())
			{
				echo "Your password has been sent.";
			}
			else
			{
			 	echo "We could not send your password.<br>";
			 	echo "Mailer Error: " . $mail->ErrorInfo;
			}
		}
	}
?>
</body>
</html>
