<!DOCTYPE html>

<html>
<head>
<title></title>
</head>
<body>
    
    <?php 
    
    require_once("config.php");
    
    $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
    mysqli_select_db($db, $dbdatabase);
    ?>

</body>
</html>