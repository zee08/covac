<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: signin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: signin.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>COVID-19 Vaccination Centers</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">
    <!--map sdk -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Buy COVID-19 vaccination &amp; Find COVID-19 Vaccination Clinics near you">
    <meta name="keywords" content="Vaccine, vaccination, COVID-19, coronavirus">
    <meta property="og:type" content="website">
    <link rel="stylesheet" href="./leaflet/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.0/dist/L.Control.Locate.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">
    <link rel="stylesheet" href="dstyle.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
    <link href="book.css" rel="stylesheet">
    <script>
    
    </script>
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
    </style>
    </head>
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <h3><b>CoVac</b></h3>
        </a>
        
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="user.php" class="nav-link px-2 llink-dark">Dashboard</a></li>
          <li><a href="search.php" class="nav-link px-2 link-dark">Search Center</a></li>
          <li><a href="book-appoint.php" class="nav-link px-2 link-dark">Book Appointment</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">contact Us</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">FAQ</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" class="text-center">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <?php  if (isset($_SESSION['username'])) : ?>
    	    <?php echo $_SESSION['username']; ?>
    	    
        
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider" href="signin.php">Log out</li>
            <li><a class="dropdown-item" href="search.php?logout='1'">Sign out</a></li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
    </header>
    <body>

    

          </body>
          </html>