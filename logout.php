<?php
    session_start();
    require_once("config.php");
    unset($_SESSION['SESS_LOGGEDIN']) ;
    unset($_SESSION['SESS_USERNAME']) ;
    unset($_SESSION['SESS_USERID']);
    header("Location: " . $config_basedir);
    ?>

<!DOCTYPE html>

<html>
<head>
<title></title>
</head>
<body>
    
    

</body>
</html>