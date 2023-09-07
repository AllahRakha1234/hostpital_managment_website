
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
function updateRoomData($room_id,$room_type,$fee, $dbconn,$previous_id){
    $sql = 'UPDATE project.room  SET room_id ='. $room_id.', room_type = "'.$room_type.'", fee = '.$fee.' where room.room_id ='. $previous_id.';';
    // echo $sql;
    $result = mysqli_query($dbconn, $sql);
    // $num = mysqli_num_rows($result);
    if($result)
    {
        header("Location: adminRightsRoom.php");
    }
    else
    {
        echo '<script>alert("DATA NOT FOUND")</script>';
        $flag = true;
        // header("Location: adminRightsDoctor.php");
    }
}
// Data Receiving
$room_id = $_POST["room_id"];
$room_type = $_POST["room_type"];
$fee = $_POST["fee"];
$previous_id = $_SESSION["upd_id"];
// Connection Creation
$dbconn = connection();
updateRoomData($room_id,$room_type,$fee, $dbconn,$previous_id);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>