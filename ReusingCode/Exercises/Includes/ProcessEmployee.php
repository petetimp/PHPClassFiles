<?php
/*This file contains code for processing the form entries. It makes
 use of functions in the fnFormValidation.php file for validating
  entries.
 
   		-If no errors are found, it sets the boolean $showForm to
   false, so that the original form will not be displayed and it
    outputs all the entries (made browser-safe) to the browser for
	 confirmation.
	  	-If errors are found, it adds them to the $errors
	  array, which is passed into the form presentation functions, so
	   that they can return code for displaying the errors. If there
	    are errors, the boolean $showForm is left as true, so that the
		 original form is redisplayed.

		 function dbString($email)*/
	$dbEntries['FirstName'] = dbString($_POST['FirstName']);
	$dbEntries['LastName'] = dbString($_POST['LastName']);
	$dbEntries['Title'] = ucwords(dbString($_POST['Title']));
	$dbEntries['Address'] = dbString($_POST['Address']);
	$dbEntries['City'] = dbString($_POST['City']);
	$dbEntries['Region'] = dbString($_POST['Region']);
	$dbEntries['PostalCode'] = dbString($_POST['PostalCode']);
	$dbEntries['Country'] = dbString($_POST['Country']);
	$dbEntries['HomePhone'] = dbString($_POST['HomePhone']);
	$dbEntries['Extension'] = dbString($_POST['Extension']);
	$dbEntries['Notes'] = dbString($_POST['Notes']);
	$dbEntries['ReportsTo'] = $_POST['ReportsTo'];
	$dbEntries['Password'] = dbString($_POST['Password1']);
	$dbEntries['Email'] = dbString($_POST['Email']);
	$dbEntries['BirthMonth'] = dbString($_POST['BirthMonth']);
	$dbEntries['BirthDay'] = dbString($_POST['BirthDay']);
	$dbEntries['BirthYear'] = dbString($_POST['BirthYear']);
	$dbEntries['HireMonth'] = dbString($_POST['HireMonth']);
	$dbEntries['HireDay'] = dbString($_POST['HireDay']);
	$dbEntries['HireYear'] = dbString($_POST['HireYear']);
	//First Name field
	if (!checkLength($_POST['FirstName']))//Error
	{
		$errors['FirstName'] = 'First name omitted.';
	}
	else//No error
	{
		$browserEntries['FirstName'] = browserString($_POST['FirstName']);
	}
	//Last Name field
	if (!checkLength($_POST['LastName']))//Error
	{
		$errors['LastName'] = 'Last name omitted.';
	}
	else//No error
	{
		$browserEntries['LastName'] = browserString($_POST['LastName']);
	}
	//Title field
	if (!checkLength($_POST['Title']))//Error
	{
		$errors['Title'] = 'Title omitted.';
	}
	else//No error
	{
		$browserEntries['Title'] = ucwords(browserString($_POST['Title']));
	}
	//Title of Courtesy field
	if ( array_key_exists('TitleOfCourtesy',$_POST) )//No error
	{
		$browserEntries['TitleOfCourtesy'] = browserString($_POST['TitleOfCourtesy']);
		$dbEntries['TitleOfCourtesy'] = dbString($_POST['TitleOfCourtesy']);
	}
	else//Error
	{
		$errors['TitleOfCourtesy'] = 'Title of Courtesy not selected.';
	}
	//Birth date select menu
	if (!checkdate($_POST['BirthMonth'],$_POST['BirthDay'],$_POST['BirthYear']))//Error
	{
		$errors['BirthDate'] = 'Birth date is not a valid date.';
	}
	//Hire date select menu
	if (!checkdate($_POST['HireMonth'],$_POST['HireDay'],$_POST['HireYear']))//Error
	{
		$errors['HireDate'] = 'Hire date is not a valid date.';
	}
	//Address field
	if (!checkLength($_POST['Address'],5,200))//Error
	{
		$errors['Address'] = 'Address omitted.';
	}
	else//No error
	{
		$browserEntries['Address'] = browserString($_POST['Address']);
	}
	//City field
	if (!checkLength($_POST['City'],1,100))//Error
	{
		$errors['City'] = 'City omitted.';
	}
	else//No error
	{
		$browserEntries['City'] = browserString($_POST['City']);
	}
	//Region field (must be 2 characters)
	if (!checkLength($_POST['Region'],2,2) && !checkLength($_POST['Region'],0,0))//Error
	{
		$errors['Region'] = 'Region name must be two characters.';
	}
	else//No error
	{
		$browserEntries['Region'] = browserString($_POST['Region']);
	}
	//Postal Code field
	if (!checkLength($_POST['PostalCode']))//Error
	{
		$errors['PostalCode'] = 'Postal Code omitted.';
	}
	else//No error
	{
		$browserEntries['PostalCode'] = browserString($_POST['PostalCode']);
	}
	//Country field
	if (!checkLength($_POST['Country']))//Error
	{
		$errors['Country'] = 'Country omitted.';
	}
	else//No error
	{
		$browserEntries['Country'] = browserString($_POST['Country']);
	}
	//Home phone field
	if (!checkLength($_POST['HomePhone'],10,15))//Error
	{
		$errors['HomePhone'] = 'Home phone must be between 10 and 15 characters.';
	}
	else//No error
	{	
		$browserEntries['HomePhone'] = browserString($_POST['HomePhone']);
	}
	//Extension field
	if (!checkLength($_POST['Extension'],3,5))//Error
	{
		$errors['Extension'] = 'Extension must be between 3 and 5 characters.';
	}
	else//No error
	{
		$browserEntries['Extension'] = browserString($_POST['Extension']);
	}

	if (!checkLength($_POST['Notes'],0,100))//Error
	{
		$errors['Notes'] = 'Notes must be fewer than 100 characters:<br>
			<span style="color:blue; font-weight:normal">' .
			browserString(substr($_POST['Notes'],0,100)) .
			'</span><span style="color:red; font-weight:normal;
			text-decoration:line-through;">' .
			browserString(substr($_POST['Notes'],100)) .
			'</span>';
	}
	else//No error
	{
		$browserEntries['Notes'] = browserString($_POST['Notes']);
	}
	//Reports To select menu
	if ($_POST['ReportsTo'] == 0)//Error (nothing selected)
	{
		$errors['ReportsTo'] = 'Manager not selected.';
	}
	else//No error
	{
		$browserEntries['ReportsTo'] = $_POST['ReportsTo'];
	}
	//Password field
	if ( !checkPassword($_POST['Password1'],$_POST['Password2']) )//Error
	{
		$errors['Password'] = 'Passwords do not match or are not the right length.';
	}
	else//No error
	{
		$browserEntries['Password'] = browserString($_POST['Password1']);
	}
	//Email field
	if ( !checkEmail($_POST['Email']) )//Error
	{
		$errors['Email'] = 'Email is invalid.';
	}
	else//No error
	{
		$browserEntries['Email'] = browserString($_POST['Email']);
	}
