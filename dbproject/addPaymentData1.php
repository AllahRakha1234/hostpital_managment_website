<?php
include('connection.php');
$flag = false;
//  ****************************** Functions ******************************

function addPaymentData($patient_id,$payment_type , $amount , $dbconn){
    $assigenable_id = 1;
    $check = true;
    while($check)
    {
        $sql = 'Select payment.payment_id FROM project.payment where payment.payment_id ='.$assigenable_id.';';
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
        $sql = 'INSERT INTO project.payment (payment_id,patient_id, payment_type, amount) VALUES ('.$id.', '.$patient_id.', "'.$payment_type.'", '.$amount.');';
        mysqli_query($dbconn, $sql);
        header("Location: adminRightsPayment.php");
    }
}
// Data Receiving
// $payment_id = $_POST["payment_id"];
$patient_id = $_POST["patient_id"];
$payment_type = $_POST["payment_type"];
$amount = $_POST["amount"];
// Connection Creation
$dbconn = connection();
addPaymentData($patient_id,$payment_type , $amount , $dbconn);
// if($flag == true)
// {
//     header("Location: deleteDoctorData.php");
// }
mysqli_close($dbconn);
?>