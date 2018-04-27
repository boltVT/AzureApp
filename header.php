<?php 
    
    @session_start();
    if(isset($_SESSION['SESS_CHANGEID'])== TRUE)
    {
        session_unset();
        session_regenerate_id();
    }
    require_once("config.php");
    
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
    
    <div id="header">
        <h1><?php echo $config_sitename; ?></h1>
    </div>
    <div id="menubar">
        <a href="<?php echo $config_basedir; ?>">Home</a>
        <a href="<?php echo $config_basedir; ?>showcart.php">View Basket/Checkout</a>
    </div>


</body>
</html>