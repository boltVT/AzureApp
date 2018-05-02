<html>
<head>
	<title></title>
</head>
<body>
	
<?php
	require("config.php");
	require("db.php");
	require("header.php");
	require("bar.php");
?>
	
		<h1 style="text-align:center">All Files</h1>
	
<?php
	$filelist = glob("uploads/$user/*.*"); //grabs all files in logged in users folder
	
	echo "<table>"; //start of table to display all available files to user
	foreach ($filelist as $file) //fills array with all the available files
	{
		echo "<tr><td>".basename($file)."</td></tr>";
	}
	echo "</table>"; //end of table
	
?>
	
	<?php
	require("footer.php");
	?>
	
</body>
</html>