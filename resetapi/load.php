<?php

$name=$_POST['Name'];
$email=$_POST['email'];
$servername='localhost';
$username='root';
$password='';
$database = "login";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database) or die("Connection failed");

$sql = "INSERT INTO `ajex` (`id`, `Email`, `Name`) VALUES (NULL, '$email', '$name')";
$result = mysqli_query($conn, $sql) or  $error=mysqli_error($conn);

if($result){
    echo 1;

}
else{
    echo 0;
}


?>