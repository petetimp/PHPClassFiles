<?php
	//Assign the passed variable to a variable with
	//a more convenient name.
	$greeting = $_GET['Greet'];
	$name = $_GET['Beatle'];
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo "$greeting $name" ?>!</title>
</head>
<body>
<?php
	echo "$greeting $name!";
?>
</body>
</html>
