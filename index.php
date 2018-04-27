<!DOCTYPE html>

<html>
<head>
<title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    
    <?php 
    require("header.php");
    require("config.php");
    require("bar.php");
    ?>
    
    <h1 id="content">Welcome to the <strong><?php echo $config_sitename; ?></strong> website!</h1>
    <p>We offer cloud storage for all to upload and pull their data whenver they need!</p>
	<p>Our revolutionary technology will improve your day to day tasks while keeping your data safe!</p>
    
    <?php
    require("footer.php");
    ?>

</body>
</html>