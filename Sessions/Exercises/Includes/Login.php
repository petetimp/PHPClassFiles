<?php
	//set $dbEntries to the raw $_POST array
	$dbEntries = $_POST;
	//put the $dbEntries array in a foreach loop to make the entries
	//SQL safe
	foreach ($dbEntries as &$entry)
	{
		$entry = dbString($entry);
	}
	//Attempt to connect to the database
	@$db = new mysqli('localhost','root','pwdpwd','Northwind');
	if (mysqli_connect_errno())
	{
		echo 'Cannot connect to database: ' . mysqli_connect_error();
	}
	//If the connection is good...
	else
	{   //write a SQL query
		$query = "SELECT EmployeeID, FirstName, LastName 
					FROM Employees
					WHERE Email = '" . $dbEntries['Email'] . 
					"' AND Password = '" . $dbEntries['Password'] . "'";		//set the result of the query equal to $result
		$result = $db->query($query);
		//if the $result returns rows (means that it was successful)
		if ($result->num_rows)
		{
			//grab the row from the database and assign to to $row
			$row = $result->fetch_assoc();
			//Display a message notifying the user that they are 
			//logged in as the current person
			$msg = 'Logged in as ' .
				$row['FirstName'] . ' ' . $row['LastName'];
			//set three $_SESSION array vars to 'FirstName', 			
			//'LastName',and 'EmployeeID' of the current row in the 
			//database (session was started in 'index.php')  
			$_SESSION['FirstName'] = $row['FirstName'];
			$_SESSION['LastName'] = $row['LastName'];
			$_SESSION['EmployeeID'] = $row['EmployeeID'];
			//if the 'Remember' key is set in the $_POST array, set a 
			//cookie that remembers the user login for a week
			if ( isset($_POST['Remember']) )
			{//setcookie(name,value,expire,path,domain,secure)
				setcookie('eid', 
							$row['EmployeeID'],
							time()+60*60*24*7);
			}
		}//if the result doesn't return anything, display a message
		//to the user that the login has failed, unset 
		//$_POST['LoggingIn'], and set $dbEntries back to the raw 
		//$_POST array 
		else
		{
			$msg = 'Login Failed';
			unset($_POST['LoggingIn']);
			$dbEntries = $_POST;
		}
	}
?>
