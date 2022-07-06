<?php
include('conn.php');
?>

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
  /* background-image: url(""); */

  /* Add the blur effect */
  /* filter: blur(8px); */
  /* -webkit-filter: blur(8px); */

  /* Full height */
  /* height: 100%; */ */

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  color: #DAF7A6 ;

}
body {
    font-size: 19px;
    
}
table{
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
}
tr {
    border-bottom: 1px solid #cbcbcb;
}
th, td{
    border: none;
    height: 30px;
    padding: 2px;
}
tr:hover {
    background: #FFC300;
}

form {
    width: 45%;
    margin: 50px auto;
    text-align: left;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
}

.input-group {
    margin: 10px 0px 10px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
.edit_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}

.del_btn {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}
.btn {
  height: 50px;
  margin: 0;
  /* position: centre; */
  top: 100%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  align-items: center;
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
          <!-- <li><a href="dashboard1.php" class="nav-link px-2 link-secondary">Dashboard</a></li> -->
         
        </ul>
<div class="bg-image"></div>
<!-- Background image -->

</head>
<body>
<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "covac");
$query = "SELECT testcentre FROM signup ";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Vaccine Appointment</title>
  
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
 
   <h3 align="center"></h3><br />
   <?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$address = $n['address'];
		}
	}
?>
   <?php $results = mysqli_query($db, "SELECT * FROM appointment where location = 'Hospital Kuala Lumpur'"); ?>


<table>
	<thead>
		<tr>
			<th>Application ID</th>
			<th>Date</th>
      <th>Location</th>
      <!-- <th>Gender</th> -->
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['app_id']; ?></td>
			<td><?php echo $row['date']; ?></td>
      <td><?php echo $row['location'];?></td>
     
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>


<div class= 'col-md-12 text-center'>
<button onclick= "document.location = 'dashboard1.php'" type="button" class="btn btn-primary" 
href="http://localhost/covac-master/bootstrap/sign-up/dashboard1.php">BACK TO DASHBOARD</button>
</div>