<?php
/* Database credentials. (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'login_register');
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect('localhost', 'root', '', 'login_register');

// Check connection
if (!$conn) {
    echo("Connection failed: " . mysqli_connect_error());
}

?>




