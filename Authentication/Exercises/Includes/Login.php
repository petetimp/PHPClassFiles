<?php
	/*
	MY SOLUTION-not database oriented
	$dbEntries = array(	'Email'=>'','Password'=>'');
	*//*
	$dbEntries['Email']=$_POST['Email'];
	$dbEntries['Password']=$_POST['Password'];

        $email = $dbEntries['Email'];
        $pw = $dbEntries['Password'];
        if ($email == 'petetimp@eden.rutgers.edu' && $pw == 'Knights1')
        {
            $msg="Success";
        }
        else
        {
            $msg="Login Failed";
            unset($_POST['LoggingIn']);
        }
*/?>
<?php
//ACTUAL SOLUTION (database oriented)
	/*Set dbEntries = to the $_POST array*/
    $dbEntries = $_POST;
	/*For each REFERENCED entry ($entry) in $dbEntries, (using a foreach
	loop) process the entry (with dbString($entry) found in 
	'fnStrings.php') to make it database (SQL) safe*/
    foreach ($dbEntries as &$entry)
    {
        $entry = dbString($entry);
    }
	//connect to the Northwind database 
    @$db = new mysqli('localhost','root','pwdpwd','Northwind');
    if (mysqli_connect_errno())
    {
        echo 'Cannot connect to database: ' . mysqli_connect_error();
    }
    else
    {//Run the query
        $query = "SELECT EmployeeID, FirstName, LastName
                    FROM Employees
                    WHERE Email = '" . $dbEntries['Email'] .
                    "' AND Password = '" . $dbEntries['Password'] . "'";
        $result = $db->query($query);
 		/*If the login is correct, display that the user is logged in as
		 the first and last name that corresponds to the login/email*/
        if ($result->num_rows)
        {
            $row = $result->fetch_assoc();
            $msg = 'Logged in as ' .
                $row['FirstName'] . ' ' . $row['LastName'];
        }
		/*If the login is incorrect, display a message stating that 
		login has failed, unset the 'LoggingIn' element from the $_POST 
		array, and set $dbEntries to the updated $_POST array so that
		 the login form can be redisplayed*/
        else
        {
            $msg = 'Login Failed';
            unset($_POST['LoggingIn']);
            $dbEntries = $_POST;
        }
    }
?>