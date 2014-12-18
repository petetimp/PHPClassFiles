<?php
	//Log the user out.
	session_start();
	session_unset();
	session_destroy();
	setcookie('eid','',time()-1);
	//This line will redirect the user to index.php.
	header('Location: index.php');
?>
