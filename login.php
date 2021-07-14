<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Api</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/login.css">
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <span class="msg"></span>
                <?php
echo 'Username'. form_input(['name' => 'Username','class'=>'form-control','id'=>'Username']); 
echo 'Password'. form_input(['name' => 'Password    ','class'=>'form-control','id'=>'Password']); 
echo form_submit(['class'=>'btn btn-success mt-3','value'=>"Submit",'id'=>'Submit','name' =>'Submit'])
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

                $('#Username').css({
                    "border": "3px solid red"
                });
                $('#Password').css({
                    "border": "3px solid red"
                });
                $('.msg').html('All Fields Are Requied<br>');
            } else {

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('index.php/public/restapi/getlogin'); ?>',
                    data: {
                        username: username,
                        password: password
                    },
                    dataType: "json",
                    success: function(data) {
                     
                        console.log(data);

                        if ('success'== true ) {
                            sessionStorage.setItem(userid, 'Value');
                            window.location.href =
                                "<?php echo base_url('index.php/public/restapi/getlogin/afterlogin'); ?>";
                        } else
                        $('.msg').html('Username or Password is incorrect<br>');


                    }

                });

            }


        })

    })
    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>