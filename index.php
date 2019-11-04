<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Log in</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
</head>

<body>
  <!-- navbar BEGIN -->
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">
      <img src="img/cloud-logo.png" width="45" height="45" class="d-inline-block" alt="">
      My Cloud
    </a>
    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
      <li class="nav-item">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" disabled>
          Log In
        </button>
      </li>
      <li class="nav-item" style="padding-left:5px;">
        <!-- Button trigger modal -->
        <form class="" action="signup.html" method="post">
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Sign Up
          </button>
        </form>
      </li>
    </ul>
  </nav>
  <!-- navbar END -->

  <!-- main body BEGIN -->
  <!-- Log in form BEGIN -->
  <div class="container" style="padding-top:150px; color:white;">
    <div class="row">
      <div class="col-md"></div>
      <div class="col-3" style="border: 1px solid white; border-radius: 10px; background-color: rgba(128, 128, 128, .75);">
        <form action="includes/login.inc.php" method="POST">
          <div class="form-group" style="padding-top:10px;">
            <label for="uid">Username or Email address</label>
            <input type="text" name="uid" class="form-control" placeholder="Enter username or email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
          </div>
          <button type="submit" class="btn btn-primary self-align-center">Log in</button>
          <small class="form-text" style="color:white; padding-bottom:10px;">Don't have an account yet? <a href="signup.html">Sign up here.</a></small>
        </form>
      </div>
      <div class="col-md"></div>
    </div>
  </div>
  <?php
    if (isset($_GET['login'])){
      if ($_GET['login']==='invalid_name_or_password') {
        echo '<center><p style="color:red">Invalid username or password!<br>Please try again.</p></center>';
      } else if ($_GET['login']==='accessDenied') {
        echo '<center><p style="color:red">You must login before accessing that page.</p></center>';
      }
    }
  ?>
  <!-- Log in form END -->
  <!-- main body END -->




  <!-- js scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
