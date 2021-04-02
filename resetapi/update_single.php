<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

$dlt_req=json_decode(file_get_contents("php://input"),true);

$dlt_id=$dlt_req['pull_sid'];
$dlt_name=$dlt_req['Email'];
$dlt_email=$dlt_req['name'];
$conn=mysqli_connect('localhost','root','','ajex') or die("Connot Connnect to Server");

$sql = "UPDATE `test` SET `Name` = '$dlt_name' AND 'Email' = '$dlt_email' WHERE `test`.`id` = '$dlt_id'";

$result = mysqli_query($conn,$sql);

if($result)
{   echo json_encode(array('Message'=> 'Data Deleted Successfully','Status'=>true));

}else{
    echo json_encode(array('Message'=> 'No Records Found','Status'=>false));
}





?>