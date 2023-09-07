<?php
include('connection.php');
$flag = false;
//  ****************************** Functions ******************************
function addNurseData($name,$specilaization,$phone_no, $experience, $email, $pass,$conn){
    $assigenable_id = 1;
    $check = true;
    while($check)
    {
        $sql = 'Select nurse.nurse_id FROM project.nurse where nurse.nurse_id ='.$assigenable_id.';';
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
        $sql = 'INSERT INTO project.nurse (nurse_id, name, specialization, phone_no, experience, email, pass) VALUES ('.$id.', "'.$name.'", "'.$specilaization.'", "'.$phone_no.'", '.$experience.', "'.$email.'", "'.$pass.'");';
        mysqli_query($conn, $sql);
        header("Location: adminRightsNurse.php");
    }
}
// Data Receiving
$name = $_POST["name"];
$specilaization = $_POST["specialization"];
$phone_no = $_POST["phone_no"];
$email = $_POST["email"];
$experience = $_POST["experience"];
$pass = $_POST["pass"];
// Connection Creation
$dbconn = connection();
addNurseData($name,$specilaization,$phone_no, $experience, $email, $pass, $dbconn);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>