<!--MY SOLUTION (works fine but not database oriented)-->
<!--<h1 align="center">Log in</h1>
<?php
/*
$dbEntries = array(	'Email'=>'','Password'=>'');
*/

?>
<form method="post" action="index.php">
    <input type="hidden" name="LoggingIn" value="true">
        <table>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="Email"
                    value="<?php //echo $dbEntries['Email']?>" size="25"></td>
        </tr>
        <tr>
        	<td>Password:</td>
            <td>
            <input type="password" name="Password" value="<?php// echo $dbEntries['Password']?>" size="10">
            </td>
        </tr>
        <tr>
            <td align="right" colspan="2">
            <input type="submit" value="Log in">
            </td>
        </tr>
        </table>
    </form>
</div>-->
<!--ACTUAL SOLUTION (database oriented)-->
<h1 align="center">Log in</h1>
<!--After the form is submitted, return to 'index.php' for form 
processing-->
<form method="post" action="index.php">
<!--Create a hidden HTML form input named 'LoggingIn' so that 'index.php' can require 'Login.php' for form processing -->
<input type="hidden" name="LoggingIn" value="true">
<table align="center">
    <?php
		//BOTH FUNCTIONS found in 'fnFormPresentation.php'
		//function textEntry($display,$name,$entries,$errors,$size=15)
        echo textEntry('Email','Email',$dbEntries,$errors,25);
        //function pwEntry($pw1,$pw2,$errors,$size=10,$repeat=true)
		echo pwEntry('Password','Password',$errors,10,false);
    ?>
    <tr>
        <td colspan="2" align="right">
            <input type="submit" value="Login">
        </td>
    </tr>
</table>
</form>