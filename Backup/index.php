<!DOCTYPE html>

<html>
<head>
<title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    
    <?php 
    
    require("config.php");
    
    ?>
    
    <div id="heading">
    <div id="header">
        <h1><?php echo $config_sitename; ?></h1>
    </div>
        <div id="headeruser">
            <p>WELCOME USER</p>
        </div>
        
            <div id="header2">
        <ul class="navbar">
            <li class="listbar"><a href="">Sort</a></li>
            <li class="listbar"><a href="">List</a></li>
        </ul>
    </div>
    </div>
    

    
        <div id="sidebar">
        <div id="bar">
        
        <h1 id="sidebar">Menu Bar</h1>

        <?php
				echo "<ul>";
				if(isset($_SESSION['SESS_LOGGEDIN'])== 1)
				{
					
					$user = $_SESSION['SESS_USERNAME'];
					
					echo "Logged in as<br/><b>".$_SESSION['SESS_USERNAME']."</b>";
					echo "<li><a href='".$config_basedir."logout.php'>Logout</a></li>";
					echo "<li><a href='".$config_basedir."myFiles.php'>My Files</a></li>";
					echo "<li><a href='".$config_basedir."chooseFile.php'>Upload File</a></li>";
					
				}
				else
				{
					echo "<li><a href='".$config_basedir."login.php'>Login</a></li>";
				}
                
				echo "</ul>";
         ?>
    </div>
    </div>
    
    <div id="absolutecontent">
        <div id="content">
    <h1 id="content">Welcome to the <strong><?php echo $config_sitename; ?></strong> website!</h1>
    <p>We offer cloud storage for all to upload and pull their data whenver they need!</p>
	<p>Our revolutionary technology will improve your day to day tasks while keeping your data safe!</p>
        </div>
    </div>


</body>
</html>