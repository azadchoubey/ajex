<?php



$email=$_POST['email'];
$servername='localhost';
$username='root';
$password='';
$database = "ajex";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database) or die("Connection failed");

$sql = "SELECT * FROM `test` WHERE `Email`='$email'";
$result=mysqli_query($conn, $sql) or die("Query Failed");

if(mysqli_num_rows($result)>0){
    echo 1;

}
else{
    echo 0;
}

?>