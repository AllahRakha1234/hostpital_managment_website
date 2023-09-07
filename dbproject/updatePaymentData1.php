
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
function updatePaymentData($payment_id,$patient_id,$payment_type,$amount, $dbconn,$previous_id){
    $sql = 'UPDATE project.payment  SET payment_id ='. $payment_id.', patient_id = '.$patient_id.', 
    payment_type = "'.$payment_type.'", amount = '.$amount.' where payment.payment_id ='. $previous_id.';';
    echo $payment_type;
    $result = mysqli_query($dbconn, $sql);
    // $num = mysqli_num_rows($result);
    if($result)
    {
        header("Location: adminRightsPayment.php");
    }
    else
    {
        echo '<script>alert("DATA NOT FOUND")</script>';
        $flag = true;
        // header("Location: adminRightsDoctor.php");
    }
}
// Data Receiving
$payment_id = $_POST["payment_id"];
$patient_id = $_POST["patient_id"];
$payment_type = $_POST["payment_type"];
echo($payment_type);
$amount = $_POST["amount"];
$previous_id = $_SESSION["upd_id"];
// Connection Creation
$dbconn = connection();
updatePaymentData($payment_id,$patient_id,$payment_type,$amount,$dbconn,$previous_id);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>