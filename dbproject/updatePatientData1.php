
<?php
include ('connection.php');
session_start();
$flag = false;
//  ****************************** Functions ******************************
function updatePatientData($id,$name,$address,$phone_no, $email,$date_of_birth, $nurse_nurse_id, $ward_ward_boy_id, $room_room_id, $pass, $conn,$previous_id){
    $sql = 'UPDATE project.patient SET patient_id ='. $id.', name = "'.$name.'", address = "'.$address.'", phone_no = "'.$phone_no.'", email = "'.$email.'", date_of_birth = "'.$date_of_birth.'", nurse_nurse_id = '.$nurse_nurse_id.',ward_ward_boy_id = '.$ward_ward_boy_id.',room_room_id = '.$room_room_id.', pass = "'.$pass.'" where patient.patient_id ='. $previous_id.';';
    $result = mysqli_query($conn, $sql);
    // $num = mysqli_num_rows($result);
    if($result)
    {
        header("Location: adminRightsPatient.php");
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
$address= $_POST["address"];
$phone_no = $_POST["phone_no"];
$email = $_POST["email"];
$date_of_birth = $_POST["date_of_birth"];
$nurse_nurse_id = $_POST["nurse_nurse_id"];
$ward_ward_boy_id = $_POST["ward_ward_boy_id"];
$room_room_id = $_POST["room_room_id"];
$pass = $_POST["pass"];
$previous_id = $_SESSION["upd_id"];
// Connection Creation
$dbconn = connection();
updatePatientData($id,$name,$address,$phone_no, $email,$date_of_birth, $nurse_nurse_id, $ward_ward_boy_id, $room_room_id, $pass, $dbconn,$previous_id);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);

?>