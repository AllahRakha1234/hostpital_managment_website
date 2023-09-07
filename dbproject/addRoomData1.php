<?php
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $database = "project";
include('connection.php');
$flag = false;
//  ****************************** Functions ******************************
function addRoomData($room_type,$fee,$conn){
    $assigenable_id = 1;
    $check = true;
    while($check)
    {
        $sql = 'Select room.room_id FROM project.room where room.room_id ='.$assigenable_id.';';
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
        $sql = 'INSERT INTO project.room (room_id, room_type, fee) VALUES ('.$id.', "'.$room_type.'",'.$fee.');';
        mysqli_query($conn, $sql);
        header("Location: adminRightsRoom.php");
    }
}
// Data Receiving
$room_type = $_POST["room_type"];
$fee = $_POST["fee"];
// Connection Creation
// $dbconn = mysqli_connect($servername, $username, $password, $database);
$dbconn = connection();
addRoomData($room_type,$fee, $dbconn);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>