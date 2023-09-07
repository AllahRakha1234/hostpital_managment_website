
<?php
include ('connection.php');
session_start();
$flag = false;
//  ****************************** Functions ******************************
function updatePatientData($diag, $presc,$conn,$previous_id){
    $sql = 'UPDATE project.patient_doctor SET diagnosis = "'.$diag.'", prescription = "'.$presc.'"where patient_doctor.patient_id ='. $previous_id.';';
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        header("Location: doctorRightsPatient.php");
    }
    else
    {
        echo '<script>alert("DATA NOT FOUND")</script>';
    }
}
// Data Receiving
$diag= $_POST["Diagnosis"];
$presc = $_POST["Prescription"];
$previous_id = $_SESSION["upd_id"];
// Connection Creation
$dbconn = connection();
updatePatientData($diag, $presc, $dbconn,$previous_id);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);

?>