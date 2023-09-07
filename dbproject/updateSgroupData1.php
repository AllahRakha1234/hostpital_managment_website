
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
function updateSgroupData($group_id,$name,$contact_no,$email,$pass,$dbconn,$previous_id)
{
    $sql = 'UPDATE project.support_group  SET group_id ='. $group_id.', name = "'.$name.'", 
    contact_no = "'.$contact_no.'", email = "'.$email.'", pass = "'.$pass.'" where support_group.group_id ='. $previous_id.';';
    $result = mysqli_query($dbconn, $sql);
    // $num = mysqli_num_rows($result);s    
    if($result)
    {
        header("Location: adminRightsSgroup.php");
    }
    else
    {
        echo '<script>alert("DATA NOT FOUND")</script>';
        $flag = true;
        // header("Location: adminRightsDoctor.php");
    }
}
// Data Receiving
$group_id = $_POST["group_id"];
$name = $_POST["name"];
$contact_no = $_POST["contact_no"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$previous_id = $_SESSION["upd_id"];
// Connection Creation
$dbconn = connection();
updateSgroupData($group_id,$name,$contact_no,$email,$pass,$dbconn,$previous_id);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>