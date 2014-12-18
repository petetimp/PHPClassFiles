<?php
/*Open Authentication/Exercises/index.php in your editor. This file 
has been created for you and contains the underlying logic of the 
authentication application. You will see that it includes several of 
the scripts we saw in earlier exercises. Most of these are exactly the
 same, but a small change has been made to the pwEntry() function in 
 Authentication/Exercises/Includes/fnFormPresentation.php. It now 
 takes a fifth parameter: $repeat. When $repeat is set to true 
 (default), the user will be asked to repeat her password (used for 
 registration forms). When $repeat is set to false, she'll just get a 
 single password field (used for login forms).

Your job is to finish Authentication/Exercises/Includes/LoginForm.php 
and Authentication/Exercises/Includes/Login.php, which are currently 
both nearly empty. You may find it helpful to refer to 
ManagingData/Demos/Includes/EmployeeForm.php when creating 
LoginForm.php and to ManagingData/Demos/Includes/ProcessEmployee.php 
when creating Login.php.*/
	/*require 'fnFormPresentation.php' for presentation of the log in
	form*/
	require 'Includes/fnFormPresentation.php';
	/*require the 'fnStrings.php' for database processing*/
	require 'Includes/fnStrings.php';
	/*declare an empty errors array that will hold errors if present.
	'fnFormPresentation.php' handles this*/ 
	$errors = array();
	/*create a dbEntries array with two keys ('Email' and 'Password') with blank values*/
	$dbEntries = array(	'Email'=>'',
						'Password'=>'');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Northwind Home Page</title>
</head>
<body>
<?php
	/*declare a blank message var to to a login success or failure 
	message*/
	$msg='';
	//require the header file
	require 'Includes/Header.php';
	/*if the 'LoggingIn' key exists in the $_POST array, it means that
	the user has attempted to login with an Email and Password.  
	Require 'Includes/Login.php' to prcess the Email and Password form
	data.*/
	if (array_key_exists('LoggingIn',$_POST))
	{
		require 'Includes/Login.php';
	}
	/*if the 'LoggingIn' key does not exist it means that either the 
	email or password that the user entered was invalid, therefore 
	unsetting the 'LoggingIn' key with 'unset($_POST['LoggingIn']) OR 
	that the user has not attempted to log in with an email and password
	yet.'*/
	if (!array_key_exists('LoggingIn',$_POST))
	{
		require 'Includes/LoginForm.php';
	}
	/*if the length of the $msg var is greater than 0, it means that
	the login info has been processed.  Therefore, echo the message,
	which tells the user whether their login was a success or failure*/ 
	if (strlen($msg) > 0)
	{
		echo "<div align='center'>$msg</div>";
	}
	//require the footer file
	require 'Includes/Footer.php';
?>
</body>
</html>
