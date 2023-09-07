<?php
include('connection.php');
session_start();
$flag = false;
//  ****************************** Functions ******************************
function updateCallData($sol, $call_id, $email, $dbconn)
{
    $sql_sg_id = 'Select * from project.support_group where support_group.email = "' . $email . '";';
    $result_id = mysqli_query($dbconn, $sql_sg_id);
    $row_sg = mysqli_fetch_assoc($result_id);
    $sg_id = $row_sg['group_id'];
    $sql_insert = 'INSERT INTO project.call_support_group (call_id,support_group_group_id,solution) VALUES (' . $call_id . ', '.$sg_id .',"' . $sol. '");';
    echo ($sql_insert);
    mysqli_query($dbconn, $sql_insert);
    $sql_un_call = 'UPDATE project.unattended_call SET status = 1 where unattended_call.call_id = ' . $call_id . ';';
    mysqli_query($dbconn, $sql_un_call);
    header("Location: sgUnAttendedCalls.php");
}
// Data Receiving
$sol = $_POST["solution"];
$call_id_id = $_SESSION["call_id"];
$email = $_SESSION['email_as_id'];
// Connection Creation
$dbconn = connection();
updateCallData($sol, $call_id_id, $email, $dbconn);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);

?>