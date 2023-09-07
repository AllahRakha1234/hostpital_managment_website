<?php
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $database = "project";
include('connection.php');
$flag = false;
//  ****************************** Functions ******************************
function addDoctorData($name,$specilaization,$phone_no, $experience, $email, $pass,$conn){
    $assigenable_id = 1;
    $check = true;
    while($check)
    {
        $sql = 'Select doctor.doctor_id FROM project.doctor where doctor.doctor_id ='.$assigenable_id.';';
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1)
        {
            $assigenable_id++;
        }
        else
        {
            $check = false;
        }
    }
    if(!$check)
    {
        $id = $assigenable_id;
        $sql = 'INSERT INTO project.doctor (doctor_id, name, specialization, phone_no, experience, email, pass) VALUES ('.$id.', "'.$name.'", "'.$specilaization.'", "'.$phone_no.'", '.$experience.', "'.$email.'", "'.$pass.'");';
        mysqli_query($conn, $sql);
        header("Location: adminRightsDoctor.php");
    }
}
// Data Receiving
$name = $_POST["name"];
$specilaization = $_POST["specialization"];
$phone_no = $_POST["phone_no"];
$experience = $_POST["experience"];
$email = $_POST["email"];
$pass = $_POST["pass"];
// Connection Creation
// $dbconn = mysqli_connect($servername, $username, $password, $database);
$dbconn = connection();
addDoctorData($name,$specilaization,$phone_no, $experience, $email, $pass, $dbconn);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>