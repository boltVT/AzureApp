<?php



// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
/*
$db = mysqli_connect('localhost', 'finaltest', 'kekek', 'forum_database');
*/

// OLD CONFIG FILE
    $dbhost = "boltdatabase.mysql.database.azure.com"; //Azure database URL
    $dbuser = "izzy@boltdatabase"; //username for database 
    $dbpassword = "Mememachine69"; //password for database
    $dbdatabase = "bolt";
    
    $config_basedir = "http://boltwebapp.azurewebsites.net/"; //main index page of our website
    
    $config_sitename = "Bolt";
    
    

// LOGIN USER
if (isset($_POST['btnSubmit'])) {
  $username = mysqli_real_escape_string($db, $_POST['txtUsername']);
  $password = mysqli_real_escape_string($db, $_POST['txtPassword']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


?>