<h1 align="center">Log in</h1>
<!--Return back to index.php after the form has has been submitted 
for processing -->
<form method="post" action="index.php">
<!--Submit a hidden input 'LoggingIn' that tells index.php that the user is attempting to log in-->
<input type="hidden" name="LoggingIn" value="true">
<table align="center">
	<?php
		//textEntry($display,$name,$entries,$errors,$size=15)
		echo textEntry('Email','Email',$dbEntries,$errors,25);
		//pwEntry($pw1,$pw2,$errors,$size=10,$repeat=true)
		echo pwEntry('Password','Password',$errors,10,false);
	?>
	<tr>
		<td colspan="2">
        	<!--This checkbox, if checked, creates a cookie in
             'Login.php'.  The newly created cookie is then checked
             in 'CookieCheck.php'-->
			<input type="checkbox" name="Remember"> Remember me
		</td>
	</tr>
	<tr>
		<td colspan="2" align="right">
			<input type="submit" value="Login">
		</td>
	</tr>
</table>
</form>
