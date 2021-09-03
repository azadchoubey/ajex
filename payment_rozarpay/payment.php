<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="mb-3">

                    <input type="text" id="Fillname" class="form-control mt-3" placeholder="Enter Your Name" Required />
                    <input type="text" id="email" class="form-control mt-3" placeholder="Enter Your Email id" Required
                        pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" />
                    <button id="rzp" class="btn btn-primary mt-3">Pay Now</button>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    <script>
                    $('#rzp').click(function() {
                        var name = $('#Fillname').val();
                        var email = $('#email').val();

                        $.ajax({
                            url: "Payment_pay.php",
                            type: 'POST',
                            data: {
                                name: name,
                                email: email
                            },
                            dataType: 'json',
                            success: function(data) {

                                if (data == true) {

                                    var options = {
                                        "key": "rzp_test_bvBOAPVUf18im2", // Enter the Key ID generated from the Dashboard
                                        "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                        "currency": "INR",
                                        "name": "Azad Corp",
                                        "description": "Test Transaction",
                                        "image": "https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png",
                                        "handler": function(response) {
                                            if (response.razorpay_payment_id) {
                                                $.ajax({
                                                    url: "Payment_pay.php",
                                                    type: 'POST',
                                                    data: {
                                                        razorpay_payment_id: response
                                                            .razorpay_payment_id
                                                    },
                                                    dataType: 'json',
                                                    success: function(data) {
                                                        alert(data);
                                                        if (data == true) {
                                                            window.location
                                                                .href =
                                                                "success.php";
                                                        } else {
                                                            window.location
                                                                .href =
                                                                "payment.php";
                                                        }
                                                    }

                                                })

                                            } else {
                                                alert(response);
                                            }
                                        }
                                    };
                                    var rzp1 = new Razorpay(options);
                                    rzp1.open();

                                } else {
                                    alert(response);
                                }
                            }
                        })
                    })
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>