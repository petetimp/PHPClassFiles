<?php
	/*Start the session. NOTE: included files inherit the
	session, so a new session does not need to be started for these 
	files*/
	session_start();//checks to see if there are cookies on the client
	//machine
	require 'Includes/CookieCheck.php';
	//functions for form presentation
	require 'Includes/fnFormPresentation.php';
	//functions for string processing (database and browser)
	require 'Includes/fnStrings.php';
	//declare an empty $errors array to hold future errors
	$errors = array();
	//set up $dbEntries array with 'Email' and 'Password' fields
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
	//Declare an empty message array to hold future messages
	$msg='';
	//header file
	require 'Includes/Header.php';
	//if the employeeID exists, it means the user has logged in
	if (array_key_exists('EmployeeID',$_SESSION))
	{//display a message to the user notifying them that they are 
	//logged in as the current user
		echo '<div align="center">
				Logged in as ' .
				$_SESSION['FirstName'] . ' ' . 
				$_SESSION['LastName'] .
				'</div>';
	}//if not logged in...
	else
	{	//if the 'LoggingIn' key exists it means that the user has 
		//attempted to log in (hidden form input in 'LoginForm.php')
		//require Login.php to process the login credentials
		if (array_key_exists('LoggingIn',$_POST))
		{
			require 'Includes/Login.php';
		}//if the array key doesn't exist display (or redisplay) the 
		//login form
		if (!array_key_exists('LoggingIn',$_POST))
		{
			require 'Includes/LoginForm.php';
		}
		//if the length of the $msg string is greater than 0, 
		//display the message on the web page to the user 
		if (strlen($msg) > 0)
		{
			echo "<div align='center'>$msg</div>";
		}
	}
	//footer file
	require 'Includes/Footer.php';
?>
</body>
</html>
