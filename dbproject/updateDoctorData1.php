
<?php
include ('connection.php');
// include 'temp.php';
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $database = "project";
session_start();

$flag = false;
//  ****************************** Functions ******************************
function updateDoctorData($id,$name,$specilaization,$phone_no, $experience, $email, $pass,$conn, $previous_id){
    // $sql = 'SELECT * FROM admin';
    // $sql = 'Select * FROM doctor where doctor.doctor_id ='.$id.';';
    // $sql = 'Delete * FROM doctor where doctor_id = $id;';
    $sql = 'UPDATE project.doctor  SET doctor_id ='. $id.', name = "'.$name.'", specialization = "'.$specilaization.'", phone_no = "'.$phone_no.'", experience = '.$experience.', email = "'.$email.'", pass = "'.$pass.'" where doctor.doctor_id ='. $previous_id.';';
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    // $num = mysqli_num_rows($result);
    if($result)
    {
        header("Location: adminRightsDoctor.php");
    }
    else
    {
        echo '<script>alert("DATA NOT FOUND")</script>';
        $flag = true;
        // header("Location: adminRightsDoctor.php");
    }
}
// Data Receiving
$id = $_POST["id"];
$name = $_POST["name"];
$specilaization = $_POST["specialization"];
$phone_no = $_POST["phone_no"];
$experience = $_POST["experience"];
$email = $_POST["email"];
$pass = $_POST["pass"];
// $previous_id = $_GET["id"];
// $previous_id = file_get_contents("temp.txt");
$previous_id = $_SESSION["upd_id"];
// echo ($previous_id);
// $previous_id = $global_variable;
// Connection Creation
$dbconn = connection();
updateDoctorData($id,$name,$specilaization,$phone_no, $experience, $email, $pass, $dbconn,$previous_id);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>