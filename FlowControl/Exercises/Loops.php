<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Loops</title>
</head>

<body>
<h2>while</h2>
<ul>
<?php
	//Use a while loop to output all the even numbers
	//less than or equal to 100.
	$evens=0;
	while($evens<=100){
		if ($evens % 3 != 0 && $evens % 2 == 0) {
            echo $evens;
        }
		echo "<br>";
		$evens+=2;	
	}
?>
</ul>

<h2>for</h2>
<ul>
<?php
	//Use a for loop to output all the odd numbers
	//less than or equal to 100.
	for ($odds=1; $odds<=100; $odds+=2){
		if ($odds%3 != 0 && $odds%2 !=0){
			echo $odds;
		}
		echo "<br>";
	}
?>
</ul>
</body>
</html>
