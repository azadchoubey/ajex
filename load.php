<?php
$name=$_POST['Name'];
$email=$_POST['email'];
$servername='localhost';
$username='root';
$password='';
$database = "ajex";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database) or die("Connection failed");

 $sql = "INSERT INTO `test` (`id`, `name`, `email`) VALUES (NULL, '$name', '$email')";


if(mysqli_query($conn, $sql)){
    echo 1;

}
else{
    echo 0;
}


?>