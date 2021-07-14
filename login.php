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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php
echo 'Username'. form_input(['name' => 'Username','class'=>'form-control','id'=>'Username']); 
echo 'Password'. form_input(['name' => 'Password    ','class'=>'form-control','id'=>'Password']); 
echo form_submit(['class'=>'btn btn-success mt-3','value'=>"Submit",'id'=>'Submit'])
    ?>
            </div>
        </div>
    </div>







    <script>
    $(document).ready(function() {
        $('#Submit').click(function() {
            var username = $('#Username').val();
            var pssword = $('#Password').val();

            if (username == " " || pssword == "") {
              
                    $('#Username').css({'border:3px solid red'} )
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