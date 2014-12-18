<?php
	 session_start();
	 if (!array_key_exists('EmployeeID',$_SESSION)){
        header('Location: index.php');
     }
	
?>
