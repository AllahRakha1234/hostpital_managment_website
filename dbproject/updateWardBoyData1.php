
<?php
include ('connection.php');
session_start();

$flag = false;
//  ****************************** Functions ******************************
function updateWardBoyData($id,$name,$phone_no,$email, $experience,  $pass,$conn, $previous_id){
    // $sql = 'SELECT * FROM admin';
    // $sql = 'Select * FROM doctor where doctor.doctor_id ='.$id.';';
    // $sql = 'Delete * FROM doctor where doctor_id = $id;';
    $sql = 'UPDATE project.ward_boy  SET ward_boy_id ='. $id.', name = "'.$name.'", phone_no = "'.$phone_no.'", experience = '.$experience.', email = "'.$email.'", pass = "'.$pass.'" where ward_boy.ward_boy_id ='. $previous_id.';';
    $result = mysqli_query($conn, $sql);
    // $num = mysqli_num_rows($result);
    if($result)
    {
        header("Location: adminRightsWardBoy.php");
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
// $specilaization = $_POST["specialization"];
$phone_no = $_POST["phone_no"];
$email = $_POST["email"];
$experience = $_POST["experience"];
$pass = $_POST["pass"];
// $previous_id = $_POST["id"];
// $previous_id = file_POST_contents("temp.txt");
// Connection Creation
$previous_id = $_SESSION["upd_id"];
$dbconn = connection();
updateWardBoyData($id,$name,$phone_no,$email, $experience,  $pass, $dbconn,$previous_id);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>