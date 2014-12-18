<?php
/*This file includes functions for cleaning up strings for browser and
 database output.*/
/********** STRING FUNCTIONS *********/
/*
	Function Name: browserString
	Arguments: $string
	Returns:
		trimmed and escaped string for browser output
*/
function browserString($string)
{
	return nl2br(trim(htmlentities($string)));
}

/*
	Function Name: dbString
	Arguments: $string
	Returns:
		trimmed and escaped string for database entry
*/
function dbString($email)
{
	if (get_magic_quotes_gpc())
	{
		return trim ($email);
	}
	else
	{/*addslashes()-Returns a string with backslashes before characters 
	that need to be escaped. These characters are single quote ('), double 
	quote("), backslash (\) and NUL (the NULL byte).*/
		return addslashes(trim($email));
	}
}
?>
