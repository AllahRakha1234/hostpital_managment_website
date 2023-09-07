<?php
include('connection.php');
$flag = false;
//  ****************************** Functions ******************************
function addWardBoyData($name,$phone_no, $email, $experience, $pass,$conn){
    $assigenable_id = 1;
    $check = true;
    while($check)
    {
        $sql = 'Select ward_boy.ward_boy_id FROM project.ward_boy where ward_boy.ward_boy_id ='.$assigenable_id.';';
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
        $sql = 'INSERT INTO project.ward_boy (ward_boy_id, name, phone_no, email, experience,  pass) VALUES ('.$id.', "'.$name.'", "'.$phone_no.'","'.$email.'", '.$experience.',  "'.$pass.'");';
        mysqli_query($conn, $sql);
        header("Location: adminRightsWardBoy.php");
    }
}
// Data Receiving
$name = $_POST["name"];
$phone_no = $_POST["phone_no"];
$email = $_POST["email"];
$experience = $_POST["experience"];
$pass = $_POST["pass"];
// Connection Creation
$dbconn = connection();
addWardBoyData($name,$phone_no,$email, $experience,  $pass, $dbconn);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>