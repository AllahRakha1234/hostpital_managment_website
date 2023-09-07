<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "project";
// Data Receiving
$ward_boy_id = $_GET["delete_id_no"];
$flag = false;
//  ****************************** Functions ******************************
function deleteWardBoyData($id,$conn){
    // $sql = 'SELECT * FROM admin';
    $sql = 'Select * FROM ward_boy where ward_boy.ward_boy_id ='.$id.';';
    // $sql = 'Delete * FROM doctor where doctor_id = $id;';
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1)
    {
        $sql = 'DELETE FROM ward_boy where ward_boy.ward_boy_id ='. $id.';';
        $result = mysqli_query($conn, $sql);
        header("Location: adminRightsWardBoy.php");
    }
    else
    {
        echo '<script>alert("DATA NOT FOUND")</script>';
        $flag = true;
        // header("Location: adminRightsDoctor.php");
    }
}
// Connection Creation
$dbconn = mysqli_connect($servername, $username, $password, $database);
deleteWardBoyData($ward_boy_id, $dbconn);
if($flag == true)
{
    header("Location: deleteDoctorData.php");
}
mysqli_close($dbconn);
?>