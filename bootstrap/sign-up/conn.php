<?php
session_start();

// initializing variables
$fullname = "";
$username = "";
$email    = "";
$password    = "";
$phoneno    = "";
$dateofbirth    = "";
$gender    = "";
$passport    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'covac');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $fullname = ($_POST['fullname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $phoneno = mysqli_real_escape_string($db, $_POST['phoneno']);
  
  $dateofbirth = mysqli_real_escape_string($db, $_POST['dateofbirth']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $passport = mysqli_real_escape_string($db, $_POST['passport']);

  

  // form validation
  
  if (empty($fullname)) { array_push($errors, "Fullname is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($phoneno)) { array_push($errors, "Password is required"); }
  if (empty($dateofbirth)) { array_push($errors, "Password is required"); }
  if (empty($gender)) { array_push($errors, "Password is required"); }
  if (empty($passport)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM signup WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  //register user if there are no errors in the form
  if (count($errors) == 0) {
  	

  	$query = "INSERT INTO signup (fullname, username, email, password, phoneno, dateofbirth, gender, passport) 
  			  VALUES('$fullname', '$username', '$email', '$password', '$phoneno', '$dateofbirth', '$gender', '$passport')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: signin.php');
  }
}

// ... 
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        
        $query = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: search.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  ?>