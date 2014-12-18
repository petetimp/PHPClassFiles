<?php $today=date('l');
/*For some reason, the date function is returning the
 date as tomorrow rather than today?>*/
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $today;?></title>
	</head>
	<body>
    	<?php
		echo $today;
		?>
	</body>
</html>