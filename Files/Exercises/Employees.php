<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Employees</title>
</head>
<body>
<h1>Employees</h1>
<?php
	$myFile = @fopen("Employees.txt", 'r');
	
	if (!$myFile)
	{
		echo '<p>Cannot open file.';
	}
	else
	{
		while (!feof($myFile))
		{
			$employee = fgets($myFile, 999);
			echo $employee.'<br>';
		}
		fclose($myFile);
	}
?>
</body>
</html>
