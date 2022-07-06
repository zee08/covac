
<?php
include('conn.php');
?>

<!-- <?php 
  session_start(); 

  // if (!isset($_SESSION['username'])) {
  // 	$_SESSION['msg'] = "You must log in first";
  // 	header('location: signin.php');
  // }
  // if (isset($_GET['logout'])) {
  // 	session_destroy();
  // 	unset($_SESSION['username']);
  // 	header("location: signin.php");
  // }
?> -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>ADMIN DASHBOARD</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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

      body, html {
  height: 100%;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("vac6.jpg");

  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 40%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}

body {
    font-size: 19px;
    background-color: #DAF7A6;
    font-family: Arial, Helvetica, sans-serif;
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
    background: #F5F5F5;
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
.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
  background: #42b078;
}

.hovereffect .overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
  padding: 50px 20px;
}

.hovereffect img {
  display: block;
  position: relative;
  max-width: none;
  width: calc(100% + 20px);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(-10px,0,0);
  transform: translate3d(-10px,0,0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.hovereffect:hover img {
  opacity: 0.4;
  filter: alpha(opacity=40);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

.hovereffect h2 {
  text-transform: uppercase;
  color: black;
  text-align: center;
  position: relative;
  font-size: 17px;
  overflow: hidden;
  padding: 0.5em 0;
  background-color: transparent;
}

.hovereffect h2:after {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background: #fff;
  content: '';
  -webkit-transition: -webkit-transform 0.35s;
  transition: transform 0.35s;
  -webkit-transform: translate3d(-100%,0,0);
  transform: translate3d(-100%,0,0);
}

.hovereffect:hover h2:after {
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

.hovereffect a, .hovereffect p {
  color: #FFF;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(100%,0,0);
  transform: translate3d(100%,0,0);
}

.hovereffect:hover a, .hovereffect:hover p {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}
.column {
  float: left;
  width: 100%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
h2.{
  color: green;
  position: absolute;

  
}
.btn {
  height: 50px;
  margin: 0;
  position: centre;
  top: 100%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  align-items: center;
}
    </style>

    
    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
  </head>
  <body>
    
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="bootstrap" viewBox="0 0 118 94">
    <title>Bootstrap</title>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
  </symbol>
  <symbol id="home" viewBox="0 0 16 16">
    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
  </symbol>
  <symbol id="speedometer2" viewBox="0 0 16 16">
    <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
    <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
  </symbol>
  <symbol id="table" viewBox="0 0 16 16">
    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
  </symbol>
  <symbol id="people-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
  </symbol>
  <symbol id="grid" viewBox="0 0 16 16">
    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
  </symbol>
</svg>

<div class="bg-image"></div>

<!-- <div class="bg-text">
 
  <!-- <p>And I'm a Photographer</p> -->
<!-- </div>  -->

<main>

  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <h3><b>CoVac</b></h3>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="manageAppointment.php" class="nav-link px-2 link-secondary">Manage Appointment</a></li>
          <li><a href="viewappointment.php" class="nav-link px-2 link-dark">View Appointment</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Contact Us</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">FAQ</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <?php  if (isset($_SESSION['username'])) : ?>
    	    <?php echo $_SESSION['username'];?>
         
                
          <br>
         
         
    	    
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="search.php?logout='1'">Sign out</a></li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </header>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
  
  <div id="layoutSidenav_content">
    <nav class="">
                <main>
                  
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><h4>Registered Users</h4></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                   
                                    <?php
                                    $query = "SELECT * FROM signup ";
                                    $results = mysqli_query($db, $query);

                                    if($query = mysqli_num_rows($results))
                                    {
                                       echo '<div><h4 class="nb-0"> ' .$query.'</h4></div>'; 
                                    }
                                    else
                                    {
                                      echo '<h4 class="nb-0">No Data</h4>';
                                    }
                                    ?>
                                   </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><h4>Registered Patients<h4></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        
                                    <?php
                                    $query = "SELECT * FROM signup WHERE username != 'admin1' ";
                                    $results = mysqli_query($db, $query);

                                    if($query = mysqli_num_rows($results))
                                    {
                                       echo '<div><h4 class="nb-0"> ' .$query.'</h4></div>'; 
                                    }
                                    else
                                    {
                                      echo '<h4 class="nb-0">No Data</h4>';
                                    }
                                    ?>
                                    
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><h4>APPOINTMENTS<h4</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    $query = "SELECT * FROM appointment ";
                                    $results = mysqli_query($db, $query);

                                    if($query = mysqli_num_rows($results))
                                    {
                                       echo '<div><h4 class="nb-0"> ' .$query.'</h4></div>'; 
                                    }
                                    else
                                    {
                                      echo '<h4 class="nb-0">No Data</h4>';
                                    }
                                    ?>
<br>
                                        <a class="small text-white stretched-link" href="#"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><h4>AVAILABLE VACCINE</h4></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link">0</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        VACCINE AVAILABILITY
                                    </div>
                                    
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                       NUMBER OF COVAC USERS
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div> -->
                        <!-- </div> -->
                        <!-- <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Pie Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div> -->
                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
               
            </div>
            </div>
            <br>
            <br>
            <!-- <div class= "photos">
            <img src="vac.jpg" alt="img" width="300" height="300"></img>
                                    
            <img src="vac6.jpg" alt="img" width="300" height="300"></img>

            <img src="vac5.jpg" alt="img" width="300" height="300"></img>

            <img src="vac7.jpg" alt="img" width="300" height="300"></img> -->

            <h2 align="center">TEST CENTRE: 
            <?php
             $query = mysqli_query($db, "SELECT * FROM `signup` WHERE `username`='$_SESSION[username]'") or die(mysqli_error());
             $fetch = mysqli_fetch_array($query);
             //$query = "SELECT testcentre FROM signup";
           // $results = mysqli_query($db, $query);
            
          
             while ($row = mysqli_fetch_array($results)) { 
          
                                    if($query = mysqli_num_rows($results))
                                    {
                                      echo $fetch['testcentre'];
                                    }
                                    else
                                    {
                                      echo '<h4 class="nb-0">No Data</h4>';
                                    }
                                  }
            ?>
            
            </h2>

            <br>
            <div class= 'col-md-12 text-center'>
<button onclick= "document.location = 'viewappointment.php'" type="button" class="btn btn-primary" 
        href="http://localhost/covac-master/bootstrap/sign-up/viewappointment.php">VIEW APPOINTMENT</button>

                                </div>

            <!-- <script>
            public function loginProcess(Request $request)
        {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status'=>1])){
                if((Auth::user()->role == 'admin1')){
                     return url('showallrequest');
                } else {
                    if($request->session()->has('request_cache')){
                        return $this->saveRequest($request);
                    } else {
                        return url('displayLegal');
                    }
                }
                return 'true';
            }
            return "false";
        }
        </script> -->
            <?php 
// 	if (isset($_GET['edit'])) {
// 		$id = $_GET['edit'];
// 		$update = true;
// 		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

// 		if (count($record) == 1 ) {
// 			$n = mysqli_fetch_array($record);
// 			$name = $n['name'];
// 			$address = $n['address'];
// 		}
// 	}
// ?>
   <?php $results = mysqli_query($db, "SELECT * FROM appointment where location = ''"); ?>
   <?php $query = mysqli_query($db, "SELECT * FROM `signup` WHERE `username`='$_SESSION[username]'") or die(mysqli_error());
         $fetch = mysqli_fetch_array($query);
         ?>

<!-- <table>
	<thead>
		<tr>
			<th>Application ID</th>
			<th>Date</th>
      <!-- <th>Gender</th> -->
			<!-- <th colspan="2">Action</th>
		</tr>
	</thead>
	
	<!-- while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td>echo $row['app_id']; ?></td>
			<td>echo $row['date']; ?></td> -->
     
			<!-- <td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<!-- php } ?> -->
<!-- </table> -->

 <!-- <div class="card-group">
 <div class="container" style="margin-left: auto;
  margin-right: 10%;
  width: 50%;">
  <div class="row">
    <div class="column">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="hovereffect">
        <img class="img-responsive" src="vac.jpg" alt="" width ='300'>
        <div class="overlay" >
          <h2>VACCINE INFO</h2>
				  <p><a href="#">Getting vaccinated against COVID-19 can lower your risk of getting and spreading the virus that causes COVID-19.</a></p> 
        </div>
        </div>
        
      </div>
    </div>
  </div>
 </div>
</div>
 
<div class="card-group">
 <div class="container" style=" margin-left: auto;
  margin-right: 10%;
  width: 50%;">
  <div class="row">
    <div class="column">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="hovereffect">
        <img class="img-responsive" src="https://images.unsplash.com/photo-1608326389514-d9d2514e1933?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=624&q=80" alt="" width ='300' height='500' >
        <div class="overlay" >
          <h2>COVID-19 Vaccines Are Safe for Children and Adults?</h2>
				  <p><a href="#">Everyone who receives a COVID-19 vaccine can participate in safety monitoring by enrolling themselves and their children ages 5 years and older in v-safe and completing health check-ins after their COVID-19 vaccination. Parents and caregivers can create or use their own account to enter their children’s information.</a></p> 
        </div>
        </div>
      </div>
    </div>
  </div>
 </div>
</div>

<br>
 <div class="card-group">
 <div class="container" style="margin-left: auto;
  margin-right: 10%;
  width: 50%;">
  <div class="row">
    <div class="column">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="hovereffect">
        <img class="img-responsive" src="vac3.jpg" alt="" width ='300'>
        <div class="overlay" >
          <h2>COVID-19 vaccines are effective?</h2>
				  <p><a href="#">COVID 19-vaccines are effective and can lower your risk of getting and spreading the virus that causes COVID-19. COVID-19 vaccines also help prevent serious illness and death in children and adults even if they do get COVID-19.</a></p> 
        </div>
        </div>
        
      </div>
    </div>
  </div>
 </div>
</div>
  -->

<!-- <img src="vac7.jpg" class="rounded float-left" alt="" width="300" height='300'>
<img src="vac5.jpg" class="rounded float-left" alt="" width="300" height='300'> -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>

            </html>
