<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Sales Report</title>
</head>
<body>
<?php
/*If the 'LastStart' array key from the $_GET array exists, 
proceed to the next step.  This key only exists if the 'Previous 
10' or 'Next 10' buttons have been clicked on the bottom of the 
table*/
if (array_key_exists('LastStart',$_GET))
	{
		/*If the next button is pressed set the value of
		$currentRow to $_GET['LastStart'] + 10*/
		if (array_key_exists('Next',$_GET))
		{
			$currentRow = $_GET['LastStart'] + 10;
		}
		/*If the previous button is pressed set the value of
		$currentRow to $_GET['LastStart'] - 10*/
		elseif (array_key_exists('Prev',$_GET))
		{
			$currentRow = $_GET['LastStart'] - 10;
		}
		if ($currentRow < 0)
		{
			$currentRow=0;
		}
	}
	//at the start of the program $currentRow will be 0.
	else
	{
		$currentRow = 0;
	}
//Turn off all errors
ini_set("display_errors","Off");
//Include MDB2 Package
require_once 'MDB2.php';
//Connect to the Northwind database.
$dsn = 'mysqli://root:pwdpwd@localhost/Northwind';

$mdb2 = new MDB2();
$conn = $mdb2->connect($dsn);
$pear = new PEAR();
//If the connection fails, return an error message to the 
//browser.
if ($pear->isError($conn)) {
    die($conn->getMessage().' - '.$conn->getUserinfo());
}
//  If the connection succeeds run a query that gets the order date
//      and the first and last name of the associated employee
//      and the customer company for all orders.  Order by OrderDate.
$sql ="SELECT e.FirstName, e.LastName, c.CompanyName,
				DATE_FORMAT(o.OrderDate, '%M %e, %Y') AS OrderDate
			FROM Employees e
				JOIN Orders o ON (e.EmployeeID = o.EmployeeID)
				JOIN Customers c ON (c.CustomerID = o.CustomerID)
				ORDER BY o.OrderDate
				LIMIT $currentRow,10";
$result = $conn->query($sql);
$numResults = $result->numRows();

// check if the query was executed properly
if ($pear->isError($result)) {
    die($result->getMessage().' - '.$result->getUserinfo());
}else

{
//Output the number of results at the top of the table
?>
    <table border="1">
    <tr>
        <th>#</th>
        <th>Salesperson</th>
        <th>Customer</th>
        <th>Order Date</th>
    </tr>
<?php
    //Create rows for each record returned from the query.
	$count=$currentRow+1;
	while ($row = $result->fetchRow(MDB2_FETCHMODE_ASSOC))
	{
		echo '<tr>';
		echo "<td>$count</td>";
		echo '<td>' . $row['firstname'] . ' ' .
				$row['lastname'] . '</td>';
		echo '<td>' . $row['companyname'] . '</td>';
		echo '<td>' . $row['orderdate'] . '</td>';
		echo '</tr>';
		$count++;
	}
?>
		<!--Bottom table row is for the Previous/Next Buttons -->
		<tr>
			<td colspan="4">
				<form method="get" action="SalesReport.php">
					<input type="hidden" name="LastStart" value="		<?php echo $currentRow ?>">
                    <!--if the current row is less than 1, (this
                     happens when the page loads), disable the 
                     'Previous' button-->
					<input type="submit" name="Prev" value="Previous 10"   
					<?php if ($currentRow < 1) echo "disabled"; ?>>					<!--if there are less than 10 results(rows) on the current page (most likely the last page), disable the 'Next button'-->
					<input type="submit" name="Next" value="Next 10"
					<?php if ($numResults < 10) echo "disabled"; ?>>
				</form>
			</td>
		</tr>
	</table>
<?php
    //Free the result and disconnect from the database.
	$result->free();
	$conn->disconnect();
}
?>
</body>
</html>
