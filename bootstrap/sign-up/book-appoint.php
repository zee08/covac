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
    
	<form action="book-appoint.php" id="ft-form" method="POST">
  <div class="col-12"><legend><h3>Select location<h3></legend>
  </div>
  <div class="col-12 col-sm-6 col-md-3 col-lg-3 location-filter-col"></div>
  <label id="search-input-desc" for="search-input">Select Clinic or Clinic ID</label>
  <input type="text" id="search-input" onkeyup="doSearch()" placeholder="Search by ID or name">
  <div class="loc-icon-block" id="loc-icon" onclick="getLocation(),window.location.reload()" style="visibility:hidden"><svg width="24" height="27" viewBox="0 0 24 27" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9254 1H12H12.0746C18.0989 1.088 23 5.56256 23 10.9623C23 18.1111 15.1277 23.0464 12 25.4444C11.791 25.2843 1 18.1111 1 10.9623C1 5.56256 5.90111 1.088 11.9254 1ZM12 14.4444C12.7252 14.4444 13.4341 14.2294 14.0371 13.8265C14.6401 13.4236 15.11 12.8509 15.3876 12.181C15.6651 11.511 15.7377 10.7737 15.5962 10.0624C15.4547 9.35118 15.1055 8.69785 14.5927 8.18505C14.0799 7.67226 13.4266 7.32304 12.7153 7.18157C12.0041 7.04009 11.2668 7.1127 10.5968 7.39022C9.92683 7.66774 9.35418 8.13771 8.95128 8.74069C8.54838 9.34367 8.33333 10.0526 8.33333 10.7778C8.33333 11.7502 8.71964 12.6829 9.40727 13.3705C10.0949 14.0581 11.0275 14.4444 12 14.4444Z" stroke="#ED4B7A" stroke-width="1.32" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
  <div class="col-12 col-sm-6 col-md-3 col-lg-3 location-filter-col"></div>
  <label for="state">Select by State</label>
    <select name="state" id="state" onchange="updateState()">
    <option value="">Select State</option>
    <option value="Selangor">Selangor</option>
    <option value="Johor">Johor</option>
    <option value="Pulau Pinang">Pulau Pinang</option>
    <option value="Negeri Sembilan">Negeri Sembilan</option>
    <option value="Kuala Lumpur">Kuala Lumpur</option>
    </select>
    </div>
    <br>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 location-filter-col"></div>
    <br>
    <label for="location">Select by Clinic</label>
<select name="location" id="location" onchange="updateClinic()">
<option value="">Select Clinic</option>
<option value="Klinik Ng Dan Lee – Shah Alam">Klinik Ng Dan Lee – Shah Alam</option>
<option value="Poliklinik Puteri Dan Surgeri – Kota Tinggi">Poliklinik Puteri Dan Surgeri – Kota Tinggi</option>
<option value="Klinik Malaysia – Pasir Gudang">Klinik Malaysia – Pasir Gudang</option>
<option value="Klinik Catterall, Khoo And Raja Malek – GE Mall">Klinik Catterall, Khoo And Raja Malek – GE Mall</option>
<option value="Klinik Catterall, Khoo And Raja Malek – Jalan Raja Laut">Klinik Catterall, Khoo And Raja Malek – Jalan Raja Laut</option>
<option value="Kumpulan Medic – Evesuite">Kumpulan Medic – Evesuite</option>
<option value="Klinik Aman – Gelugor">Klinik Aman – Gelugor</option>
<option value="Klinik Johor – Pasir Gudang">Klinik Johor – Pasir Gudang</option>
<option value="Klinik Rakan Medik – Kelana Jaya">Klinik Rakan Medik – Kelana Jaya</option>
<option value="Kumpulan Medic – Shah Alam">Kumpulan Medic – Shah Alam</option>
<option value="Dewan sivik MBPJ">Dewan sivik MBPJ</option>
<option value="Dewan MBSA Kemuning Utama">Dewan MBSA Kemuning Utama</option>
<option value="Dewan LPK, Kelab Sukan Dan Rekreasi Pelabuhan Klang">Dewan LPK, Kelab Sukan Dan Rekreasi Pelabuhan Klang</option>
<option value="Hospital Selayang">Hospital Selayang</option>
<option value="Movenpick Hotel & Convention Centre KLIA">Movenpick Hotel & Convention Centre KLIA</option>
<option value="Hospital Kuala Lumpur">Hospital Kuala Lumpur</option>
</select>
          </div>
          </div>




  <fieldset>
    <legend><h3>Appointment request</h3></legend>
    
      <label>
        Date
        <input type="date" name="date" id="date" required>
      </label>
      <br>
      
        
        <label>
          Select time
						<select name="time" id="time">
									<option value="">-select time-</option>
									<option value="9.00am-10.00am">09.00-10.00</option>
									<option value="10.00am-11.00am">10.00-11.00</option>
									<option value="11.00am-12.00pm">11.00-12.00</option>
									<option value="12.00pm-01.00pm">12.00-1.00</option>
									<option value="03.00pm-04.00pm">03.00-4.00</option>
									<option value="04.00pm-05.00pm">04.00-5.00</option>
									<option value="05.00pm-06.00pm">05.00-6.00</option>
								
      
    						  </select>
									
					</label>
     
      <br>
      <label>
        phone number
						<input type="tel" name="phoneno" id="phoneno"  placeholder="registered contact no" required="required" pattern="[0-9]{10,11}" title="please enter only numbers between 10 to 11 for mobile no."/>
					</label>  
  </fieldset>
  <div class="btns">
    
    <input type="submit" value="Submit" name="submit" request >
  </div>
</form>
      
          </body>
