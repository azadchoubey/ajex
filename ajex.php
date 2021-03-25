<?php

if(isset($_POST['form'])){


  $email=$_POST['email'];
  $name=$_POST['name'];
  $servername='localhost';
  $username='root';
  $password='';
  $database = "login";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $database) or die("Connection failed");
  
  $sql = "INSERT INTO `ajex`(`Email`, `Name`) VALUES ('$email','$name'";
  $result=mysqli_query($conn, $sql) or die("Query Failed");
  
  if(mysqli_num_rows($result)>0){
      echo 1;
  
  }
  else{
      echo 0;
  }

}





?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Ajex</title>
  </head>
  <body>
  <p id="hidden" class="text-center mt-4" style="display:none;"> </p>
  <form id="form" name="form">
    <table class=" table text-center mt-5" Cellpadding="15" width="100%">
    <tr>
    <th> Email</th>
    <td>
   <input type="text" id="email" name="email"/>  
   </td>
  </tr>
  <tr>
    <th> Name</th>
    <td>
    <input type="text" id="name" name="name"/>
    </td>
  </tr>
  <tr>
  <td>
  <input type="button" id="submit" name="submit" value= "Submit"/>
  </td>
  </tr>
    </table>
    </form>
<script type="text/javascript">
  

    $('#email').keyup(function(){
          var email =$('#email').val();
          if(!email==""){
                $.ajax({
                url: "load.php",
                type: "POST",
                data: {email: email},  // to send data to url page we use data
                success:function(data){

                  if(data==1){
                    $('#hidden').fadeIn()
                    $('#hidden').css("color", "red");
                    $('#hidden').html("Email id is already Exsit");
                    setTimeout(function(){
                  $('#hidden').fadeOut()
                },4000)
                  }if(data==0){
                    $('#hidden').fadeIn()
                    $('#hidden').css("color", "Green");
                    $('#hidden').html("Email id is avalible");
                    setTimeout(function(){
                  $('#hidden').fadeOut()
                },4000)

                  }

                   
                }
   
            
            }) }else{

              
            }
            
            
            
            })
</script>
   <script>
     $(document).ready(function() {
     


      $('#submit').click(function(){
        var Name = $('#name').val();
        var Email = $('#email').val();
        if (Name == "" || Email == "") {
          $('#hidden').fadeIn();
            $('#hidden').css("color", "red");
            $('#hidden').html('All Filed Are Required');
            setTimeout(function(){
                  $('#hidden').fadeOut()
                },4000)
        } else {
          $.post(
              "ajex.php",
              $('#form').serialize(),
              function(data){
                if(data==1){
                  $('#form').trigger("reset");
                  $('#hidden').fadeIn();
                $('#hidden').css("color", "Green");
                $('#hidden').html('Data Saved Successfully');
                setTimeout(function(){
                  $('#hidden').fadeOut();
                },4000)
              } if(data==0){
                $('#hidden').fadeIn();
                $('#hidden').css("color", "red");
            $('#hidden').html('Faild to update records');
            setTimeout(function(){
                  $('#hidden').fadeOut();
                },4000)
              }
              }
            );
        };
      })
    });
   
   
   </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  </body>
</html>