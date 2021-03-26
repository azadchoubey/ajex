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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Ajex</title>
</head>

<body>
    <form id="form">
    <p id="hidden" class="text-center mt-4" style="display:none;"> </p>
        <table class="table text-center mt-4">
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" id="Name" name="Name" autocomplete="off" />
                </td>
            <tr>
                <td>Email id:</td>
                <td>
                    <input type="email" id="email" name="email" autocomplete="off"  />
                </td>
            </tr>
            <tr>
                <td> <input type="button" id="submit" value="Submit" disabled /> </td>
            </tr>
        </table>
    </form>
   

    <script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            var Name = $('#Name').val();
            var Email = $('#email').val();
            if (Name == "" || Email == "") {
                $('#hidden').fadeIn();
                $('#hidden').css("color", "red");
                $('#hidden').html('All Filed Are Required');
                setTimeout(function() {
                    $('#hidden').fadeOut()
                }, 4000)
            } else {
              const okButton = document.getElementById('submit');
                $.post(
                    "load.php",
                    $('#form').serialize(),
                    function(data) {
                        if (data == 1) {
                            $('#form').trigger("reset");
                            $('#hidden').fadeIn();
                            $('#hidden').css("color", "Green");
                            $('#hidden').html('Data Saved Successfully');
                            okButton.disabled = true;
                            setTimeout(function() {
                                $('#hidden').fadeOut();

                            }, 4000)
                        }
                        if (data == 0) {
                            $('#hidden').fadeIn();
                            $('#hidden').css("color", "red");
                            $('#hidden').html('Faild to update records');
                            setTimeout(function() {
                                $('#hidden').fadeOut();

                            }, 4000)

                        }

                    }


                );


            };
        })

    });
    </script>

    <script>
    $('#email').keyup(function() {
        var email = $('#email').val();
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        if (!email == "" && email.match(pattern)) {
            $.ajax({
                url: "checkemail.php",
                type: "POST",
                data: {
                    email: email
                }, // to send data to url page we use data
                success: function(data) {

                    if (data == 1) {
                      const okButton = document.getElementById('submit');
                      okButton.disabled = true;
                        $('#hidden').fadeIn()
                        $('#hidden').css("color", "red");
                        $('#hidden').html("Email id is already Exsit");
                       
                        setTimeout(function() {
                            $('#hidden').fadeOut()
                        }, 4000)
                    }
                    if (data == 0) {
                      const okButton = document.getElementById('submit');
                      okButton.disabled = false;
                        $('#hidden').fadeIn()
                        $('#hidden').css("color", "Green");
                        $('#hidden').html("Email id is avalible");
                        
                        setTimeout(function() {
                            $('#hidden').fadeOut()
                        }, 4000)

                    }
                   

                }
             

            })  
        } else {
       

        }



    })
    </script>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>
</body>

</html>