?>
<?php //If there are no errors, do not show the form
	if (!count($errors))
	{
		$showForm = false;
?>	<!--form for confirming entered form entries-->
	<form method="post" action="AddEmployee.php">
    <!--elseif (array_key_exists('Confirmed',$_POST)) in AddEmployee.php-->
	<input type="hidden" name="Confirmed" value="true">
	<?php
			/*	EXAMPLE OUTPUT
				
				Confirm Entries
				
				FirstName: Peter
				LastName: Timpone
				Title: Student
				TitleOfCourtesy: Mr.
				Address: 14 Rhode Street
				City: Sayreville
				Region: NJ
				PostalCode: 08872
				Country: United States
				HomePhone: 7326511327
				Extension: 456
				Notes:
				Manager: Janet Leverling
				Password: Knights
				Email: petetimp@eden.rutgers.edu*/
		echo '<h2>Confirm Entries</h2>';
		echo '<ol>';
		foreach ($browserEntries as $key=>$entry)
		{
			if ($key=='ReportsTo')
			{
				echo "<li><b>Manager:</b> $mgrEntries[$entry]</li>";
			}
			else
			{
				echo "<li><b>$key:</b> $entry</li>";
			}
		}
		echo '</ol>';
		/*Example output on web page
		<input type="hidden" name="FirstName" value="Peter">
		<input type="hidden" name="LastName" value="Timpone">
	 <input type="hidden"name="Email"value="petetimp@eden.rutgers.edu">
		<input type="hidden" name="Title" value="Student">
		<input type="hidden" name="TitleOfCourtesy" value="Mr.">
		<input type="hidden" name="Address" value="14 Rhode Street">
		<input type="hidden" name="City" value="Sayreville">
		<input type="hidden" name="Region" value="NJ">
		<input type="hidden" name="PostalCode" value="08872">
		<input type="hidden" name="Country" value="United States">
		<input type="hidden" name="HomePhone" value="7326511327">
		<input type="hidden" name="Extension" value="456">
		<input type="hidden" name="Notes" value="">
		<input type="hidden" name="ReportsTo" value="3">
		<input type="hidden" name="Password" value="Knights">
		<input type="hidden" name="BirthMonth" value="1">
		<input type="hidden" name="BirthDay" value="1">
		<input type="hidden" name="BirthYear" value="2013">
		<input type="hidden" name="HireMonth" value="1">
		<input type="hidden" name="HireDay" value="1">
		<input type="hidden" name="HireYear" value="2013">*/
		foreach ($dbEntries as $key=>$entry)
		{
	?>
		<input type="hidden" name="<?php echo $key ?>"
			value="<?php echo $entry ?>">
	<?php
		}
	?>
		<input type="submit" value="Confirm"><!--Confirm button-->
	</form>
<?php
	}
	else//Errors
	{
		$dbEntries = $_POST;
	}
?>
