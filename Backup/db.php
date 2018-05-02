<!DOCTYPE html>

<html>
<head>
<title></title>
</head>
<body>
    
    <?php 
    
    require_once("config.php");
    
    //$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase); //old connection string
    
    $conn = mysqli_init();
    $db = mysqli_real_connect($conn, $dbhost, $dbuser, $dbpassword, $dbdatabase, 3306); //connection string for Azure...SSL is turned off in Azure
    mysqli_select_db($db, $dbdatabase);
    ?>

</body>
</html>