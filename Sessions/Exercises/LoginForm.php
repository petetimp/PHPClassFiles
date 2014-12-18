<h1 align="center">Log in</h1>
<form method="post" action="index.php">
<input type="hidden" name="LoggingIn" value="true">
<table align="center">
	<?php
		echo textEntry('Email','Email',$dbEntries,$errors,25);
		echo pwEntry('Password','Password',$errors,10,false);
	?>
	<tr>
		<td colspan="2" align="right">
			<input type="submit" value="Login">
		</td>
	</tr>
</table>
</form>
