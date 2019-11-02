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
    <meta charset="utf-8">
    <title>My Cloud</title>
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
          <form class="form-inline">
            <input class="form-control" type="search" placeholder="Search MyCloud" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </li>
        <li class="nav-item" style="padding-left:40em;">
          <form action="includes/logout.inc.php" method="post">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Logout
            </button>
          </form>
        </li>
      </ul>
    </nav>
    <!-- navbar END -->
    <!-- MAIN body BEGIN -->



    <!-- MAIN body END -->
    <!-- js scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
