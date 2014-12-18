<?php
	$dbEntries = $_POST;
	foreach ($dbEntries as &$entry)
	{
		$entry = dbString($entry);
	}

	@$db = new mysqli('localhost','root','pwdpwd','Northwind');
	if (mysqli_connect_errno())
	{
		echo 'Cannot connect to database: ' . mysqli_connect_error();
	}
	else
	{
		$query = "SELECT EmployeeID, FirstName, LastName
					FROM Employees
					WHERE Email = '" . $dbEntries['Email'] .
					"' AND Password = '" . $dbEntries['Password'] . "'";
		$result = $db->query($query);

		if ($result->num_rows)
		{
			$row = $result->fetch_assoc();
			$msg = 'Logged in as ' .
				$row['FirstName'] . ' ' . $row['LastName'];
		}
		else
		{
			$msg = 'Login Failed';
			unset($_POST['LoggingIn']);
			$dbEntries = $_POST;
		}
	}
?>
