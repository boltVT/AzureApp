<!DOCTYPE html>

<html>
<head>
<title></title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    
    <div id="footer">
        <div>
            <?php 

            echo "<p><i>All content on this site is &copy; ".$config_sitename."</i></p>";

            if(isset($_SESSION['SESS_ADMINLOGGEDIN']) == True)
            {
                echo "[<a href='".$config_basedir."adminorders.php'>admin</a>][<a href='".$config_basedir."adminlogout.php'>admin logout</a>";
            }
            ?>
    </div>
</div>

</body>
</html>