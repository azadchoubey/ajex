<?php
$email=$_POST['emailid'];
include 'db_confiq.php';  
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database) or die("Connection failed");

$sql = "SELECT * FROM `user_login` WHERE `Username`='$email'";
$result=mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
    echo "Email id is already exist";

}
else{
    echo"Email Avalible";
}


?>