<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

$dlt_req=json_decode(file_get_contents("php://input"),true);

$dlt_id=$dlt_req['dlt_sid'];

$conn=mysqli_connect('localhost','root','','login') or die("Connot Connnect to Server");

$sql = "DELETE FROM `ajex` WHERE `id`='$dlt_id'";

$result = mysqli_query($conn,$sql);

if($result)
{   echo json_encode(array('Message'=> 'Data Deleted Successfully','Status'=>true));

}else{
    echo json_encode(array('Message'=> 'No Records Found','Status'=>false));
}





?>