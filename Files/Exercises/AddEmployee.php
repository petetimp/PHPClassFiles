<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Employees</title>
</head>
<body>
<?php
if (array_key_exists('Submitted',$_POST))
{	
//Create short versions of the Form Variables
	$firstName = $_POST['FirstName'];
	$lastName = $_POST['LastName'];
	$title = $_POST['Title'];
	$email = $_POST['Email'];

	$outputString = "$firstName\t$lastName\t$title\t$email\n";
				  
//Open Employees.txt for appending
//Be sure to suppress errors
	$myFile = @fopen('Employees.txt', 'a');
	
//Write condition to check if file cannot be opened
	if (!$myFile)
	{
		echo '<p><strong> We cannot open the file
				at this time. Please try again later.
				</strong></p></body></html>';
	}
	else
	{
		echo '<h1 align="center">Employee added</h1>';
		
		//Write $outputString to the file
		fwrite($myFile,$outputString);
		
		flock($myFile, LOCK_UN);
		
		//Close the file
		fclose($myFile);
			
		echo '<a href="Employees.php">Employees.php</a>';
	} 
}
else
{
?>
	<h1 align="center">Add Entry</h1>
	<form method="post">
	<input type="hidden" name="Submitted" value="true">
	<table>
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="FirstName" size="15"></td>
	</tr>
	<tr>
		<td>Last Name:</td>
		<td><input type="text" name="LastName" size="15"></td>
	</tr>
	<tr>
		<td>Job Title:</td>
		<td><input type="text" name="Title" size="20"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="text" name="Email" size="50"></td>
	</tr>
	<tr>
		<td colspan="2" align="right">
			<input type="submit" name="Add Employee">
		</td>
	</tr>
	</table>	
	</form>
<?php
}
?>
</div>
</body>
</html>
