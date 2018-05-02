<?php 
    
    @session_start();
    if(isset($_SESSION['SESS_CHANGEID'])== TRUE)
    {
        session_unset();
        session_regenerate_id();
    }
    require("server.php");
    
    $db = mysqli_connect($dbhost, $dbuser, $dbpassword);
    mysqli_select_db($db,$dbdatabase);
?>

<!DOCTYPE html>

<html>
<head>
<title><?php echo $config_sitename; ?></title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    
    <div id="heading">
    <div id="header">
        <h1><?php echo $config_sitename; ?></h1>
    </div>
    </div>

</body>
</html>