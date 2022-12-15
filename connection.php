
<?php
/*
mysql_connect('localhost','root','root');
mysql_select_db('GLV');
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GLV";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>

