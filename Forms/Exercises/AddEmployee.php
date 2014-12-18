<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Add Employee</title>
</head>
<body>
<h1>Add Employee</h1>
<form method="post" action="ProcessEmployee.php">
<table>
	<tr>
		<td>First name:</td>
		<td><input type="text" name="FirstName" size="15"></td>
	</tr>
	<tr>
		<td>Last name:</td>
		<td><input type="text" name="LastName" size="15"></td>
	</tr>
	<tr>
		<td>Title:</td>
		<td><input type="text" name="Title" size="30"></td>
	</tr>
	<tr>
		<td>Title of Courtesy:</td>
		<td>
			<input type="radio" name="TitleOfCourtesy" value="Dr.">Dr.
			<input type="radio" name="TitleOfCourtesy" value="Mr.">Mr.
			<input type="radio" name="TitleOfCourtesy" value="Mrs.">Mrs.
			<input type="radio" name="TitleOfCourtesy" value="Ms.">Ms.
		</td>
	</tr>
	<tr>
		<td>Birth date:</td>
		<td>
			<select name="BirthMonth">
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
			<select name="BirthDay">
			<?php
				for ($i=1; $i<=31; $i++)
				{
					echo "<option value='$i'>$i</option>";
				}
			?>
			</select>
			<select name="BirthYear">
			<?php
				for ($i=2011; $i>=1900; $i=$i-1)
				{
					echo "<option value='$i'>$i</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Hire date:</td>
		<td>
			<select name="HireMonth">
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
			<select name="HireDay">
			<?php
				for ($i=1; $i<=31; $i++)
				{
					echo "<option value='$i'>$i</option>";
				}
			?>
			</select>
			<select name="HireYear">
			<?php
				for ($i=2011; $i>=1992; $i=$i-1)
				{
					echo "<option value='$i'>$i</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Address:</td>
		<td><input type="text" name="Address" size="50"></td>
	</tr>
	<tr>
		<td>City:</td>
		<td><input type="text" name="City" size="30"></td>
	</tr>
	<tr>
		<td>Region:</td>
		<td><input type="text" name="Region" size="2"></td>
	</tr>
	<tr>
		<td>Postal Code:</td>
		<td><input type="text" name="PostalCode" size="10"></td>
	</tr>
	<tr>
		<td>Country:</td>
		<td><input type="text" name="Country" size="5"></td>
	</tr>
	<tr>
		<td>Home Phone:</td>
		<td><input type="text" name="HomePhone" size="15"></td>
	</tr>
	<tr>
		<td>Extension:</td>
		<td><input type="text" name="Extension" size="5"></td>
	</tr>
	<tr>
		<td colspan="2">Notes:</td>
	</tr>
	<tr>
		<td colspan="2">
			<textarea name="Notes" cols="50" rows="3"></textarea>
		</td>
	</tr>
	<tr>
		<td>Manager:</td>
		<td>
			<select name="ReportsTo">
				<option value="0">Choose...</option>
				<option value="1">Nancy Davolio</option>
				<option value="2">Andrew Fuller</option>
				<option value="3">Janet Leverling</option>
				<option value="4">Margaret Peacock</option>
				<option value="5">Steven Buchanan</option>
				<option value="6">Michael Suyama</option>
				<option value="7">Robert King</option>
				<option value="8">Laura Callahan</option>
				<option value="9">Anne Dodsworth</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="Password1" size="10"></td>
	</tr>
	<tr>
		<td>Repeat Password:</td>
		<td><input type="password" name="Password2" size="10"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Add Employee"></td>
	</tr>
</table>
</form>
</body>
</html>
