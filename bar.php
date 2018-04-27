<!DOCTYPE html>

<html>
<head>
<title></title>
</head>
<body>
    
    <div id="bar">
        
        <h1 id="sidebar">Menu Bar</h1>
		
		    <?php /* !!!!old login link... NOT USED!!!!
            echo "<hr/>";
            
            if(isset($_SESSION['SESS_LOGGEDIN'])== TRUE)
            {
                echo "Logged in as <strong>".$_SESSION['SESS_USERNAME']."</strong>[<a href='".$config_basedir."logout.php'>logout</a>]";
            }
            else
            {
                echo "<a href='".$config_basedir."login.php'>Login</a>";
            }*/
            ?>

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

</body>
</html>