<?php
	$lastName = $_GET['LastName'];
	$gender = $_GET['Gender'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Greeting Page</title>
</head>
<body>
<!--
Insert a PHP block that checks to see if the user filled
out both the LastName and the Gender fields in the form.

If the user failed to fill out either one of the fields,
write out an error message to the screen.

If the user filled out both fields, return a gender-appropriate
greeting such as "Hello Mr. Dunn!" or "Hello Ms. Dunn!"

If the gender is not recognizable (e.g, not male or female),
return an error message.

Try to use both an if condition and a switch statement in this exercise.
-->
<?php
	if (!$lastName || !$gender){
		echo "Please enter both a last name and gender. <a href='Greeting.html'>Try again</a>.";
	}
	if($lastName && $gender){
		$gender=strtolower($gender);
		$lastName=strtolower($lastName);
		$lastName=strtoupper($lastName[0]) . substr($lastName, 1);
		switch($gender){
        case "male": 
          echo "Hello Mr. " . $lastName; 
          break;
        case "female":
          echo "Hello Ms. " . $lastName; 
          break;
        default: 
		  echo "Please enter an appropriate gender (male or female). <a href='Greeting.html'>Try again</a>.";
		  break;//optional
        }	
	}
?>
</body>
</html>
