<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Color Table</title>
</head>

<body>
<h1>Color Table</h1>
<?php
	//Create an array that holds your favorite colors.
	$colors=array("blue","red","purple","green","silver");
?>
<table border="1">
<?php
	//Output a table row for each color.  The background
	//color of the row should be the same as the listed color.
	foreach ($colors as $color){
	echo "<tr style=background-color:$color><td>$color</td></tr>";
	}
?>
</table>
</body>
</html>
