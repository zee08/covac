<?php include('conn.php')?> 

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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    

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
  <form action="signup.php" method="POST">
  <?php include('errors.php'); ?>
    
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" require>
      <label for="floatingInput">Email address</label>
    </div>
  
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" require>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating">
      <input type="tel" class="form-control" id="floatingInput" name="phoneno"  placeholder="01233445566" require>
      <pattern="[0-9]{10,11}" title="please enter only numbers between 10 to 11 for mobile no."/>
      <label for="floatingInput">Phone number</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


    
  </body>
</html>
