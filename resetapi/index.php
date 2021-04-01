<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Index</title>
  </head>
  <body>
  <table class="table w-75 text-center ml-auto mr-auto ">
  <thead class="table-primary ">

      <th>S.no</th>
      <th >Name</th>
      <th >Email id</th>
      <th >Edit</th>
      <th >Delete</th>

  </thead>
  <tbody id="show" >
   
   
  </tbody>
</table>
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
         <input type="text"  class="form-control" id="name" /><br>
         <label>Email</label>
         <input type="text" class="form-control" id="Email" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" >Save Changes</button>
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
          <button type="button" class="btn btn-primary" >Delete</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

   <script>
   $(document).ready(function(){
      function loading()
      {
        $.ajax({
          url:"http://localhost/resetapi/json.php/",
          type: "GET",
          success:function(data){
           if(data.status==false){
                $('#show').append("<tr><td colspan='6'> <h2>"+data.message+"</h2></td></tr>")
           }else{
                $.each(data,function(key,value){
                  $('#show').append("<tr>"
                                     + "<td>"+value.id+" </td>"+
                                    "<td>"+value.Name+" </td>"+
                                    "<td>"+value.Email+" </td>"+
                                    "<td> <button class='btn-success' id='myBtn' dataeid='"+value.id+"'> Edit</button> </td>"+
                                    "<td> <button class='btn-danger' id='dltbtn' dataeid='"+value.id+"'> Delete</button> </td>"+
                  "</tr>")


                })
           }

          }


        })

      }


loading();
        $(document).on("click","#myBtn",function(){

          $("#myModal").modal();

        } )
         

        $(document).on("click","#dltbtn",function(){

$("#myModal1").modal();

} )

       



   })
   
   
   </script>
     
   
   








   
  </body>
</html>
