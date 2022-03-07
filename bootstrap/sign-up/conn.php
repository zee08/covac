<?php
session_start();

// initializing variables
$email    = "";
$password    = "";
$phoneno    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'covac');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $phoneno = mysqli_real_escape_string($db, $_POST['phoneno']);
  

  
  // form validation
  
  
 
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($phoneno)) { array_push($errors, "enter phone number"); }

  
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM signup WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
  
    if ($user['email'] === $email) {
      echo'<script>alert("email exists")</script>';
    }
  }

  //register user if there are no errors in the form
  if (count($errors) == 0) {
  	

  	$query = "INSERT INTO signup ( email, password, phoneno) 
  			  VALUES('$email', '$password', '$phoneno')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: signin.php');
  }
}

// ... 
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        
        $query = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username=strstr($email,'@',true);;
          $_SESSION['success'] = "You are now logged in";
          header('location: search.php');
        }else {
          echo'<script>alert("wrong email or password")</script>';
        }
    }
  }
  
  ?>