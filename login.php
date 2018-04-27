<?php

@session_start();
require("db.php");

if(isset($_SESSION['SESS_LOGGEDIN'])== TRUE)
{
    header("Location: ".$config_basedir);
}
if(@$_POST['btnSubmit'])
{
    $loginsql = "select * from login where username = '".$_POST['txtUsername']."' AND password='".$_POST['txtPassword']."'";

    $loginres = mysqli_query($db,$loginsql);
    $numrows = mysqli_num_rows($loginres);

    if($numrows == 1)
    {
		$ERROR = 0; //no errors
        $loginrow = mysqli_fetch_assoc($loginres);

        $_SESSION['SESS_LOGGEDIN'] = 1;
        $_SESSION['SESS_USERNAME'] = $loginrow['username'];
        $_SESSION['SESS_USERID'] = $loginrow['id'];

        header("Location: ".$config_basedir);
    }
	else
	{
		$ERROR = 1;
	}
}
else
{
	$ERROR = 0;
}
?>

<html>
<head>
<title>Login</title>
</head>
<body>
    <?php
    require("bar.php");
	require("header.php"); //header page included
    ?>
    
    <h1 id="content">Customer Login</h1>
    Please enter your username and password to log into the website. If you do not have an account, you can sign up for free by <a href="register.php">registering</a>.
    <p>
        <?php
        
        if($ERROR == 1)
        {
            echo "<strong>Incorrect username/password</strong>";
        }
        ?>
    </p>
    
    <form action="login.php" method="post">
    
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="txtUsername"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="txtPassword"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnSubmit" value="Login"></td>
            </tr>
        </table>
    </form>
    
    <?php // footer page included
    
    require("footer.php");
    ?>

</body>
</html>