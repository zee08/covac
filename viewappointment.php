
<!-- <!DOCTYPE html>
<html>
<head>
<style>

body {
  background-image: url('user(1).png');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
     
      .bg {
  /* The image used */
  
  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
    </style>

    
    Custom styles for this template -->
    <!-- <link href="cover.css" rel="stylesheet">
  </head>
  <div class="jumbotron bg" 
  style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.6) 0%,rgba(255,255,255,0.8) 100%), 
  url(vac3.jpg)">

</style>
</head>
<body>

</body>
</html> -->
<!-- <!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">

    

    <!- Bootstrap core CSS -->
<!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      
      
  <body class="bg">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" > -->
<!-- <img src="vac3.png"></img> -->
<!-- Jumbotron -->
<!-- <div
  class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
  style="background-image: url('https://images.unsplash.com/photo-1605289982774-9a6fef564df8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1528&q=80');"
>
  <h1 class="mb-3 h2">Jumbotron</h1>

  <p>
    Testing
  </p>
</div>
Jumbotron -->
<!-- Background image -->
<!Doctype>
<html>
  <head>
<style>
  .header {
  padding: 20px;
  text-align: center;
  background: #7DCCDF ;
  color: black;
  font-size: 30px;
}
.bg-image {
  /* The image used */
  background-image: url("vac.jpg");

  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

</style>
<!-- <div
  class="bg-image d-flex justify-content-center align-items-center"
  style="
    background-image: url('https://images.unsplash.com/photo-1605289982774-9a6fef564df8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1528&q=80'); */
    height: 100vh;
  "
> -->
  <h1 class="header" >VACCINE APPOINTMENT</h1>
</div>
<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="dashboard1.php" class="nav-link px-2 link-secondary">Dashboard</a></li>
         
        </ul>
<div class="bg-image"></div>
<!-- Background image -->

</head>
<body>
<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "covac");
$query = "SELECT * FROM signup";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <style>
   #box
   {
    width:600px;
    background:gray;
    color:white;
    margin:0 auto;
    padding:10px;
    text-align:center;
   }
  </style>
 </head>
 <body>
  <div class="container">
   <br />
   <h3 align="center">Delete multiple rows by selecting checkboxes using Ajax Jquery with PHP</h3><br />
   <?php
   if(mysqli_num_rows($result) > 0)
   {
   ?>
   <div class="table-responsive">
    <table class="table table-bordered">
     <tr>
      <th>Customer Name</th>
      <th>Customer Address</th>
      <th>Delete</th>
     </tr>
   <?php
    while($row = mysqli_fetch_array($result))
    {
   ?>
     <tr id="<?php echo $row["CustomerID"]; ?>" >
      <td><?php echo $row["username"]; ?></td>
      <td><?php echo $row["dateofbirth"]; ?></td>
      <td><input type="checkbox" name="customer_id[]" class="delete_customer" value="<?php echo $row["CustomerID"]; ?>" /></td>
     </tr>
   <?php
    }
   ?>
    </table>
   </div>
   <?php
   }
   ?>
   <div align="center">
    <button type="button" name="btn_delete" id="btn_delete" class="btn btn-success">Delete</button>
   </div>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = [];
   
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("Please Select atleast one checkbox");
   }
   else
   {
    $.ajax({
     url:'delete.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
      for(var i=0; i<id.length; i++)
      {
       $('tr#'+id[i]+'').css('background-color', '#ccc');
       $('tr#'+id[i]+'').fadeOut('slow');
      }
     }
     
    });
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
</script>
</body>
</html>
