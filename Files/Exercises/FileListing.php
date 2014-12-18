<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>File Listing</title>
</head>
<body>
<?php
/*In this exercise, you will create a simple resume management page that will list all the resumes currently in the resumes folder and allow you to remove resumes from the folder.

Open Files/Exercises/FileListing.php in your editor. Much of the file is done already.
Complete the fileDetails() function so that it will properly display the details of the passed file.
At the end of the if block of the fileDetails() function there is a "Delete File" link. Modify this link so that it passes the file path in the "Delete" variable via the query string.
Write the browseDir() function.
Write the deleteFile() function.*/
	browseDir('Resumes');
	if (array_key_exists('File',$_GET))
	{
		fileDetails($_GET['File']);
	}
		
	if (array_key_exists('Delete',$_GET))
	{
		if(deleteFile($_GET['Delete']))
		{
			echo 'File Deleted';
		}
		else
		{
			echo 'Could not delete file';
		}
	}

	function fileDetails($filePath)
	{
		if (is_file($filePath))
		{
			$baseName=basename($filePath);
			echo "<h1>Details of file: $baseName</h1> 			
				<h2>File data</h2>
				File last accessed: " . 
					date('j F Y H:i') . '<br>
				File last modified: ' . 
					date('j F Y H:i') . '<br>
				File type: ' . 
					filetype($filePath) . '<br>
				File size: ' .
					filesize($filePath) . ' bytes<br>';
			 echo "<a href='FileListing.php?Delete=$filePath'>Delete File</a>";
		}
		else
		{
			echo "$file_path is not a file.";
		}
	}
	
	function browseDir($directory)
	{
	$dir = opendir($directory);
	
	echo "<h2>$directory</h2><br>";
	echo 'Directory Listing:<br><hr><br>';
	while ($file = readdir($dir))
	{
		if(is_file($directory.'/'.$file)){
			echo "<a href='filelisting.php?File=$directory/$file'>
			$file</a><br>";
		}
    }
	echo '<hr><br>';
	
	closedir($dir);
		
	}
	
	function deleteFile($filePath)
	{
		 if (!is_file($filePath) || !@unlink($filePath))
        {
            return false;
        }
        else
        {
            return true;
        }

	}

?>
</body>
</html>