<script>
  var serviceURL="/vaccination-services"
  var items=[{"name":"Klinik Ng Dan Lee – Shah Alam","code":"DOC0093","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FROC03X4wS1y0SHln5SFy%2FROC03X4wS1y0SHln5SFy-1633577195488?alt=media&token=a7c0804c-f4c7-4812-a561-cf17b2dcd21c","url":"klinik-ng-dan-lee--shah-alam","address":"31 Jalan 19A, Seksyen 19","address2":" ","id":"ROC03X4wS1y0SHln5SFy","est_days":{"fri":true,"mon":true,"sun":false,"pub":false,"thu":true,"sat":true,"tue":true,"wed":true},"est_schedule":{"pub":["9.00","13.00","14.00","18.00"],"thu":["10.00","13.00","13.00","13.00"],"mon":["10.00","13.00","13.00","13.00"],"fri":["10.00","13.00","13.00","13.00"],"sun":["6.00","13.00","13.00","24.00"],"sat":["10.00","13.00","13.00","13.00"],"wed":["10.00","13.00","13.00","13.00"],"tue":["10.00","13.00","13.00","13.00"]},"est_days_blocked":{"2022-1-1":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-25":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-1":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-2":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Poliklinik Puteri Dan Surgeri – Kota Tinggi","code":"DOC0121","state":"Johor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FZ2h0tMXkDqYQWtuaCaFy%2FZ2h0tMXkDqYQWtuaCaFy-1633589211728?alt=media&token=c5ca3792-d674-4892-a950-891d9de2b241","url":"poliklinik-puteri-dan-surgeri--kota-tinggi","address":"No 3, Jalan Niaga 8, Bandar Kota Tinggi, Kota Tinggi, Johor","address2":" ","id":"Z2h0tMXkDqYQWtuaCaFy","est_days":{"mon":true,"fri":true,"wed":true,"pub":false,"thu":true,"sat":true,"tue":true,"sun":true},"est_schedule":{"tue":["9.00","22.00","22.00","22.00"],"wed":["9.00","22.00","22.00","22.00"],"thu":["9.00","22.00","22.00","22.00"],"sat":["9.00","22.00","22.00","22.00"],"mon":["9.00","22.00","22.00","22.00"],"sun":["9.00","17.00","17.00","17.00"],"fri":["9.00","22.00","22.00","22.00"],"pub":["9.00","17.00","17.00","17.00"]},"est_days_blocked":{"2021-12-18":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-25":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-3":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-2":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Malaysia – Pasir Gudang","code":"DOC0112","state":"Johor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FUYqLc0pcUkMaptOpyiFH%2FUYqLc0pcUkMaptOpyiFH-1633582219899?alt=media&token=c5d130de-f1e1-4187-b78b-30d0d135717a","url":"klinik-malaysia--pasir-gudang","address":"10, Jalan 10/1, Unit Perjiranan 10","address2":" ","id":"UYqLc0pcUkMaptOpyiFH","est_days":{"fri":true,"sat":true,"tue":true,"pub":true,"thu":true,"sun":true,"mon":true,"wed":true},"est_schedule":{"thu":["8.50","15.00","15.00","20.50"],"wed":["8.50","15.00","15.00","20.50"],"fri":["8.50","15.00","15.00","20.50"],"pub":["8.50","14.00","14.00","17.50"],"tue":["8.50","15.00","15.00","20.50"],"mon":["8.50","15.00","15.00","20.50"],"sun":["8.50","14.00","14.00","17.50"],"sat":["8.50","12.00","12.00","17.50"]},"est_days_blocked":{"2021-12-20":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-19":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-2":"New Blocked Date","2022-2-3":"New Blocked Date","2022-1-31":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Catterall, Khoo And Raja Malek – GE Mall","code":"DOC0147","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2F2unZrYWd8mKo44RPMwEU%2F2unZrYWd8mKo44RPMwEU-1633593053450?alt=media&token=fa1e361c-5dde-4aa7-a3c4-90ffe5183d16","url":"klinik-catterall-khoo-and-raja-malek--ge-mall","address":"Lot 6B, Level 2 Great Eastern Mall, 303, Jalan Ampang, Kuala Lumpur, Wilayah Persekutuan","address2":" ","id":"2unZrYWd8mKo44RPMwEU","est_days":{"fri":true,"mon":true,"thu":true,"sat":true,"wed":true,"sun":false,"tue":true,"pub":false},"est_schedule":{"mon":["10.00","13.00","13.00","15.00"],"fri":["10.00","13.00","13.00","15.00"],"tue":["10.00","13.00","13.00","15.00"],"wed":["10.00","13.00","13.00","15.00"],"thu":["10.00","13.00","13.00","15.00"],"sun":["9.00","13.00","14.00","18.00"],"pub":["9.00","13.00","14.00","18.00"],"sat":["10.00","12.00","14.50","14.50"]},"est_days_blocked":{"2021-12-25":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-2":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-21":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-19":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":1639756800,"est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Catterall, Khoo And Raja Malek – Jalan Raja Laut","code":"DOC0153","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FKyeZLEzBWYCCpmTf6qtF%2FKyeZLEzBWYCCpmTf6qtF-1633595238408?alt=media&token=12dab587-a821-45d9-9b6e-f20cf6810b7c","url":"klinik-catterall-khoo-and-raja-malek--jalan-raja-laut","address":"Suite G.1B, Ground Floor, Wisma FGV, Jalan Raja Laut, Kuala Lumpur, Wilayah Persekutuan","address2":" ","id":"KyeZLEzBWYCCpmTf6qtF","est_days":{"mon":true,"pub":false,"tue":true,"fri":true,"wed":true,"thu":true,"sun":false,"sat":true},"est_schedule":{"pub":["9.00","13.00","14.00","18.00"],"wed":["10.00","15.00","15.00","15.00"],"tue":["10.00","15.00","15.00","15.00"],"thu":["10.00","15.00","15.00","15.00"],"fri":["10.00","15.00","15.00","15.00"],"sat":["10.00","12.00","12.00","12.00"],"sun":["8.00","13.00","14.00","17.00"],"mon":["10.00","15.00","15.00","15.00"]},"est_days_blocked":{"2022-1-31":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-18":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-3":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":1639756800,"est_limit_slot":{},"block_timeslot":" "},{"name":"Kumpulan Medic – Evesuite","code":"DOC0077","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FGldqmmP0gDsIVK9p20pl%2FGldqmmP0gDsIVK9p20pl-1633502472452?alt=media&token=fe2bb5b8-8667-4198-9d74-7896271cbd3e","url":"kumpulan-medic--evesuite","address":"Evesuite @ Ara Damansara No. A-1-02, Jalan PJU 1/41A, Ara Damansara, Petaling Jaya, Selangor","address2":" ","id":"GldqmmP0gDsIVK9p20pl","est_days":{"sat":true,"mon":true,"tue":true,"fri":true,"pub":false,"wed":true,"sun":false,"thu":true},"est_schedule":{"pub":["9.00","13.00","14.00","18.00"],"wed":["10.00","15.00","15.00","15.00"],"tue":["10.00","15.00","15.00","15.00"],"sun":["8.00","13.00","14.00","14.00"],"thu":["10.00","15.00","15.00","15.00"],"mon":["10.00","15.00","15.00","15.00"],"sat":["10.00","12.00","12.00","12.00"],"fri":["10.00","15.00","15.00","15.00"]},"est_days_blocked":{"2021-12-18":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-25":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-4":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-21":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Aman – Gelugor","code":"DOC0131","state":"Pulau Pinang","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FHuycvsNAlB2aqYfGDLnM%2FHuycvsNAlB2aqYfGDLnM-1633591251214?alt=media&token=50d78287-a8ce-4e40-b1a4-d4ffbeb399d0","url":"klinik-aman--gelugor","address":"11, Jalan Sultan Azlan Shah, Gelugor, Pulau Pinang","address2":" ","id":"HuycvsNAlB2aqYfGDLnM","est_days":{"thu":false,"fri":true,"sun":false,"pub":false,"sat":false,"tue":false,"wed":true,"mon":true},"est_schedule":{"pub":["9.00","13.00","14.00","18.00"],"mon":["11.00","12.00","12.00","12.00"],"sun":["6.00","13.00","14.00","24.00"],"wed":["10.00","12.00","12.00","12.00"],"thu":["6.00","13.00","14.00","24.00"],"sat":["6.00","13.00","14.00","24.00"],"fri":["10.00","12.00","12.00","12.00"],"tue":["6.00","13.00","14.00","24.00"]},"est_days_blocked":{"2021-12-25":"New Blocked Date","2022-2-3":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-2":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-4":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":1639756800,"est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Johor – Pasir Gudang","code":"DOC0160","state":"Johor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FV81hIyHjV3HSs2tCtb71%2FV81hIyHjV3HSs2tCtb71-1633595622993?alt=media&token=6145bc41-df0d-43c7-a87b-5fb953845a37","url":"klinik-johor--pasir-gudang","address":"No. 02-1A, Pusat Perdagangan, Jalan Bandar, Pasir Gudang, Johor","address2":" ","id":"V81hIyHjV3HSs2tCtb71","est_days":{"fri":true,"pub":false,"sun":false,"thu":false,"sat":false,"wed":true,"tue":false,"mon":false},"est_schedule":{"tue":["10.00","15.00","15.00","15.00"],"pub":["9.00","13.00","14.00","18.00"],"thu":["10.00","15.00","15.00","15.00"],"sun":["6.00","13.00","14.00","24.00"],"sat":["10.00","12.00","12.00","12.00"],"wed":["14.00","15.00","15.00","15.00"],"mon":["10.00","15.00","15.00","15.00"],"fri":["14.00","15.00","15.00","15.00"]},"est_days_blocked":{"2021-12-18":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-3":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-1":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-21":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":1639756800,"est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Rakan Medik – Kelana Jaya","code":"DOC0189","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FzK1UETlQLaZNwqE6eM9g%2FzK1UETlQLaZNwqE6eM9g-1633604327255?alt=media&token=28f7cc0f-cefe-41e9-808e-6ea111cc5e0b","url":"klinik-rakan-medik--kelana-jaya","address":"18-B1, Jalan SS 6/3, Kelana Jaya","address2":" ","id":"zK1UETlQLaZNwqE6eM9g","est_days":{"pub":false,"wed":true,"tue":true,"sun":false,"sat":false,"fri":true,"thu":true,"mon":true},"est_schedule":{"mon":["10.00","17.00","17.00","17.00"],"sat":["10.00","12.00","12.00","12.00"],"pub":["9.00","13.00","14.00","18.00"],"tue":["10.00","17.00","17.00","17.00"],"thu":["10.00","17.00","17.00","17.00"],"wed":["10.00","17.00","17.00","17.00"],"fri":["10.00","17.00","17.00","17.00"],"sun":["8.50","13.00","13.00","22.00"]},"est_days_blocked":{"2021-12-20":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-4":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-1":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-25":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Kumpulan Medic – Shah Alam","code":"DOC0069","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FHryZzQk4ntbdOBP7x3Fw%2FHryZzQk4ntbdOBP7x3Fw-1633497974150?alt=media&token=f50462af-4df6-41b9-9cd0-48378d22903a","url":"kumpulan-medic--shah-alam","address":"No. 1, Lorong Tukang 16/3, Seksyen 16, Shah Alam, Selangor","address2":" ","id":"HryZzQk4ntbdOBP7x3Fw","est_days":{"mon":true,"thu":true,"sat":true,"sun":false,"fri":true,"wed":true,"pub":false,"tue":true},"est_schedule":{"fri":["10.00","15.00","15.00","15.00"],"tue":["10.00","15.00","15.00","15.00"],"wed":["10.00","15.00","15.00","15.00"],"thu":["10.00","15.00","15.00","15.00"],"mon":["10.00","15.00","15.00","15.00"],"sun":["9.00","13.00","14.00","18.00"],"pub":["9.00","13.00","14.00","18.00"],"sat":["10.00","12.00","12.00","12.00"]},"est_days_blocked":{"2021-12-25":"New Blocked Date","2022-1-1":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-21":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Poliklinik Puteri Dan Surgeri – Muar","code":"DOC0124","state":"Johor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FK7RTSabiM9O2oMYpRbeT%2FK7RTSabiM9O2oMYpRbeT-1633590251043?alt=media&token=75da7754-5f31-439a-8ed3-032085ba12a6","url":"poliklinik-puteri-dan-surgeri--muar","address":"10, aras bawah, Jalan Perniagaan Jaya 1, Taman Mas Jaya,, Muar, Johor","address2":" ","id":"K7RTSabiM9O2oMYpRbeT","est_days":{"sat":true,"mon":true,"sun":false,"pub":false,"fri":true,"tue":true,"thu":true,"wed":true},"est_schedule":{"pub":["9.00","13.00","14.00","18.00"],"thu":["8.50","11.00","11.00","11.00"],"mon":["8.50","14.50","14.50","14.50"],"sat":["8.50","11.00","11.00","11.00"],"fri":["8.50","11.00","11.00","14.50"],"sun":["9.00","13.00","14.00","18.00"],"wed":["8.50","11.00","11.00","11.00"],"tue":["8.50","11.00","11.00","11.00"]},"est_days_blocked":{"2021-12-25":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-21":"New Blocked Date","2022-1-31":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-2":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-18":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Kumpulan Medic – PJ","code":"DOC0207","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FBtKDvxJtX4UhnM7QIshm%2FBtKDvxJtX4UhnM7QIshm-1633606640011?alt=media&token=5a7cde34-9055-4237-9761-b53466a623ba","url":"kumpulan-medic--pj","address":"42A, Jalan Sultan 52/4","address2":" ","id":"BtKDvxJtX4UhnM7QIshm","est_days":{"tue":true,"fri":true,"pub":false,"wed":true,"mon":true,"sat":true,"sun":false,"thu":true},"est_schedule":{"wed":["10.00","15.00","15.00","15.00"],"sat":["10.00","12.00","12.00","12.00"],"fri":["10.00","15.00","15.00","15.00"],"mon":["10.00","15.00","15.00","15.00"],"sun":["9.00","12.00","14.00","14.00"],"pub":["9.00","12.00","14.00","14.00"],"thu":["10.00","15.00","15.00","15.00"],"tue":["10.00","15.00","15.00","15.00"]},"est_days_blocked":{"2022-1-1":"New Blocked Date","2022-2-1":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-19":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-25":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-21":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Ravi & Surgeri","code":"DOC0096","state":"Negeri Sembilan","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FqfkqzdvLj5WAemcnqq8J%2FqfkqzdvLj5WAemcnqq8J-1633577816488?alt=media&token=616317c9-cc4c-481e-95d7-cf5fa952b97d","url":"klinik-ravi--surgeri","address":"No. 5722 Tingkat Bawah, Jalan TS 2/1D, Taman Semarak 2","address2":" ","id":"qfkqzdvLj5WAemcnqq8J","est_days":{"tue":true,"pub":false,"thu":true,"sun":false,"mon":true,"wed":true,"fri":true,"sat":true},"est_schedule":{"tue":["10.00","13.00","13.00","15.00"],"wed":["10.00","13.00","13.00","15.00"],"sun":["9.00","13.00","13.00","19.00"],"thu":["10.00","13.00","13.00","15.00"],"mon":["10.00","13.00","13.00","15.00"],"pub":["9.00","13.00","14.00","18.00"],"sat":["10.00","12.00","12.00","12.00"],"fri":["10.00","13.00","13.00","15.00"]},"est_days_blocked":{"2022-2-3":"New Blocked Date","2021-12-19":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-2":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-20":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-25":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Sharani – Bangsar","code":"DOC0201","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2F3vixd5w4ArrPvuHHf5N6%2F3vixd5w4ArrPvuHHf5N6-1633606142877?alt=media&token=e0d4fa7c-5a00-4db9-ac6c-584daea52914","url":"klinik-sharani--bangsar","address":"No. 20 Jalan Bangsar Utama 1, Bangsar Utama","address2":" ","id":"3vixd5w4ArrPvuHHf5N6","est_days":{"fri":true,"wed":true,"sun":true,"thu":true,"sat":true,"pub":true,"mon":true,"tue":true},"est_schedule":{"sat":["8.00","18.00","18.00","18.00"],"wed":["8.00","18.00","18.00","18.00"],"thu":["8.00","18.00","18.00","18.00"],"mon":["8.00","18.00","18.00","18.00"],"tue":["8.00","18.00","18.00","18.00"],"fri":["8.00","18.00","18.00","18.00"],"pub":["8.00","18.00","18.00","18.00"],"sun":["8.00","18.00","18.00","18.00"]},"est_days_blocked":{"2021-12-20":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-4":"New Blocked Date","2022-1-1":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Ng dan Lee - Taman Maluri","code":"DOC0056","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2F4Seukv2q75JV5mmxTbrD%2F4Seukv2q75JV5mmxTbrD-1631193981920?alt=media&token=65c5d1da-56d4-4044-b0a7-a2cff965e94f","url":"klinik-ng-dan-lee--taman-maluri","address":"265 Jalan Mahkota, Taman Maluri","address2":"55100 Cheras","id":"4Seukv2q75JV5mmxTbrD","est_days":{"tue":true,"fri":true,"sat":false,"mon":true,"thu":true,"wed":true,"pub":false,"sun":false},"est_schedule":{"fri":["10.00","15.00","15.00","15.00"],"sun":["9.00","13.00","14.00","18.00"],"wed":["10.00","15.00","15.00","15.00"],"tue":["10.00","15.00","15.00","15.00"],"sat":["9.00","13.00","14.00","18.00"],"pub":["9.00","13.00","14.00","18.00"],"mon":["10.00","15.00","15.00","15.00"],"thu":["10.00","15.00","15.00","15.00"]},"est_days_blocked":{"2021-12-21":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-2":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-18":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Ng Dan Lee – Jalan Ampang","code":"DOC0185","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FEsB6uYtC5rjwmMJUDZxd%2FEsB6uYtC5rjwmMJUDZxd-1633597888675?alt=media&token=54ac5610-9c56-443e-96ff-24052fb72a5c","url":"klinik-ng-dan-lee--jalan-ampang","address":"377, Jalan Ampang","address2":" ","id":"EsB6uYtC5rjwmMJUDZxd","est_days":{"pub":false,"sun":false,"fri":true,"tue":true,"thu":false,"sat":true,"wed":false,"mon":false},"est_schedule":{"thu":["10.00","15.00","15.00","15.00"],"tue":["13.00","14.00","14.00","14.00"],"fri":["13.00","14.00","14.00","14.00"],"sun":["8.00","13.00","14.00","21.50"],"pub":["9.00","13.00","14.00","18.00"],"wed":["10.00","15.00","15.00","15.00"],"sat":["13.00","14.00","14.00","14.00"],"mon":["13.00","15.00","15.00","15.00"]},"est_days_blocked":{"2022-2-1":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-18":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-25":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-19":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Rakan Medik – Bangi","code":"DOC0108","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FoM8IeZZqP0wcK6kaMBu4%2FoM8IeZZqP0wcK6kaMBu4-1633579857925?alt=media&token=a252259d-5ab2-4572-8625-17990cb59b5d","url":"klinik-rakan-medik--bangi","address":"No. 19, Ground Floor, Jalan 4/11A, Seksyen 4 Tambahan","address2":" ","id":"oM8IeZZqP0wcK6kaMBu4","est_days":{"wed":true,"thu":true,"mon":true,"fri":true,"tue":true,"pub":false,"sat":false,"sun":false},"est_schedule":{"tue":["9.50","13.00","13.00","17.50"],"pub":["8.50","13.00","13.00","22.00"],"sat":["9.50","13.00","13.00","17.50"],"wed":["9.50","13.00","13.00","17.50"],"thu":["9.50","13.00","13.00","17.50"],"fri":["9.50","13.00","13.00","17.50"],"mon":["9.50","13.00","13.00","17.50"],"sun":["8.50","13.00","13.00","22.00"]},"est_days_blocked":{"2022-1-1":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-25":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-3":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Aman – Bayan Baru","code":"DOC0133","state":"Pulau Pinang","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FSxANbRawZsJT94nphWB5%2FSxANbRawZsJT94nphWB5-1633591533704?alt=media&token=ef34f3aa-6b62-4fa3-a70d-4582fc80a1f0","url":"klinik-aman--bayan-baru","address":"Unit 70-1-64, Level 1, D'Piazza Mall, Jalan Mahsuri, Bandar Bayan Baru,, Bayan Lepas, Pulau Pinang","address2":" ","id":"SxANbRawZsJT94nphWB5","est_days":{"tue":true,"sat":true,"fri":true,"pub":false,"wed":true,"sun":false,"mon":true,"thu":true},"est_schedule":{"sat":["14.00","14.00","14.00","16.00"],"thu":["14.00","16.00","16.00","16.00"],"mon":["14.00","16.00","16.00","16.00"],"sun":["9.00","13.00","14.00","18.00"],"pub":["9.00","13.00","14.00","18.00"],"tue":["14.00","16.00","16.00","16.00"],"fri":["14.00","16.00","16.00","16.00"],"wed":["14.00","16.00","16.00","16.00"]},"est_days_blocked":{"2021-12-20":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-1":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-4":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-25":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-21":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Poliklinik Central dan Surgeri","code":"DOC0115","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FSzAl2bR0Y8Bv3b06a0EW%2FSzAl2bR0Y8Bv3b06a0EW-1633588519477?alt=media&token=2981c2b1-4bb2-491c-b1ff-92c4c4f8c944","url":"poliklinik-central-dan-surgeri","address":"No. 20 Jalan Suria Setapak, Gombak, Kuala Lumpur, Wilayah Persekutuan","address2":" ","id":"SzAl2bR0Y8Bv3b06a0EW","est_days":{"thu":true,"tue":true,"sun":false,"fri":true,"pub":false,"wed":true,"sat":true,"mon":true},"est_schedule":{"tue":["10.00","15.00","15.00","15.00"],"sun":["8.00","13.00","14.00","22.00"],"sat":["10.00","12.00","12.00","12.00"],"fri":["10.00","15.00","15.00","15.00"],"mon":["10.00","15.00","15.00","15.00"],"thu":["10.00","15.00","15.00","15.00"],"pub":["9.00","13.00","14.00","22.00"],"wed":["10.00","15.00","15.00","15.00"]},"est_days_blocked":{"2022-2-3":"New Blocked Date","2022-2-4":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-25":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-20":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Ananda Klinik","code":"DOC0135","state":"Pahang","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FZGZlh5Xg9EhK2DLR4uHW%2FZGZlh5Xg9EhK2DLR4uHW-1633591749113?alt=media&token=fade1515-8e15-4f2b-a9c1-6af4d772bc9c","url":"ananda-klinik","address":"A-5, Jalan Stadium, Kuantan, Pahang","address2":" ","id":"ZGZlh5Xg9EhK2DLR4uHW","est_days":{"sat":true,"pub":false,"mon":true,"thu":true,"wed":true,"tue":true,"fri":true,"sun":true},"est_schedule":{"sat":["8.00","12.00","12.00","17.00"],"sun":["8.00","13.00","13.00","17.00"],"fri":["8.00","15.00","15.00","17.00"],"thu":["8.00","15.00","15.00","17.00"],"wed":["8.00","15.00","15.00","17.00"],"tue":["8.00","15.00","15.00","17.00"],"pub":["8.00","13.00","14.00","22.00"],"mon":["8.00","15.00","15.00","17.00"]},"est_days_blocked":{"2022-2-4":"New Blocked Date","2022-2-1":"New Blocked Date","2022-2-2":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-25":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-19":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Poliklinik Puteri Dan Surgeri – Skudai","code":"DOC0101","state":"Johor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FovoGqU7VOEFw58wn7N2U%2FovoGqU7VOEFw58wn7N2U-1633579829366?alt=media&token=8579983b-6918-41a2-831c-3efcc8b5658d","url":"poliklinik-puteri-dan-surgeri--skudai","address":"37, Jalan Besi 1, Taman Sri Putri, Skudai, Johor","address2":" ","id":"ovoGqU7VOEFw58wn7N2U","est_days":{"tue":true,"mon":true,"sun":true,"sat":true,"wed":true,"thu":true,"fri":true,"pub":true},"est_schedule":{"mon":["8.00","15.00","15.00","15.00"],"pub":["8.00","15.00","15.00","15.00"],"fri":["8.00","15.00","15.00","15.00"],"tue":["8.00","15.00","15.00","15.00"],"sat":["8.00","15.00","15.00","15.00"],"thu":["8.00","15.00","15.00","15.00"],"wed":["8.00","15.00","15.00","15.00"],"sun":["8.00","15.00","15.00","15.00"]},"est_days_blocked":{"2022-2-2":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-20":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-4":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Poliklinik Puteri Dan Surgeri – Pekan Nenas","code":"DOC0100","state":"Johor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FvIYUGwaCLk4OZ5Z3Bquv%2FvIYUGwaCLk4OZ5Z3Bquv-1633580059280?alt=media&token=2765200c-0cb6-4709-b5ca-2686309b0503","url":"poliklinik-puteri-dan-surgeri--pekan-nenas","address":"SH-100 Jalan Sawah, 81500, Pekan Nenas, Pontian, Johor","address2":" ","id":"vIYUGwaCLk4OZ5Z3Bquv","est_days":{"fri":true,"tue":true,"thu":true,"sun":false,"pub":true,"wed":true,"mon":true,"sat":true},"est_schedule":{"sat":["8.00","22.00","22.00","22.00"],"fri":["8.00","22.00","22.00","22.00"],"sun":["9.00","13.00","14.00","22.00"],"tue":["8.00","22.00","22.00","22.00"],"pub":["8.00","22.00","22.00","22.00"],"wed":["8.00","22.00","22.00","22.00"],"thu":["8.00","22.00","22.00","22.00"],"mon":["8.00","22.00","22.00","22.00"]},"est_days_blocked":{"2021-12-21":"New Blocked Date","2021-12-18":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-1":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-2":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Rasah Dan Surgeri","code":"DOC0106","state":"Negeri Sembilan","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2F7DgQ7KMqweZBhZADpR1j%2F7DgQ7KMqweZBhZADpR1j-1633579637074?alt=media&token=4728e0bf-f521-4254-924a-7c23478c128c","url":"klinik-rasah-dan-surgeri","address":"1761 Ground Floor, Rasah Utama, Jalan Rasah","address2":" ","id":"7DgQ7KMqweZBhZADpR1j","est_days":{"wed":true,"sun":false,"sat":false,"pub":false,"mon":true,"tue":true,"fri":true,"thu":true},"est_schedule":{"tue":["10.00","15.00","15.00","15.00"],"sun":["8.00","13.00","13.00","22.00"],"mon":["10.00","15.00","15.00","15.00"],"thu":["10.00","15.00","15.00","15.00"],"wed":["10.00","15.00","15.00","15.00"],"sat":["10.00","12.00","12.00","12.00"],"pub":["9.00","13.00","14.00","18.00"],"fri":["10.00","15.00","15.00","15.00"]},"est_days_blocked":{"2021-12-20":"New Blocked Date","2021-12-25":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date","2022-2-4":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-21":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-3":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Ng Dan Lee – Kepong","code":"DOC0212","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2Fj3TChJLYOh0IXHDZ2ehu%2Fj3TChJLYOh0IXHDZ2ehu-1633597692413?alt=media&token=8a889de6-d04e-463c-9003-44b9669b2bea","url":"klinik-ng-dan-lee--kepong","address":"25, Jalan Metro Perdana Barat 1, Taman Usahawan Kepong","address2":" ","id":"j3TChJLYOh0IXHDZ2ehu","est_days":{"sun":false,"fri":true,"thu":true,"pub":false,"wed":true,"mon":true,"tue":true,"sat":false},"est_schedule":{"fri":["9.00","10.00","10.00","10.00"],"mon":["9.00","10.00","10.00","10.00"],"sat":["8.00","13.00","14.00","22.50"],"tue":["9.00","10.00","10.00","10.00"],"sun":["8.00","13.00","14.00","22.50"],"pub":["9.00","13.00","14.00","18.00"],"wed":["9.00","10.00","10.00","10.00"],"thu":["9.00","10.00","10.00","10.00"]},"est_days_blocked":{"2022-2-1":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-3":"New Blocked Date","2022-1-31":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-2":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Catterall, Khoo And Raja Malek – Bangunan Ming","code":"DOC0156","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FVhl31AU4XO9iQ7LmoS2J%2FVhl31AU4XO9iQ7LmoS2J-1633595411361?alt=media&token=27861b12-2c04-418d-b494-d1b237666990","url":"klinik-catterall-khoo-and-raja-malek--bangunan-ming","address":"Lobby Floor, Bangunan Ming, Jalan Bukit Nanas, Kuala Lumpur, Wilayah Persekutuan","address2":" ","id":"Vhl31AU4XO9iQ7LmoS2J","est_days":{"thu":true,"sun":false,"wed":true,"pub":false,"tue":true,"mon":true,"sat":true,"fri":true},"est_schedule":{"wed":["10.00","15.00","15.00","15.00"],"thu":["10.00","15.00","15.00","15.00"],"tue":["10.00","15.00","15.00","15.00"],"mon":["10.00","15.00","15.00","15.00"],"sat":["10.00","12.00","12.00","12.00"],"sun":["9.00","13.00","14.00","14.00"],"pub":["9.00","13.00","14.00","18.00"],"fri":["10.00","15.00","15.00","15.00"]},"est_days_blocked":{"2021-12-21":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-2":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-25":"New Blocked Date","2022-1-31":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-3":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Omega","code":"DOC0092","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FXUz5F8KcUHrwiwj0HdBa%2FXUz5F8KcUHrwiwj0HdBa-1633576196448?alt=media&token=332fee57-e09f-48b9-b9fb-5692c51bc8cb","url":"klinik-omega","address":"No. 34, Jalan U1/36, Hicom Glenmarie Industrial Park","address2":" ","id":"XUz5F8KcUHrwiwj0HdBa","est_days":{"tue":true,"wed":true,"sun":false,"fri":true,"thu":true,"pub":false,"mon":true,"sat":true},"est_schedule":{"sun":["9.00","13.00","14.00","18.00"],"fri":["10.00","13.00","13.00","15.00"],"sat":["10.00","12.00","12.00","12.00"],"thu":["10.00","13.00","13.00","15.00"],"mon":["10.00","13.00","13.00","15.00"],"wed":["10.00","13.00","13.00","15.00"],"tue":["10.00","13.00","13.00","15.00"],"pub":["9.00","13.00","14.00","18.00"]},"est_days_blocked":{"2022-2-4":"New Blocked Date","2021-12-19":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-2":"New Blocked Date","2022-2-1":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-20":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Anis – Shah Alam","code":"DOC0064","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FTP2NGiLZx6Bfxzua5OvD%2FTP2NGiLZx6Bfxzua5OvD-1633424957445?alt=media&token=22b8d576-0b2a-48cb-a9ed-7b06526a153d","url":"klinik-anis--shah-alam","address":"17 Jalan Bunga Melur 2/18","address2":" ","id":"TP2NGiLZx6Bfxzua5OvD","est_days":{"thu":false,"sun":false,"wed":true,"tue":true,"sat":false,"fri":false,"pub":false,"mon":true},"est_schedule":{"mon":["10.00","13.00","13.00","15.00"],"tue":["10.00","13.00","13.00","15.00"],"pub":["9.00","13.00","14.00","18.00"],"sun":["9.00","13.00","14.00","18.00"],"fri":["9.00","13.00","14.00","18.00"],"sat":["9.00","13.00","14.00","18.00"],"thu":["9.00","13.00","14.00","18.00"],"wed":["10.00","13.00","13.00","15.00"]},"est_days_blocked":{"2022-2-4":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-18":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-1":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-2":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Catterall, Khoo And Raja Malek – Plaza Sentral","code":"DOC0145","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2Fp25zzFPA6l1iTzCpW8LH%2Fp25zzFPA6l1iTzCpW8LH-1633592862750?alt=media&token=2617c232-1fed-43ee-bd66-2a3eb683d0e1","url":"klinik-catterall-khoo-and-raja-malek--plaza-sentral","address":"Suite 3B-3-6, Level 3, Block 3B, Plaza Sentral, KL Sentral, Kuala Lumpur, Wilayah Persekutuan","address2":" ","id":"p25zzFPA6l1iTzCpW8LH","est_days":{"tue":true,"sun":false,"sat":false,"mon":true,"wed":true,"fri":true,"thu":true,"pub":false},"est_schedule":{"pub":["9.00","13.00","14.00","18.00"],"mon":["8.00","10.00","10.00","10.00"],"fri":["8.00","10.00","10.00","10.00"],"thu":["8.00","10.00","10.00","10.00"],"sat":["10.00","12.00","14.00","14.00"],"tue":["8.00","10.00","10.00","10.00"],"wed":["8.00","10.00","10.00","10.00"],"sun":["9.00","13.00","14.00","18.00"]},"est_days_blocked":{"2021-12-21":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-18":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Kumpulan Medic – Jalan Ampang","code":"DOC0103","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2F28GcQxLnj9fxheJsplxa%2F28GcQxLnj9fxheJsplxa-1633579031673?alt=media&token=e6e800e5-d6cf-4f2a-b30d-8e134c07a467","url":"kumpulan-medic--jalan-ampang","address":"Ground Floor, Bangunan Ghee Hong, 47, Jalan Ampang, Kuala Lumpur, Wilayah Persekutuan","address2":" ","id":"28GcQxLnj9fxheJsplxa","est_days":{"sun":false,"mon":true,"fri":true,"pub":false,"thu":true,"tue":true,"wed":true,"sat":true},"est_schedule":{"sat":["9.00","12.00","12.00","12.00"],"thu":["9.00","12.00","12.00","12.00"],"fri":["9.00","12.00","12.00","12.00"],"mon":["9.00","12.00","12.00","12.00"],"tue":["9.00","12.00","12.00","12.00"],"sun":["9.00","13.00","14.00","18.00"],"pub":["9.00","13.00","14.00","18.00"],"wed":["9.00","12.00","12.00","12.00"]},"est_days_blocked":{"2022-2-2":"New Blocked Date","2021-12-25":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-1":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-18":"New Blocked Date","2022-1-1":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Clinic @ Bangsar","code":"DOC0137","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FgLzAmaEjuVVC8dAe8F7P%2FgLzAmaEjuVVC8dAe8F7P-1633591998642?alt=media&token=2f5b43e6-15e8-4416-9ac3-572731f188c2","url":"clinic--bangsar","address":"Lot G116, Ground Floor, Bangsar Shopping Centre, 285 Jalan Maarof, Bukit Bandaraya, Kuala Lumpur, Wilayah Persekutuan","address2":" ","id":"gLzAmaEjuVVC8dAe8F7P","est_days":{"sun":false,"wed":true,"sat":false,"fri":true,"mon":true,"pub":false,"tue":true,"thu":true},"est_schedule":{"sat":["10.00","12.00","12.00","12.00"],"thu":["9.00","12.00","12.00","12.00"],"fri":["9.00","12.00","12.00","12.00"],"wed":["9.00","12.00","12.00","12.00"],"mon":["9.00","12.00","12.00","12.00"],"pub":["9.00","13.00","14.00","18.00"],"tue":["9.00","12.00","12.00","12.00"],"sun":["9.00","13.00","14.00","18.00"]},"est_days_blocked":{"2021-12-20":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-1":"New Blocked Date","2022-1-1":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-2":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Poliklinik Damai","code":"DOC0111","state":"Pahang","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2Fm3u4Eh5sn4gz826FSBRs%2Fm3u4Eh5sn4gz826FSBRs-1633582610049?alt=media&token=1d1902e2-d032-4750-99d3-ba1e4ffa9746","url":"poliklinik-damai","address":"P-20, Jalan Chui Yin, Bentong, Pahang","address2":" ","id":"m3u4Eh5sn4gz826FSBRs","est_days":{"fri":true,"mon":true,"wed":true,"thu":true,"tue":true,"sun":false,"pub":false,"sat":false},"est_schedule":{"fri":["8.00","15.00","15.00","17.50"],"sat":["10.00","14.00","14.00","15.00"],"thu":["8.00","15.00","15.00","17.50"],"pub":["6.00","13.00","14.00","18.00"],"tue":["8.00","15.00","15.00","17.50"],"sun":["10.00","12.00","12.00","12.00"],"mon":["8.00","15.00","15.00","17.50"],"wed":["8.00","15.00","15.00","17.50"]},"est_days_blocked":{"2022-1-31":"New Blocked Date","2022-2-1":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-25":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-3":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Ng Dan Lee – Pudu","code":"DOC0176","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FchskhkAkH2vZkpCz2uWe%2FchskhkAkH2vZkpCz2uWe-1633597096284?alt=media&token=d322dbd7-db02-4da5-b710-ff6f89350dc6","url":"klinik-ng-dan-lee--pudu","address":"462 & 464, Jalan Pudu","address2":" ","id":"chskhkAkH2vZkpCz2uWe","est_days":{"fri":true,"sun":false,"wed":true,"thu":true,"tue":true,"pub":false,"mon":true,"sat":true},"est_schedule":{"mon":["10.00","15.00","15.00","15.00"],"wed":["10.00","15.00","15.00","15.00"],"pub":["9.00","13.00","14.00","18.00"],"sat":["10.00","12.00","12.00","12.00"],"fri":["10.00","15.00","15.00","15.00"],"sun":["9.00","13.00","14.00","19.00"],"tue":["10.00","15.00","15.00","15.00"],"thu":["10.00","15.00","15.00","15.00"]},"est_days_blocked":{"2021-12-25":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-2":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-20":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-18":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Poliklinik Kumpulan City – Sri Petaling","code":"DOC0123","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FRzPTmIbvO0VEivN9g4mz%2FRzPTmIbvO0VEivN9g4mz-1633590188412?alt=media&token=13925922-d2f3-4db5-a19e-aba7bd7997d3","url":"poliklinik-kumpulan-city--sri-petaling","address":"26 Ground  Floor, Jalan Radin Anum, Bandar Baru Sri Petaling, Kuala Lumpur, Wilayah Persekutuan","address2":" ","id":"RzPTmIbvO0VEivN9g4mz","est_days":{"fri":true,"mon":true,"sat":true,"wed":true,"sun":false,"tue":true,"pub":true,"thu":true},"est_schedule":{"pub":["8.00","17.00","17.00","17.00"],"fri":["8.00","17.00","17.00","17.00"],"tue":["8.00","17.00","17.00","17.00"],"thu":["8.00","17.00","17.00","17.00"],"sat":["8.00","17.00","17.00","17.00"],"sun":["6.50","13.00","14.00","24.00"],"wed":["8.00","17.00","17.00","17.00"],"mon":["8.00","17.00","17.00","17.00"]},"est_days_blocked":{"2021-12-21":"New Blocked Date","2022-1-31":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Catteral, Khoo & Raja Malek – Menara CIMB","code":"DOC0143","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2F97lEKjGxsdAZ7boV1c8K%2F97lEKjGxsdAZ7boV1c8K-1633592616985?alt=media&token=03aff350-4e41-41be-a9a9-22f9380c5176","url":"klinik-catteral-khoo--raja-malek--menara-cimb","address":"Suite 3A-2, Level 3A, Menara CIMB, Jalan Stesen Sentral 2, KL Sentral, Kuala Lumpur, Wilayah Persekutuan","address2":" ","id":"97lEKjGxsdAZ7boV1c8K","est_days":{"pub":false,"fri":true,"sat":false,"thu":true,"wed":true,"sun":false,"tue":true,"mon":true},"est_schedule":{"wed":["8.00","10.00","10.00","10.00"],"pub":["9.00","13.00","14.00","18.00"],"tue":["8.00","10.00","10.00","10.00"],"mon":["8.00","10.00","10.00","10.00"],"sun":["9.00","13.00","14.00","18.00"],"thu":["8.00","10.00","10.00","10.00"],"sat":["9.00","13.00","14.00","18.00"],"fri":["8.00","10.00","10.00","10.00"]},"est_days_blocked":{"2021-12-19":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-20":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-25":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":1639756800,"est_limit_slot":{},"block_timeslot":" "},{"name":"Kumpulan Medic – Ampang Point","code":"DOC0080","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FjLVRi92yCtuDzXp2VccP%2FjLVRi92yCtuDzXp2VccP-1633502823181?alt=media&token=9c96ffc7-96a4-40c0-a017-f7047b88180c","url":"kumpulan-medic--ampang-point","address":"No 71-M, Jalan Mamanda 1, Ampang Point, Ampang, Selangor","address2":" ","id":"jLVRi92yCtuDzXp2VccP","est_days":{"wed":true,"tue":true,"pub":false,"thu":true,"mon":true,"fri":true,"sun":false,"sat":true},"est_schedule":{"fri":["10.00","13.00","13.00","15.00"],"thu":["10.00","13.00","13.00","15.00"],"pub":["9.00","13.00","14.00","18.00"],"wed":["10.00","13.00","13.00","15.00"],"tue":["10.00","13.00","13.00","15.00"],"sat":["10.00","12.00","14.00","14.00"],"mon":["10.00","13.00","13.00","15.00"],"sun":["8.50","12.00","14.00","14.00"]},"est_days_blocked":{"2022-2-2":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-1":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-18":"New Blocked Date","2022-1-31":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Aman – Georgetown","code":"DOC0129","state":"Pulau Pinang","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2Fd9UphGCbromBtXERrzAe%2Fd9UphGCbromBtXERrzAe-1633591009758?alt=media&token=67d4a922-4960-4d89-8203-903cfb9f51de","url":"klinik-aman--georgetown","address":"603, Jalan Datuk Keramat, Georgetown, Pulau Pinang","address2":" ","id":"d9UphGCbromBtXERrzAe","est_days":{"thu":true,"fri":true,"mon":true,"sat":true,"tue":true,"sun":false,"pub":false,"wed":true},"est_schedule":{"tue":["13.00","13.00","15.00","16.00"],"pub":["9.00","13.00","14.00","18.00"],"mon":["13.00","13.00","15.00","16.00"],"sat":["13.00","13.00","13.00","14.00"],"sun":["9.00","13.00","14.00","21.00"],"wed":["13.00","13.00","15.00","16.00"],"fri":["13.00","13.00","15.00","16.00"],"thu":["13.00","13.00","15.00","16.00"]},"est_days_blocked":{"2022-1-1":"New Blocked Date","2021-12-18":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-4":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-2":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Health Plus","code":"DOC0074","state":"Pulau Pinang","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FsSOK6TDkzCy3YXoaeeAM%2FsSOK6TDkzCy3YXoaeeAM-1633502102516?alt=media&token=c7dc905a-a814-4d45-aaa1-341e6afb51ce","url":"klinik-health-plus","address":"725-U, Jalan Sungai Dua","address2":" ","id":"sSOK6TDkzCy3YXoaeeAM","est_days":{"pub":false,"mon":true,"wed":true,"thu":true,"tue":true,"fri":true,"sun":false,"sat":true},"est_schedule":{"sat":["10.00","12.00","12.00","12.00"],"pub":["9.00","13.00","14.00","18.00"],"fri":["10.00","15.00","15.00","15.00"],"sun":["8.00","13.00","14.00","21.50"],"wed":["10.00","15.00","15.00","15.00"],"mon":["10.00","15.00","15.00","15.00"],"thu":["10.00","15.00","15.00","15.00"],"tue":["10.00","15.00","15.00","15.00"]},"est_days_blocked":{"2021-12-18":"New Blocked Date","2021-12-25":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-3":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-4":"New Blocked Date"},"bookings_advance":8,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Prime Care","code":"DOC0191","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FeNgwWiQKbwo5izViJecx%2FeNgwWiQKbwo5izViJecx-1633604553975?alt=media&token=e3275f32-1545-44e8-981d-1f160dd5a39f","url":"klinik-prime-care","address":"Lot 7, Wisma MCIS Annexe, Jalan Barat","address2":" ","id":"eNgwWiQKbwo5izViJecx","est_days":{"pub":false,"fri":true,"sat":true,"tue":true,"wed":true,"sun":false,"mon":true,"thu":true},"est_schedule":{"thu":["8.00","15.00","15.00","17.50"],"wed":["8.00","15.00","15.00","17.50"],"sun":["9.00","13.00","14.00","18.00"],"fri":["8.00","15.00","15.00","17.50"],"tue":["8.00","15.00","15.00","17.50"],"mon":["8.00","15.00","15.00","17.50"],"pub":["9.00","13.00","14.00","18.00"],"sat":["8.00","12.00","12.00","14.00"]},"est_days_blocked":{"2021-12-18":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date","2022-2-4":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-25":"New Blocked Date","2021-12-21":"New Blocked Date","2022-1-1":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Sentosa – Ampang","code":"DOC0110","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FoJwjUJBwbZtveGBRG749%2FoJwjUJBwbZtveGBRG749-1633580385156?alt=media&token=6a8bcfbf-edc9-423e-b737-7161eabafe8a","url":"klinik-sentosa--ampang","address":"No. 25, Jalan 11, Taman Putra","address2":" ","id":"oJwjUJBwbZtveGBRG749","est_days":{"fri":true,"pub":false,"thu":true,"sat":true,"wed":true,"sun":false,"mon":true,"tue":true},"est_schedule":{"wed":["10.00","13.00","13.00","15.00"],"pub":["9.00","13.00","14.00","18.00"],"fri":["10.00","13.00","13.00","15.00"],"sat":["10.00","13.00","13.00","15.00"],"tue":["10.00","13.00","13.00","15.00"],"mon":["10.00","13.00","13.00","15.00"],"thu":["10.00","13.00","13.00","15.00"],"sun":["8.50","13.00","13.00","19.00"]},"est_days_blocked":{"2022-1-31":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-19":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-2":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Catterall, Khoo And Raja Malek – Jalan Othman","code":"DOC0141","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FVT1HYD3eMl0Cg5ZGBIPA%2FVT1HYD3eMl0Cg5ZGBIPA-1633592443128?alt=media&token=93f1fd5a-88e1-4b2a-a86b-2b83e1992f41","url":"klinik-catterall-khoo-and-raja-malek--jalan-othman","address":"47 & 49 Jalan Othman, Petaling Jaya, Selangor","address2":" ","id":"VT1HYD3eMl0Cg5ZGBIPA","est_days":{"thu":true,"tue":true,"pub":false,"sat":true,"fri":true,"wed":true,"mon":true,"sun":false},"est_schedule":{"pub":["9.00","13.00","14.00","18.00"],"mon":["10.00","15.00","15.00","15.00"],"tue":["10.00","15.00","15.00","15.00"],"sat":["10.00","12.00","12.00","12.00"],"thu":["10.00","15.00","15.00","15.00"],"fri":["10.00","15.00","15.00","15.00"],"wed":["10.00","15.00","15.00","15.00"],"sun":["9.00","13.00","14.00","18.00"]},"est_days_blocked":{"2021-12-18":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-25":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-21":"New Blocked Date","2022-1-1":"New Blocked Date","2022-1-31":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Syed Alwi Dan Chandran – Kg Gajah","code":"DOC0199","state":"Pulau Pinang","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2F41Bz1UW5ysuZL2uJk4wh%2F41Bz1UW5ysuZL2uJk4wh-1633605975087?alt=media&token=cd9b3b02-c73b-41b8-86bc-38073588c525","url":"klinik-syed-alwi-dan-chandran--kg-gajah","address":"6466, Jalan Kampong Gajah","address2":" ","id":"41Bz1UW5ysuZL2uJk4wh","est_days":{"thu":true,"mon":true,"tue":true,"sun":false,"pub":false,"wed":true,"sat":true,"fri":true},"est_schedule":{"pub":["9.00","13.00","14.00","18.00"],"tue":["10.00","15.00","15.00","15.00"],"sat":["10.00","12.00","12.00","12.00"],"wed":["10.00","15.00","15.00","15.00"],"mon":["10.00","15.00","15.00","15.00"],"sun":["9.50","13.00","14.00","14.00"],"fri":["10.00","15.00","15.00","15.00"],"thu":["10.00","15.00","15.00","15.00"]},"est_days_blocked":{"2022-1-31":"New Blocked Date","2022-2-1":"New Blocked Date","2022-1-1":"New Blocked Date","2021-12-25":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-2":"New Blocked Date","2022-2-4":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Reddy Clinic","code":"DOC0208","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FSwDtPZ89U82A3l45BcpJ%2FSwDtPZ89U82A3l45BcpJ-1633590513854?alt=media&token=b556f423-891b-402f-9911-e4f797d5379b","url":"reddy-clinic","address":"121, Jalan Ipoh, Kuala Lumpur, Wilayah Persekutuan","address2":" ","id":"SwDtPZ89U82A3l45BcpJ","est_days":{"sun":false,"sat":false,"mon":true,"pub":false,"thu":true,"tue":true,"fri":true,"wed":true},"est_schedule":{"fri":["10.00","17.00","17.00","17.00"],"wed":["10.00","17.00","17.00","17.00"],"mon":["10.00","17.00","17.00","17.00"],"pub":["9.00","13.00","14.00","18.00"],"tue":["10.00","17.00","17.00","17.00"],"thu":["10.00","17.00","17.00","17.00"],"sun":["9.00","13.00","14.00","19.00"],"sat":["10.00","12.00","12.00","12.00"]},"est_days_blocked":{"2022-2-2":"New Blocked Date","2021-12-25":"New Blocked Date","2021-12-21":"New Blocked Date","2022-2-4":"New Blocked Date","2021-12-20":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-18":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-3":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Port Dickson","code":"DOC0178","state":"Negeri Sembilan","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FV3tExgDm0BZhryWnBrAV%2FV3tExgDm0BZhryWnBrAV-1633597361224?alt=media&token=ee8a36e4-e6d6-44c7-9254-0d742629243a","url":"klinik-port-dickson","address":"75-C, Jalan Lama,","address2":" ","id":"V3tExgDm0BZhryWnBrAV","est_days":{"pub":false,"tue":true,"sat":false,"fri":true,"mon":true,"thu":true,"wed":true,"sun":false},"est_schedule":{"thu":["9.00","15.00","15.00","18.00"],"fri":["9.00","15.00","15.00","18.00"],"wed":["9.00","15.00","15.00","18.00"],"sun":["8.50","13.00","14.00","14.00"],"tue":["9.00","15.00","15.00","18.00"],"sat":["10.00","12.00","12.00","12.00"],"pub":["9.00","13.00","14.00","18.00"],"mon":["9.00","15.00","15.00","18.00"]},"est_days_blocked":{"2021-12-18":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-19":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-25":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-20":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-3":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Klinik Dr Nur Ainita","code":"DOC0166","state":"Selangor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FcsiTeBKaTPVsa7JBg5t0%2FcsiTeBKaTPVsa7JBg5t0-1633596028294?alt=media&token=fdca0745-0aca-4e97-8d1a-264a3a0d2ccc","url":"klinik-dr-nur-ainita","address":"12A-1, Ground Floor, Jalan USJ 9/5A, Subang Business Centre, Subang Jaya, Selangor","address2":" ","id":"csiTeBKaTPVsa7JBg5t0","est_days":{"tue":true,"sat":false,"mon":true,"pub":false,"thu":true,"fri":true,"sun":false,"wed":true},"est_schedule":{"mon":["10.00","17.00","17.00","17.00"],"wed":["10.00","17.00","17.00","17.00"],"sat":["8.50","13.00","14.00","22.00"],"pub":["9.00","13.00","14.00","18.00"],"sun":["8.50","13.00","14.00","14.00"],"tue":["10.00","17.00","17.00","17.00"],"fri":["10.00","17.00","17.00","17.00"],"thu":["10.00","17.00","17.00","17.00"]},"est_days_blocked":{"2021-12-25":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-19":"New Blocked Date","2022-1-31":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-21":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Kumpulan Medic – KWSP","code":"DOC0066","state":"Kuala Lumpur","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2FKzEggiexq2mdi63Zxss0%2FKzEggiexq2mdi63Zxss0-1633490486885?alt=media&token=234ec86d-fd4f-42aa-ab85-06f614dae466","url":"kumpulan-medic--kwsp","address":"Lot Mz.05, Mezzanine Floor, Bangunan KWSP, No. 5, Jalan Raja Laut, Kuala Lumpur, Wilayah Persekutuan","address2":" ","id":"KzEggiexq2mdi63Zxss0","est_days":{"sun":false,"mon":true,"tue":true,"pub":false,"fri":true,"sat":true,"thu":true,"wed":true},"est_schedule":{"thu":["10.00","15.00","15.00","15.00"],"wed":["10.00","15.00","15.00","15.00"],"sun":["9.00","13.00","14.00","18.00"],"pub":["9.00","13.00","14.00","18.00"],"mon":["10.00","15.00","15.00","15.00"],"fri":["10.00","15.00","15.00","15.00"],"tue":["10.00","15.00","15.00","15.00"],"sat":["10.00","12.00","12.00","12.00"]},"est_days_blocked":{"2022-1-31":"New Blocked Date","2022-1-1":"New Blocked Date","2022-2-3":"New Blocked Date","2022-2-2":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-1":"New Blocked Date","2021-12-19":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-18":"New Blocked Date","2021-12-20":"New Blocked Date","2021-12-25":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "},{"name":"Poliklinik Puteri Dan Surgeri – Ulu Tiram","code":"DOC0127","state":"Johor","img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/establishment%2Fa4aoaQEg9Tu2rIB5Kree%2Fa4aoaQEg9Tu2rIB5Kree-1633590655400?alt=media&token=b7e0614a-7ed9-45f4-b962-2b70fa75c103","url":"poliklinik-puteri-dan-surgeri--ulu-tiram","address":"99, Jalan Cempedak, Taman Tiram Baru, Ulu Tiram, Johor","address2":" ","id":"a4aoaQEg9Tu2rIB5Kree","est_days":{"thu":true,"mon":true,"pub":true,"sat":true,"sun":true,"tue":true,"fri":true,"wed":true},"est_schedule":{"thu":["8.00","22.00","22.00","22.00"],"pub":["8.00","22.00","22.00","22.00"],"tue":["8.00","22.00","22.00","22.00"],"sat":["8.00","22.00","22.00","22.00"],"wed":["8.00","22.00","22.00","22.00"],"mon":["8.00","22.00","22.00","22.00"],"sun":["8.00","22.00","22.00","22.00"],"fri":["8.00","22.00","22.00","22.00"]},"est_days_blocked":{"2021-12-25":"New Blocked Date","2022-2-4":"New Blocked Date","2022-2-1":"New Blocked Date","2022-2-3":"New Blocked Date","2021-12-18":"New Blocked Date","2022-1-1":"New Blocked Date","2022-1-31":"New Blocked Date","2021-12-20":"New Blocked Date","2022-2-2":"New Blocked Date","2021-12-21":"New Blocked Date","2021-12-19":"New Blocked Date"},"bookings_advance":1,"est_close_start_date":" ","est_limit_slot":{},"block_timeslot":" "}];
  var prod_serv={"name":"Sinovac COVID-19 Vaccine","creator":"jcCPL2NfeBWm4YJA7ZTBEs7eouh2","estArr":["ROC03X4wS1y0SHln5SFy","Z2h0tMXkDqYQWtuaCaFy","UYqLc0pcUkMaptOpyiFH","2unZrYWd8mKo44RPMwEU","KyeZLEzBWYCCpmTf6qtF","GldqmmP0gDsIVK9p20pl","HuycvsNAlB2aqYfGDLnM","V81hIyHjV3HSs2tCtb71","zK1UETlQLaZNwqE6eM9g","HryZzQk4ntbdOBP7x3Fw","K7RTSabiM9O2oMYpRbeT","BtKDvxJtX4UhnM7QIshm","RZggA3QFTyucTX9gtxdk","qfkqzdvLj5WAemcnqq8J","3vixd5w4ArrPvuHHf5N6","4Seukv2q75JV5mmxTbrD","EsB6uYtC5rjwmMJUDZxd","oM8IeZZqP0wcK6kaMBu4","SxANbRawZsJT94nphWB5","SzAl2bR0Y8Bv3b06a0EW","ZGZlh5Xg9EhK2DLR4uHW","HUHAlXcHduIkiYvvDAzv","ovoGqU7VOEFw58wn7N2U","vIYUGwaCLk4OZ5Z3Bquv","7DgQ7KMqweZBhZADpR1j","j3TChJLYOh0IXHDZ2ehu","Vhl31AU4XO9iQ7LmoS2J","XUz5F8KcUHrwiwj0HdBa","TP2NGiLZx6Bfxzua5OvD","p25zzFPA6l1iTzCpW8LH","28GcQxLnj9fxheJsplxa","gLzAmaEjuVVC8dAe8F7P","m3u4Eh5sn4gz826FSBRs","chskhkAkH2vZkpCz2uWe","RzPTmIbvO0VEivN9g4mz","97lEKjGxsdAZ7boV1c8K","jLVRi92yCtuDzXp2VccP","d9UphGCbromBtXERrzAe","sSOK6TDkzCy3YXoaeeAM","eNgwWiQKbwo5izViJecx","oJwjUJBwbZtveGBRG749","VT1HYD3eMl0Cg5ZGBIPA","41Bz1UW5ysuZL2uJk4wh","SwDtPZ89U82A3l45BcpJ","V3tExgDm0BZhryWnBrAV","csiTeBKaTPVsa7JBg5t0","KzEggiexq2mdi63Zxss0","a4aoaQEg9Tu2rIB5Kree"],"timeSince":"5d ago","dateModified":1648610145814,"dateCreated":1633422125562,"manufacturer":"Sinovac","quantity_price":{"1":{"displayPrice":"RM200","price":200}},"language":"en","productId":"sinovac-covid-19-vaccine","price":200,"availability":true,"desc":"*This price is inclusive of service fee and disposables used during the vaccination <br><br>You are purchasing TWO doses of the Sinovac (CoronaVac) Covid-19 vaccination to be administered at the clinic you have chosen below. <br>                       Terms and conditions:                       <ol>                                       <li>This vaccine is suitable only for individuals aged 5 and above. </li>                         <li>This package is applicable only to individuals who have not been vaccinated for COVID-19 at all.</li>                         <li>You will need to print a copy of your booking confirmation which you will receive via email and produce it at the clinic.</li>                         <li>You confirm that you do not have a prior history of Severe Allergic Reactions, Neurological Conditions, or Uncontrolled Chronic Diseases. If you identify with any of these conditions, please refrain from making a booking online.</li>                         <li>Deposits are non refundable but transferable to another person in the event you cannot proceed for the vaccination. You will need to email DoctorOnCall at least 3 days in advance if you would like to transfer the booking</li>                       </ol>","content":{"dateModified":1646884607727,"metaTitle":"Sinovac COVID-19 Vaccine Malaysia - Protect Yourself With DoctorOnCall","metaKeyword":"sinovac vaccine malaysia,coronavirus vaccine, covid 19 vaccine","metaDesc":"The Sinovac vaccine is one of the COVID-19 vaccines that has been approved to be given as a booster dose by MOH. Get your Sinovac booster with DoctorOnCall now!","trans_link":{"ms":{"link":"vaksinasi-covid-19-sinovac","lang":"ms","category_link":"vaksin-covid-19"},"en":{"lang":"en","link":"sinovac-covid-19-vaccine","category_link":"covid-19-vaccine"}},"faq":[{"answer":"It works by exposing the body's immune system to dead viral particles to trigger an immune response without causing the disease.","question":"How does the Sinovac Vaccine work?"},{"answer":"The most common side effects are pain on the injection site, fatigue, headache, nausea, diarrhoea, cough, chills, sore throat, congestion, etc. Some uncommon side effects can be vomiting, fever, tremors and dizziness. Rare side effects include but aren’t limited to muscle spasms, constipation and abdominal distension, etc.","question":"What are the side effects of the Sinovac vaccine?"},{"question":"How many doses is the vaccine and how is it administered?","answer":"There are 2 doses given at an interval of 3 weeks"},{"answer":"Like the other approved vaccines, the Sinovac vaccine is considered halal by religious bodies. This was further confirmed by the Chinese ambassador to Malaysia.","question":"Is this vaccine halal certified?"},{"answer":"Yes, you can, but it’s recommended to consult your doctor before getting the vaccine.","question":"Can I take the Sinovac vaccine if I have comorbidities like high blood pressure or diabetes?"},{"question":"Does the vaccine work on the new Covid 19 variants?","answer":"There is no conclusive evidence yet, however, the Sinovac vaccine has shown effectiveness in countries where the delta variant is prevalent. More studies are underway to determine the efficacy against new variants."},{"question":"Is the Sinovac vaccine safe for pregnant and lactating women?","answer":"The WHO recommends the use of the Sinovac vaccine in pregnant and lactating women as the benefits outweigh the risks."},{"answer":"The Sinovac vaccine has a 51% efficacy against symptomatic infection and 100% efficacy against severe infection and hospitalization.","question":"How effective is this vaccine?"},{"answer":"The Malaysian government currently has given conditional approval for the use of Sinovac for children 5 years old and above. The vaccines are recommended to be prioritised for those without comorbidities, and those who are allergic or not suitable to get the other types of COVID-19 vaccines.","question":"Is the vaccine safe for children?"},{"question":"Who should not receive the Sinovac vaccine?","answer":"Individuals with a history of allergic reaction to vaccines, or other severe medical conditions should consult a doctor before receiving the vaccine."}]},"categoryURL":"covid-19-vaccine","order":1,"img":"https://firebasestorage.googleapis.com/v0/b/market-prod-c62e6.appspot.com/o/service_est%2Fsinovac-covid-19-vaccine%2Fsinovac-covid-19-vaccine-1642047993382?alt=media&token=59e3b952-552e-4a93-b7ab-8f22e29dc79a","quantity":1,"validity":"12 months","href":"covid-19-vaccine/sinovac-covid-19-vaccine","est":{"HuycvsNAlB2aqYfGDLnM":true,"tAnVeVl2ktCJmOr7Mwhy":false,"RZggA3QFTyucTX9gtxdk":true,"qfkqzdvLj5WAemcnqq8J":true,"RzPTmIbvO0VEivN9g4mz":true,"ePFNdTKEvciG0R6AmIR3":false,"3vixd5w4ArrPvuHHf5N6":true,"V81hIyHjV3HSs2tCtb71":true,"jzNHxPeLqqyRrNgz91ZU":false,"chskhkAkH2vZkpCz2uWe":true,"7DgQ7KMqweZBhZADpR1j":true,"ACSWfbpdoMkM0J0eHtMm":false,"3awSJrNjmkFbYwLK5hl2":false,"K7RTSabiM9O2oMYpRbeT":true,"HryZzQk4ntbdOBP7x3Fw":true,"SXVwf7Syx4IhBMv7zuWS":false,"gJet9vTYQ8x6P35VBnVj":false,"TP2NGiLZx6Bfxzua5OvD":true,"Vhl31AU4XO9iQ7LmoS2J":true,"csiTeBKaTPVsa7JBg5t0":true,"jLVRi92yCtuDzXp2VccP":true,"SwDtPZ89U82A3l45BcpJ":true,"eNgwWiQKbwo5izViJecx":true,"t8PFbymaGSe5xOxLttmu":false,"SzAl2bR0Y8Bv3b06a0EW":true,"XUz5F8KcUHrwiwj0HdBa":true,"ZGZlh5Xg9EhK2DLR4uHW":true,"V3tExgDm0BZhryWnBrAV":true,"zK1UETlQLaZNwqE6eM9g":true,"xUVP13HR5SKCEM0jVx0o":false,"gLzAmaEjuVVC8dAe8F7P":true,"ovoGqU7VOEFw58wn7N2U":true,"vFZSd14MkLXjeiUh6CAt":false,"0fH04omUhnkxGo9yiWOb":false,"KzEggiexq2mdi63Zxss0":true,"oJwjUJBwbZtveGBRG749":true,"dMYv7ztvKirCEqlmdhWB":false,"EsB6uYtC5rjwmMJUDZxd":true,"Z2h0tMXkDqYQWtuaCaFy":true,"aSyk14BGtpMV2diiHXet":false,"28GcQxLnj9fxheJsplxa":true,"qCNfjIXo0vmA1Eg280ug":false,"4Seukv2q75JV5mmxTbrD":true,"hSc7fBd7n9msN53stoPV":false,"2unZrYWd8mKo44RPMwEU":true,"97lEKjGxsdAZ7boV1c8K":true,"xCFYOM20boaCVt9Phc7n":false,"zYRB87frh2an1cyBwzFR":false,"VT1HYD3eMl0Cg5ZGBIPA":true,"KyeZLEzBWYCCpmTf6qtF":true,"a4nI7OwcSCVCM963HSqP":false,"M032L1aU4eaVQ57VtclI":false,"j3TChJLYOh0IXHDZ2ehu":true,"VFzPjvVMqVMcyl68KXzp":false,"KQ7tMUGxxUyt6yzslGK1":false,"jxK1VhhLDwtlYl7yBQS4":false,"41Bz1UW5ysuZL2uJk4wh":true,"sSOK6TDkzCy3YXoaeeAM":true,"d9UphGCbromBtXERrzAe":true,"m3u4Eh5sn4gz826FSBRs":true,"oM8IeZZqP0wcK6kaMBu4":true,"vIYUGwaCLk4OZ5Z3Bquv":true,"K5SGBrtYAypYJfC3aeON":false,"a4aoaQEg9Tu2rIB5Kree":true,"ROC03X4wS1y0SHln5SFy":true,"p25zzFPA6l1iTzCpW8LH":true,"LVvWGwFszpBYVyrAPitW":false,"mKNKfLEUsotNBBZN3SfU":false,"GldqmmP0gDsIVK9p20pl":true,"XOlTvctymXBeWrmeR1RL":false,"SxANbRawZsJT94nphWB5":true,"BtKDvxJtX4UhnM7QIshm":true,"UYqLc0pcUkMaptOpyiFH":true,"TUY91VSEngBmmizMc7HE":false,"HUHAlXcHduIkiYvvDAzv":true,"wwVQaod2xCFoEKDN2D2Y":false,"xsuOU7uu2etun9MNtvrN":false},"id":"sinovac-covid-19-vaccine","category":"COVID-19 Vaccine","title":"Sinovac Vaccine For Adults","url":"sinovac-covid-19-vaccine","displayPrice":"RM200","fulfilment":{"sendEmail":true,"count":1,"template":"booking_covid_email.html","emailSchedule":{"1":0},"value":{"0":1},"type":"voucher","emailTitle":"COVID-19 Sinovac Vaccination Booking Appointment Request","emailTitleSub":"COVID-19 Sinovac Vaccination Booking Appointment Request","appt_date_time":true}};

  //Get User location 
  //This function retrieve user location using HTML5 Geolocation codes
  function getLocation() {
    // console.log("phase 1");
    if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(userPosition);
      } else {
          console.log("Geolocation is not supported by this browser."); // TODO: Include BM
      }
  }

  //2. Assign lat&Lon to Lat1, Lon1 & send data to backend and receive response from backend
  var lat1 = "";
  var lon1 = "";
  function userPosition(position) {
      lat1 = position.coords.latitude;
      lon1 = position.coords.longitude;

      coord = { "lat1": lat1, "lon1": lon1 }
      if(lat1){
        id('location').setAttribute('disabled','true')
        id('state').setAttribute('disabled','true')
        id('loc-icon').style.visibility = 'visible'
        id('search-input').placeholder = 'Search By Clinic Name/Address'
        id('search-input-desc').innerText = 'Search By Clinic Name/Address'        
        getAddress(coord)
      }        
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            updateList(JSON.parse(lzw_decode(this.responseText)))
            console.log("here",JSON.parse(lzw_decode(this.responseText)))
            //console.log("success")
          }
      };
      xhttp.open("POST",subdir+"/vaccination-services/find-nearest-clinic", true);
      xhttp.setRequestHeader('Content-Type', 'application/json')
      xhttp.send(JSON.stringify(coord));
      // window.location.href=subdir+"/vaccination-services/paediatric-vaccines/paeds-at-home?longitude="+lon1+"&latitude="+lat1
  }

  function getAddress(input){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // console.log("here",JSON.parse(this.responseText))
          var item = JSON.parse(this.responseText)
          // console.log("item 0", item.results[0])
          // var taman = item.results[0].address_components[2].long_name
          // var postcode = item.results[0].address_components[6].long_name
          // var city = item.results[0].address_components[3].long_name
          // var state = item.results[0].address_components[4].long_name
          // var country = item.results[0].address_components[5].long_name
          id('search-input').value = item.results[0].formatted_address
          id('search-input').classList.add("input-overflow-elipsis")
          id('search-input').style.padding = "6px 40px 6px 12px"
          // id('search-input').setAttribute("disabled","true");
          //console.log("success")
        }
    };
    xhttp.open("POST",subdir+"/vaccination-services/convert-lat-long", true);
    xhttp.setRequestHeader('Content-Type', 'application/json')
    xhttp.send(JSON.stringify(input));
  }

  function allowGeoRedirect(){
    window.location.href=subdir+"/vaccination-services/paediatric-vaccines/paeds-at-home?longitude="+lon1+"&latitude="+lat1
    document.getElementById('geoAllowOverlay').style.display = "none"
    document.getElementById('geoAllowPopup').style.display = "none"
  }

  function closeGeoPopup(){
    document.getElementById('geoAllowOverlay').style.display = "none"
    document.getElementById('geoAllowPopup').style.display = "none"
  }

  // Decompress an LZW-encoded string
  // Decompress an LZW-encoded string
  function lzw_decode(s) {
      var dict = {};
      var data = (s + "").split("");
      var currChar = data[0];
      var oldPhrase = currChar;
      var out = [currChar];
      var code = 256;
      var phrase;
      for (var i=1; i<data.length; i++) {
          var currCode = data[i].charCodeAt(0);
          if (currCode < 256) {
              phrase = data[i];
          }
          else {
            phrase = dict[currCode] ? dict[currCode] : (oldPhrase + currChar);
          }
          out.push(phrase);
          currChar = phrase.charAt(0);
          dict[code] = oldPhrase + currChar;
          code++;
          oldPhrase = phrase;
      }
      return out.join("");
  }

  //Update clinic list and display them in order from nearest to furthest
  //update based on service chosen
  function updateList(input) {
    // console.log("ini list all input dah filtered by distance",input)
    var clinicListRow = document.getElementById("list-est")
    // create empty array for new div of the clinic details
    var clinicDiv = []
    //console.log(input)
    // loop the clinic list and push the whole div element into empty array
    for (var i = 0; i < input.length; i++) {
        clinicDiv.push(document.getElementById(input[i].url))
        //console.log(input[i].id)
        //console.log(document.getElementById(input[i].id+"-cont-"+serName))
    }
    //empty string for html new list of clinics
    var newClinicList = "";
    // loop the new clinic div element and return all the html element
    for(i=0; i<clinicDiv.length;i++){
      try {
        newClinicList+= clinicDiv[i].outerHTML
      }catch(e){
        console.log(e.message)
      }
    }

    if(input.length==0){
      try {
        newClinicList+= `<div class='col-12 not-found-near'>
          Sorry there are no clinics that serve your current location.<a href=""> Need help?</a>
          </div>`        
      }catch(e){
        console.log(e.message)
      }
    }
    //clear the whole row of old clinic list
    // replace empty row with new clinic list
    clinicListRow.innerHTML = "";
    clinicListRow.innerHTML = newClinicList
  }


  var index;
  function addSearch(){
    index = new FlexSearch();
    for(var i=0;i<items.length;i++){
      // console.log(items[i].title+" "+items[i].id)
      index.add(items[i].url,items[i].name+" "+items[i].code+" "+items[i].state+" "+items[i].address+" "+items[i].address2);
    }
  }

  function id(input){
    return document.getElementById(input)
  }

  function doSearch(){
    var term=id("search-input").value;
    if(term.length>2){
      index.search(term,function(result){
          console.log(result)
          var c=document.getElementsByClassName("featured-link")
          for(var i=0;i<c.length;i++){
            c[i].classList.add("hidden")
          }
          for(var j=0; j<result.length;j++){
            document.getElementById(result[j]).classList.remove("hidden")
          }
      })
    }else{
      var c=document.getElementsByClassName("featured-link")
      for(var i=0;i<c.length;i++){
        c[i].classList.remove("hidden")
      }
    }
  }

  function updateState(){
    id('search-input').value=id('state').value;
    id('location').value=""
    doSearch()
  }

  function updateClinic(){
    id('search-input').value=id('location').value;
    id('state').value="";
    doSearch()
  }

  var quantity_input=1;
  // to change and pass the quantity price parameter
  function changeQuantityPrice(input){
    console.log(input.options[input.selectedIndex].value)
    quantity_input = input.options[input.selectedIndex].value
  }

  async function addToCart(estId,prodId,book_details){

    console.log("book_details",JSON.stringify(book_details))
    //Check for existing cart
    var cartId=false;
    var appt_details={}
    if(book_details){
      appt_details={
        year:book_details.year,
        mth:book_details.mth,
        date:book_details.date,
        hour:book_details.hour,
        minute:book_details.minute,
        timeslots:book_details.timeslots,
        fulldate:book_details.fulldate
      }
    }
    if(getCookie('bookings-cart')){
        cartId=getCookie('bookings-cart');
    }
    var body={
      estId:estId,
      prodId:prodId,
      appt_details:appt_details,
      quantity:quantity_input,
      cartId:cartId
    }
     var rawResponse = await fetch(subdir+serviceURL+'/cart/add', {
       method: 'POST',
       headers: {
         'Accept': 'application/json',
         'Content-Type': 'application/json'
       },
       body: JSON.stringify(body)
     });
     var content = await rawResponse.json();

     // console.log(content);
     if(content.status==200){
         if(cartId==false){
            // cartId=window.localStorage.setItem('bookings-cart',content.ref);
            setCookie('bookings-cart',content.ref,7) //7 days
         }
         setTimeout(function(){
           if(prod_serv.home_checkout){
            window.location.href=subdir+"/checkout?q=home"
           }else if(prod_serv.fast_checkout){
            window.location.href=subdir+"/checkout?q=fast"
           }else{
            window.location.href=subdir+"/checkout"
           }
         },250)
     }else{
       console.log("Error from system")
       alert("An error occured. Please contact us directly for urgent matters.")
     }
  }

  var setCookie=(c_name,c_value,exdays)=>{
   var exdate=new Date();
   exdate.setDate(exdate.getDate() + exdays);
   document.cookie=encodeURIComponent(c_name)
     + "=" + encodeURIComponent(c_value)
     + (!exdays ? "" : "; expires="+exdate.toUTCString())+';path=/';
     ;
  }

  var getCookie = (name) => (
    document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)')?.pop() || ''
  )

  function autoClick(){
    //Automatically select if only one option
    var ele=document.getElementsByClassName("featured-card")
    if(ele.length==1){
       ele[0].click()
    }
  }

  //check for url parameter (customer coming from medicine)
  //auto click clinic to show timeslot
  function checkURLParam(){
    let curr_url = window.location.href
    for(var i=0;i<items.length;i++){
      if(curr_url.indexOf(items[i].url)>=0){
        document.getElementById(items[i].url).click()
        break;
      } 
    }
  }

  //reset quantity selected if user click back button on the browser
  function reset_options() {
    try{
      document.getElementById('quantity-prod').selectedIndex = 0;
    }catch(e){}    
    return true;
  }

  document.addEventListener("DOMContentLoaded", function() {
    if(prod_serv.productId != "paeds-at-home"){
    autoClick()
    }
    try{
      if(prod_serv.productId == "paeds-at-home"){
        getLocation()
      }
    }catch(e){}
    checkURLParam()
    setTimeout(function(){
      addSearch()
    },3000)
  });
</script>


</html>

<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "covac";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
    }
if(isset($_POST['submit']))
{    
     $date = $_POST['date'];
     $time = $_POST['time'];
     $phoneno = $_POST['phoneno'];
     $location = $_POST['location'];
     $sql = "INSERT INTO appointment (date,time,phoneno,location)
     VALUES ('$date','$time','$phoneno','$location')";
     if (mysqli_query($conn, $sql)) {
      echo '<script> alert("recorded!")</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>