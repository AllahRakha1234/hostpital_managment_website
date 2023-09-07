<?php
include('connection.php');
$flag = false;
//  ****************************** Functions ******************************

function addPatientData($name,$address,$phone_no, $email,$date_of_birth, $nurse_nurse_id, $ward_ward_boy_id, $room_room_id, $pass, $conn){
    $assigenable_id = 1;
    $check = true;
    while($check)
    {
        $sql = 'Select patient.patient_id FROM project.patient where patient.patient_id ='.$assigenable_id.';';
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
        $sql = 'INSERT INTO project.patient (patient_id, name, address, phone_no, email, date_of_birth,nurse_nurse_id,ward_ward_boy_id,room_room_id, pass) VALUES ('.$id.', "'.$name.'", "'.$address.'", "'.$phone_no.'",  "'.$email.'","'.$date_of_birth.'",'.$nurse_nurse_id.','.$ward_ward_boy_id.','.$room_room_id.', "'.$pass.'");';
        mysqli_query($conn, $sql);
        header("Location: adminRightsPatient.php");
    }
}
// Data Receiving
$name = $_POST["name"];
$address= $_POST["address"];
$phone_no = $_POST["phone_no"];
$email = $_POST["email"];
$date_of_birth = $_POST["date_of_birth"];
$nurse_nurse_id = $_POST["nurse_nurse_id"];
$ward_ward_boy_id = $_POST["ward_ward_boy_id"];
$room_room_id = $_POST["room_room_id"];
$pass = $_POST["pass"];
// Connection Creation
$dbconn = connection();
addPatientData($name,$address,$phone_no, $email,$date_of_birth, $nurse_nurse_id, $ward_ward_boy_id, $room_room_id, $pass, $dbconn);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>