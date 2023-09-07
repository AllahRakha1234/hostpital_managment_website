<?php
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $database = "project";
include('connection.php');
$flag = false;
//  ****************************** Functions ******************************
function addSgroupData($name,$contact_no,$email,$pass, $dbconn)
{
    $assigenable_id = 1;
    $check = true;
    while($check)
    {
        $sql = 'Select support_group.group_id FROM project.support_group where support_group.group_id ='.$assigenable_id.';';
        $result = mysqli_query($dbconn, $sql);
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
        $sql = 'INSERT INTO project.support_group (group_id, name, contact_no,email,pass) VALUES ('.$id.', "'.$name.'",'.$contact_no.',"'.$email.'","'.$pass.'");';
        mysqli_query($dbconn, $sql);
        header("Location: adminRightsSgroup.php");
    }
}
// Data Receiving
// $group_id = $_POST["group_id"];
$name = $_POST["name"];
$contact_no = $_POST["contact_no"];
$email = $_POST["email"];
$pass = $_POST["pass"];

// Connection Creation
// $dbconn = mysqli_connect($servername, $username, $password, $database);
$dbconn = connection();
addSgroupData($name,$contact_no,$email,$pass, $dbconn);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>