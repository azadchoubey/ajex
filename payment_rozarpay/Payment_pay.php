<?php 
       session_start();     
            if(isset($_POST['name']) && $_POST['email']){
                    $FullName = $_POST['name'];
                    $Email = $_POST['email'];

                $con=mysqli_connect('localhost','root','','test');
                $result = mysqli_query($con,"INSERT INTO payment (id, FullName, Email, razorpay_payment_id, Payment_Status) VALUES (NULL,'$FullName','$Email',NULL,'Pending')");   
                if($result){
                    $_SESSION['id'] =mysqli_insert_id($con);
                    echo json_encode($result);
                }else{
                    echo json_encode($result);
                }    
                    mysqli_close($con);
            }elseif(isset($_POST['razorpay_payment_id']) && isset($_SESSION['id']))
            {           $payment_id = $_POST['razorpay_payment_id'];
                $con=mysqli_connect('localhost','root','','test');
                $update=mysqli_query($con, "UPDATE payment SET razorpay_payment_id = '$payment_id', Payment_Status = 'Complate' WHERE id ='". $_SESSION['id']."'");
                    if($update){
                        echo json_encode($update);
                    }else{
                        echo json_encode($update);
                    }
            }

               




?>