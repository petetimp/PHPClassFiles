<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Northwind Home Page</title>
</head>
<body>
<?php
	require 'Includes/Header.php';
?>
<h1 align="center">Log in</h1>
<form method="post" action="Login.php">
<table align="center">
	<tr>
		<td>Email:</td>
		<td><input type="text" name="Email" size="20"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="Password" size="10"></td>
	</tr>
	<tr>
		<td colspan="2" align="right">
			<input type="submit" value="Login">
		</td>
	</tr>
</table>
</form>
<?php
	require 'Includes/Footer.php';
?>
</body>
</html>
