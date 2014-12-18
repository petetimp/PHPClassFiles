<?php
//This file sets several variables used throughout the application.
	//initally we want $showForm to be true because we want to display
	//the form to the user to fill out
	$showForm = true;
	/*the mgrEntries array will be used for the data in the 'Manager'
	 select menu*/
	$mgrEntries = array();
	$mgrEntries[1]='Nancy Davolio';
	$mgrEntries[2]='Andrew Fuller';
	$mgrEntries[3]='Janet Leverling';
	$mgrEntries[4]='Margaret Peacock';
	$mgrEntries[5]='Steven Buchanan';
	$mgrEntries[6]='Michael Suyama';
	$mgrEntries[7]='Robert King';
	$mgrEntries[8]='Laura Callahan';
	$mgrEntries[9]='Anne Dodsworth';
	/*declare an empty $errors array that will store all of the errors
	during form processing*/
	$errors = array();
	/*The $dbEntries array holds all of the keys for all of the form 	
	  fields EXCEPT the manager select menu. The values for these 	
	  entries do not get inserted until the 'ProcessEmployee.php' file
	  (after the form is submitted)
	*/
	$dbEntries = array(	'FirstName'=>'',
						'LastName'=>'',
						'Email'=>'',
						'Title'=>'',
						'TitleOfCourtesy'=>'',
						'Address'=>'',
						'City'=>'',
						'Region'=>'',
						'PostalCode'=>'',
						'Country'=>'',
						'HomePhone'=>'',
						'Extension'=>'',
						'Notes'=>'',
						'ReportsTo'=>'',
						'Password'=>'',
						'Email'=>'',
						'BirthMonth'=>1,
						'BirthDay'=>1,
						'BirthYear'=>date('Y'),
						'HireMonth'=>1,
						'HireDay'=>1,
						'HireYear'=>date('Y'));	
	/*The browserEntries array is meant to hold the entered form data 
	and display it for confirmation (if there are no errors)
	*/
	$browserEntries = array();
?>
