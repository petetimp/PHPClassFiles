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
		//Write code here to email the user 
		//	her password and BCC yourself.
	}
?>
</body>
</html>
