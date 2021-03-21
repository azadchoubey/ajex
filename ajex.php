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
    <table class="table text-center mt-4">
        <tr>
            <td>Name:</td>
            <td>
                <input type="text" id="Name" name="Name" />
            </td>
        <tr>
            <td>Email id:</td>
            <td>
                <input type="text" id="email" name="email" />
            </td>
        </tr>
        <tr>
            <td> <input type="button" id="submit" value="Submit" /> </td>
        </tr>
    </table>
</form>
    <p id="hidden" style="display:none;"> </p>

    <script type="text/javascript">
    $(document).ready(function() {
      $('#submit').click(function(){
        var Name = $('#Name').val();
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
              "load.php",
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