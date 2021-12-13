<?php include('conn.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Sign up</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

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

    
    <!-- Custom styles for this template -->
    <link href="signup.css" rel="stylesheet">
  </head>
 
  <body class="text-center" 
  style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.6) 0%,rgba(255,255,255,0.3) 100%), 
  url(vac.jpg)">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" >
    <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">CoVac</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link active" aria-current="page" href="signup.php">Sign up</a>
        <a class="nav-link" href="signin.php">Login</a>
      </nav>
    </div>
  </header>
    
<main class="form-signin">
  <form action="signup.php" method="POST" >
  <?php include('errors.php'); ?>
  
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
    
    <div class="form-floating">
      <input type="text" name="fullname" class="form-control" id="floatingInput" placeholder="Full name">
      <label for="floatingInput" >Fullname</label>
    </div>

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
      <label for="floatingInput" >Username</label>
    </div>

    <div class="form-floating">
      <input type="email"  name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password"  name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
      <input type="text" name="phoneno" class="form-control" id="floatingInput" placeholder="Phone number">
      <label for="floatingInput" >Phone Number</label>
    </div>
    <div class="form-floating">
      <input type="date" name="dateofbirth" class="form-control" id="floatingInput" placeholder="date of birth">
      <label for="floatingInput" >Date of birth</label>
    </div>
    <div class="form-floating">
      <input type="text" name="gender" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Gender</label>
      
    </div>
    <div class="form-floating">
      <input type="text" name="passport" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword" >Passport/IC</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


    
  </body>
</html>
