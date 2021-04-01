<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

$pull_req=json_decode(file_get_contents("php://input"),true);

$pull_id=$pull_req['pull_sid'];

$conn=mysqli_connect('localhost','root','','ajex') or die("Connot Connnect to Server");

$sql = "SELECT * FROM test WHERE id ={$pull_id}";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{   $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output,JSON_PRETTY_PRINT);

}else{
    echo json_encode(array('Message'=> 'No Records Found','Status'=>'false'));
}





?>