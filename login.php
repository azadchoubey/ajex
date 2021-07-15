<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Api</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/login.css">
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <span id='msg' class='mt-4'></span>
                <?php
echo 'Username'. form_input(['name' => 'Username','class'=>'form-control','id'=>'Username']); 
echo 'Password'. form_password(['name' => 'Password    ','class'=>'form-control','id'=>'Password']); 
echo form_submit(['class'=>'btn btn-outline-success btn-lg mt-3','value'=>"Login",'id'=>'Submit'])
    ?>
            </div>
        </div>
    </div>







    <script>
    $(document).ready(function() {
        $('#Submit').click(function() {
            var username = $('#Username').val();
            var password = $('#Password').val();

            if (username == " " || password == "") {
                $('#msg').show()
                $('#Username').css({
                    'border': '1px solid red'
                });
                setTimeout(function() {
                    $('#Username').css({
                        'border': '1px solid black'
                    })
                }, 3000)
                $('#Password').css({
                    'border': '1px solid red'
                });
                setTimeout(function() {
                    $('#Password').css({
                        'border': '1px solid black'
                    })
                }, 3000)
                $('#msg').html('All Fileds are Required<br>');
                setTimeout(function() {
                    $('#msg').hide()
                }, 3000)
            } else {
                $.ajax({
                    url: '<?php echo base_url('index.php/public1/resetapi'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(response) {
                        if (response == false) {
                            $('#msg').show()
                            $('#Username').css({
                                'border': '1px solid red'
                            }) ;setTimeout(function() {
                    $('#Username').css({
                        'border': '1px solid black'
                    })
                }, 3000)
                            $('#Password').css({
                                'border': '1px solid red'
                            }); setTimeout(function() {
                    $('#Password').css({
                        'border': '1px solid black'
                    })
                }, 3000)
                $('#msg').html('Username or Password is invaild<br>');
                setTimeout(function() {
                    $('#msg').hide()
                }, 3000)
                        } else {
                            window.location.href =
                                '<?php echo base_url('index.php/public1/resetapi/after_login');?>'
                        }
                    }



                })
            }


        })

    })
    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>

</body>

</html>