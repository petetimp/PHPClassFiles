<?php
	//Add code to populate $dbEntries with
	//SQL-safe entries from the form
	/*****REMEMBER***** Instead of assigning values from $_POST
	 to $dbEntries one by one, we simply copy $_POST into 
	 $dbEntries and then loop through the array to pass each 
	 element through dbString(). Notice the use of the & to make 
	 $entry a reference to rather than a copy of the array 
	 element.
	 *****ALSO KEEP IN MIND*****
	 	The reason why we have to reassign the $_POST array to $dbEntries (and run the dbstring function) is because the raw post array is passed on to this page and needs to be reprocessed.
	 */
	 
	/*<--REMOVE THIS COMMENT to see first part of code
	$dbEntries = $_POST;
	foreach ($dbEntries as &$entry)
	{
		$entry = dbString($entry);
	}
	
	//Connect to the database
	@$db = new mysqli('localhost','root','pwdpwd','Northwind');
	
	//Finish the query below
	$query = "INSERT INTO Employees
        (FirstName, LastName, Title,
            TitleOfCourtesy, Email, BirthDate, HireDate,
            Address, City, Region, PostalCode, Country,
            HomePhone, Extension, Notes, ReportsTo, Password)
        VALUES ('" .    $dbEntries['FirstName'] . "','" .
                        $dbEntries['LastName'] . "','" .
                        $dbEntries['Title'] . "','" .
                        $dbEntries['TitleOfCourtesy'] . "','" .
                        $dbEntries['Email'] . "','" .
                        $dbEntries['BirthYear'] . "-" .
                            $dbEntries['BirthMonth'] . "-" .
                            $dbEntries['BirthDay'] . "','" .
                        $dbEntries['HireYear'] . "-" .
                            $dbEntries['HireMonth'] . "-" .
                            $dbEntries['HireDay'] . "','" .
                        $dbEntries['Address'] . "','" .
                        $dbEntries['City'] . "','" .
                        $dbEntries['Region'] . "','" .
                        $dbEntries['PostalCode'] . "','" .
                        $dbEntries['Country'] . "','" .
                        $dbEntries['HomePhone'] . "','" .
                        $dbEntries['Extension'] . "','" .
                        $dbEntries['Notes'] . "'," .
                        $dbEntries['ReportsTo'] . ",'" .
                        $dbEntries['Password'] . "')";
	//Execute the query.  
						
	if ($dB->query($query))
    {
		//If the query succeeds, return 'Employee Added'
		//and provide a link to EmployeeReport.php
        echo '<div align="center">Employee Added</div>
            <a href="EmployeeReport.php">Employee Report</a>';
        //and set $showForm to false
		//$showForm = false;
		//Challenge Solution
		foreach ($dbEntries as &$entry)
        {
            $entry = '';
        }
    }
    else
    {	//If it fails, return 'Insert failed'
        echo '<div align="center">Insert failed</div>';
    }
	REMOVE THIS COMMENT to see first part of code-->*/
	?>
<?php
    $dbEntries = $_POST;
    foreach ($dbEntries as &$entry)
    {
        $entry = dbString($entry);
    }
 
    @$dB = new mysqli('localhost','root','pwdpwd','Northwind');
    if (mysqli_connect_errno())
    {
        echo 'Cannot connect to database: ' . mysqli_connect_error();
    }
    $query = "INSERT INTO Employees
        (FirstName, LastName, Title,
            TitleOfCourtesy, Email, BirthDate, HireDate,
            Address, City, Region, PostalCode, Country,
            HomePhone, Extension, Notes, ReportsTo, Password)
        VALUES ('" .    $dbEntries['FirstName'] . "','" .
                        $dbEntries['LastName'] . "','" .
                        $dbEntries['Title'] . "','" .
                        $dbEntries['TitleOfCourtesy'] . "','" .
                        $dbEntries['Email'] . "','" .
                        $dbEntries['BirthYear'] . "-" .
                            $dbEntries['BirthMonth'] . "-" .
                            $dbEntries['BirthDay'] . "','" .
                        $dbEntries['HireYear'] . "-" .
                            $dbEntries['HireMonth'] . "-" .
                            $dbEntries['HireDay'] . "','" .
                        $dbEntries['Address'] . "','" .
                        $dbEntries['City'] . "','" .
                        $dbEntries['Region'] . "','" .
                        $dbEntries['PostalCode'] . "','" .
                        $dbEntries['Country'] . "','" .
                        $dbEntries['HomePhone'] . "','" .
                        $dbEntries['Extension'] . "','" .
                        $dbEntries['Notes'] . "'," .
                        $dbEntries['ReportsTo'] . ",'" .
                        $dbEntries['Password'] . "')";
 
    if ($dB->query($query))
    {
        echo '<div align="center">Employee Added</div>
            <a href="EmployeeReport.php">Employee Report</a>';
        //$showForm = false;
		foreach ($dbEntries as &$entry)
        {
            $entry = '';
        }
    }
    else
    {
        echo '<div align="center">Insert failed</div>';
    }
?>
