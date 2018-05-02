<html>
<head>
	<title></title>
</head>
<body>
	
	<h1>All Files</h1>
	
<?php
	$filelist = glob("uploads/$userFiles/*.*"); //grabs all files in logged in users folder
	
	echo "<table>"; //start of table to display all available files to user
	foreach ($filelist as $file) //fills array with all the available files
	{
		echo "<tr><td>".basename($file)."</td></tr>";
	}
	echo "</table>"; //end of table
	
?>
	
</body>
</html>