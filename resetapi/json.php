<?php
header('Content-Type: application/json');
header('Access_Control-Allow-Origin: *');

$conn=mysqli_connect('localhost','root','','login') or die("Cannot be connect");

$sql="SELECT * FROM ajex";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output,JSON_PRETTY_PRINT);
}
else{
    echo json_encode(array("Message" => 'No Records Found', "Status"=> false));  
}

?>