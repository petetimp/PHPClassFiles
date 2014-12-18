<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Color Table</title>
    </head>
    
    <body>
        <h1>Color Table</h1>
        <?php
            //Create an associative array that holds color hex codes
            //indexed by their color names, which can be found at
            //http://www.w3schools.com/html/html_colornames.asp.
            $colors=array("blue"=>"#0000FF","red"=>"#FF0000","purple"=>"#800080","green"=>"#008000","silver"=>"#C0C0C0");
        ?>
        
        <table border="1">
        <tr>
            <th>Color Name</th>
            <th>Hex Code</th>
        </tr>
        <?php
            //Loop through the array outputting a table row with
            //two columns for each element in the array
            foreach ($colors as $key => $color){
        ?>
                <tr style="background-color:<?php echo $color ?>">
                    <td><?php echo $key ?></td>
                    <td><?php echo $color ?><br/></td>
                </tr>
        <?php
            }
        ?>
        <!--Alternate Syntax-->
        <!--<tr>
            <th>Color Name</th>
            <th>Hex Code</th>
        </tr>	
        <?php
            foreach ($colors as $key => $color)
            {
                echo "	<tr style='background-color:$key'>
                            <td>$key</td>
                            <td>$color</td>
                        </tr>";
            }
        ?>-->
        </table>
    </body>
</html>
