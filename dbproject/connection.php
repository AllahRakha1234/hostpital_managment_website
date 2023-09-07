<?php
function connection(){
$servername = "localhost";
$username = "root";
$password = "root";
$database = "project";
$dbconn = mysqli_connect($servername, $username, $password, $database);
return $dbconn;
}
?>