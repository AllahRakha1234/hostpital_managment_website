<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "project";
//  ****************************** Functions ******************************
function chkadminValidiation($email, $password, $conn){
    // $sql = "SELECT *  FROM admin" ;
    $sql = 'SELECT * FROM admin where email = "'. $email.'" AND pass = "'.$password.'";';
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1)
    {
        header("Location: adminRights.php");
        // echo ("Login Successful");
    }
    else
    {
        echo '<script text = "Error">alert("Cannot Login")</script>';
        // echo "Login Fail";
    }
}
// Connection Creation
$dbconn = mysqli_connect($servername, $username, $password, $database);
// if(!$dbconn)
// {
//     die("Connection failed: " . mysqli_connect_error());
// }
// else
// {
//     echo "Connection successful";
// }   
// Data Receiving
$adm_email = $_GET["adm-email"];
$adm_password = $_GET["adm-password"];

chkadminValidiation($adm_email, $adm_password, $dbconn);
mysqli_close($dbconn);
?>