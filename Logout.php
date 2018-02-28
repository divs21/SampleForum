<?php session_start();
session_unset();
unset($_SESSION); 
unset($_POST); 
session_destroy();
$_SESSION = array();

echo "Continue to  <a href = 'index.php' >Login</a>";

echo "<br/> Will Redirect to Home page in few seconds!";
header("Refresh: 5; url=http://localhost:8080/Forum/index.php"); //will redirect after 5 seconds
?>