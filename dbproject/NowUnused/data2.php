<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "project";
//  ****************************** Functions ******************************
function chkadminValidiation($email, $password, $conn){
    // $sql = "SELECT * FROM project.doctor" ;
    $sql = 'SELECT * FROM project.doctor where doctor.email = "'.$email.'" AND doctor.pass = "'.$password.'";';
    // echo($sql);
    // $sql = "SELECT *  FROM doctor  where email = $email and pass = $password";
    // $sql = "SELECT *  FROM admin where admin.email = 'abc@def.com' and admin.pass = 'password';";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    // echo ($num);
    // var_dump ($result);
    while($row = mysqli_fetch_assoc($result))
    {
        if($num > 0)
        {
            // return true;
            // echo "Login Successful";
        header("Location: doctorRights.php");
        }
        else
        {
            echo '<script text = "Error">alert("Cannot Login")</script>';
            // echo "Login Fail";
        }
        
        // var_dump($row)."<br>";
        // if($row["email"] == $email && $row["pass"] == $password)
        // {
        //     return true;
        // }
    }
    return false;

}

// Connection Creation
$dbconn = mysqli_connect($servername, $username, $password, $database);
if(!$dbconn)
{
    die("Connection failed: " . mysqli_connect_error());
}
else
{
    echo "Connection successful";
}   
// Data Receiving


$doc_email = $_GET["doctor-email"];
$doc_password = $_GET["doctor-password"];

chkadminValidiation($doc_email, $doc_password, $dbconn);
// if(chkadminValidiation($nurse_email, $nurse_password, $dbconn))
// {
//     echo "Login Successful";
// }
// else
// {
//     echo "Login Failed";
// }
mysqli_close($dbconn);
?>