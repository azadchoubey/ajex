<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Index</title>
</head>
<body>
<div class='bg-secondary.bg-gradient'>
<form id="form " class="text-center mt-4 ">
<p id="hidden" class="text-center mt-4" style="display:none;"> </p>
    <label>Name</label>
    <input type="text"  id="addname" name="Name"/>
    <label>Email</label>
    <input type="email "  id="addemail"  name="email" />
    <input type="button" id="submit" class='btn btn-warning' value="Submit" disabled />
</form>
</div>
    <table class="table w-75 text-center ml-auto mr-auto mt-4 ">
        <thead class="table-primary ">
            <th>S.no</th>
            <th>Name</th>
            <th>Email id</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody id="show">
        </tbody>
    </table>
    <!-- Edit button Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" /><br>
                    <label>Email</label>
                    <input type="text" class="form-control" id="Email" />
                </div>
                <div class="modal-footer">
                    <button type="button" id="edtbtn" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal Delete-->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do You Want To Delete This Entry ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="dltconf" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
    $(document).ready(function() {
        function loading() {
            $.ajax({
                url: "http://localhost/resetapi/fetch_all.php/",
                type: "GET",
                success: function(data) {
                    if (data.Status == false) {
                        $('#show').append("<tr><td colspan='6'> <h2>" + data.Message +
                            "</h2></td></tr>")
                    } else {
                        $.each(data, function(key, value) {
                            
                               
                            $('#show').append("<tr>" +
                                "<td>" +( ++key )+ " </td>" +
                                "<td>" + value.Name + " </td>" +
                                "<td>" + value.Email + " </td>" +
                                "<td> <button class='btn btn-success' id='myBtn' data-id='" +
                                value.id + "'> Edit</button> </td>" +
                                "<td> <button class='btn btn-danger' id='dltbtn' data-id='" +
                                value.id + "'> Delete</button> </td>" +
                                "</tr>")
                        })
                    }
                }
            })
        }
        loading();
        $(document).on("click", "#dltbtn", function() {
          var dataid = $(this).data("id");
            var obj = {
                dlt_sid: dataid
            };
            var json = JSON.stringify(obj);
            $(document).on("click", "#dltconf", function() {
              $("#myModal1").modal('hide');
            $.ajax({
                url: "http://localhost/resetapi/del_single.php/",
                type: "POST",
                data: json,
                success: function(data) {
                
                   if(data.Status==true){
                   
                    $('#hidden').fadeIn();
                            $('#hidden').css("color", "Green");
                            $('#hidden').html(data.Message);
                            setTimeout(function() {
                            $('#hidden').fadeOut()
                        }, 3000)
                            $('#dltbtn').parents("tr").animate({ backgroundColor: "#002" }, "fast")
                               .animate({ opacity: "hide" }, "fast");
                   }
                   if(data.Status==false){
                    $('#hidden').fadeIn();
                            $('#hidden').css("color", "Green");
                            $('#hidden').html(data.Message);
                   }
                }      
            })    
          })   
        })  
        $(document).on("click", "#myBtn", function() {
            $("#myModal").modal();
            var dataid = $(this).data("id");
            var obj = {
                pull_sid: dataid
            };
            var json = JSON.stringify(obj);
            $.ajax({
                url: "http://localhost/resetapi/fetch_single.php/",
                type: "POST",
                data: json,
                success: function(data) {
                    $('#name').val(data[0].Name)
                    $('#Email').val(data[0].Email)
                }
            })
            $(document).on("click", "#edtbtn", function() {
    
    var Email = $('#name').val();
    var Name = $('#Email').val();

    var obj1 = {
                  pull_sid: dataid,
                  name: Email,
                  email: Name
              };

              console.log(obj1);
              var json = JSON.stringify(obj1);
              $.ajax({
                  url: "http://localhost/resetapi/update_single.php/",
                  type: "POST",
                  data: json,
                  success: function(data) {
                    $('#myModal').modal('hide');
                      if(data.Status==true){
                         
                          $('#hidden').fadeIn();
                              $('#hidden').css("color", "Green");
                              $('#hidden').html(data.Message);
                              setTimeout(function() {
                              $('#hidden').fadeOut()
                          }, 3000)
  
                      }if(data.Status== false){
                          $('#hidden').fadeIn();
                              $('#hidden').css("color", "Green");
                              $('#hidden').html(data.Message);
                              setTimeout(function() {
                              $('#hidden').fadeOut()
                          }, 3000)
  
                      }
                  }
              })
  
  
          })

        })
        $(document).on("click", "#dltbtn", function() {
            $("#myModal1").modal();
        })
     
    });

  

    </script>
    <script type="text/javascript" >
    $('#addemail').keyup(function() {
        var email = $('#addemail').val();
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        if (!email == "" && email.match(pattern)) {
            $.ajax({
                url: "checkmail.php",
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
<script type="text/javascript">
$(document).on("click", "#submit", function() {
  var Email = $('#addemail').val();
  var Name = $('#addname').val();
            // var Name = $('#addname').val();
            // var Email = $('#addemail').val();
            // if (Name == "" || Email == "") {
            //     $('#hidden').fadeIn();
            //     $('#hidden').css("color", "red");
            //     $('#hidden').html('All Filed Are Required');
            //     setTimeout(function() {
            //         $('#hidden').fadeOut()
            //     }, 4000)
            // } else {
              const okButton = document.getElementById('submit');
              $.ajax({
                url: "http://localhost/resetapi/load.php",
                type: "POST",
                data: {'Name':Name,'email':Email},
                success:  function(data) {
                        if (data ==1) {
                            $('#form').trigger("reset");
                            $('#hidden').fadeIn();
                            $('#hidden').css("color", "Green");
                            $('#hidden').html('Record added Sucessfully');
                          
                            okButton.disabled = true;
                            setTimeout(function() {
                                $('#hidden').fadeOut();
                            }, 4000)
                        }
                        if (data==0) {
                            $('#hidden').fadeIn();
                            $('#hidden').css("color", "red");
                            $('#hidden').html('faield to saved');
                            setTimeout(function() {
                                $('#hidden').fadeOut();
                            }, 4000)
                        }
                    }
                
         
        })  })
</script>
<script>
   
       
            
     
        </script> 
</body>
</html>