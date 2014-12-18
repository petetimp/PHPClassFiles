<?php
	//if $_COOKIE['eid'] is set (originally set in 'Login.php'), 
	//whenever someone vists the web page, they will be automatically 
	//logged in if they are on the same computer that they chose to be 
	//remembered on
    if ( isset($_COOKIE['eid']) )
    {
        @$db = new mysqli('localhost','root','pwdpwd','Northwind');
        if (mysqli_connect_errno())
        {
                echo 'Cannot connect to database: ' . mysqli_connect_error();
        }
               else
        {
            $query='SELECT FirstName,LastName,EmployeeID
                    FROM Employees
                    WHERE EmployeeID=' . $_COOKIE['eid'];
             
            $result = $db->query($query);
            if ( $row=$result->fetch_assoc() )
            {
                $_SESSION['FirstName']=$row['FirstName'];
                $_SESSION['LastName']=$row['LastName'];
                $_SESSION['EmployeeID']=$row['EmployeeID'];
            }
        }
    }
?>
