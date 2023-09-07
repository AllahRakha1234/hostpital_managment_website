<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "project";
// Data Receiving
$patient_id = $_GET["delete_id_no"];
$flag = false;
//  ****************************** Functions ******************************
function deletePatientData($id,$conn){
    // $sql = 'SELECT * FROM admin';
    $sql = 'Select * FROM patient where patient.patient_id ='.$id.';';
    // $sql = 'Delete * FROM doctor where doctor_id = $id;';
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1)
    {
        $sql = 'DELETE FROM patient where patient.patient_id ='. $id.';';
        $result = mysqli_query($conn, $sql);
        header("Location: adminRightsPatient.php");
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
deletePatientData($patient_id, $dbconn);
if($flag == true)
{
    header("Location: deletePatientData.php");
}
mysqli_close($dbconn);
?>