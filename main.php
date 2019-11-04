<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php
    session_start();
    $uid = $_SESSION['uid'];
    include_once 'includes/dbh.inc.php';
  ?>
  <meta charset="utf-8">
  <title>Log in</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
  <script src="https://kit.fontawesome.com/20a730513b.js" crossorigin="anonymous"></script>
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <meta charset="utf-8">
  <title>My Cloud</title>
</head>

<body>
  <!-- navbar BEGIN -->
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="main.php">
      <img src="img/cloud-logo.png" width="45" height="45" class="d-inline-block" alt="">
      My Cloud
    </a>
    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
      <li class="nav-item">
        <form class="form-inline">
          <!-- <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div> -->
          <input class="form-control" type="search" placeholder="Search MyCloud" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
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
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col align-self-center">
        <p style="float:right; padding-top:0.5em;">Logged in as <strong><i>@<?php echo $uid; ?></i></strong></p>
      </div>
    </div>
    <!-- Main File Container BEGIN -->
    <hr>
    <div class="row justify-content-center" style="padding-left:1em; padding-right:1em">
      <!-- File image and description container -->
      <?php
				$sql = "SELECT * FROM `files` WHERE `uid` = '$uid'";
				$result = mysqli_query($conn, $sql) or die(mysql_error());
				if(mysqli_num_rows($result) > 0) {
					$counter = 0;
					while ($row = mysqli_fetch_assoc($result)) {
            //Sets the file image icon
            if ($row['ext']=='png' || $row['ext']=='jpg' || $row['ext']=='jpeg' || $row['ext']=='gif') {
              $extImg = 'img/image.png';
            } elseif ($row['ext']=='txt') {
              $extImg = 'img/txt.png';
            } elseif ($row['ext']=='doc' || $row['ext']=='docx') {
              $extImg = 'img/docx.jpg';
            } elseif ($row['ext']=='xls' || $row['ext']=='xlsx') {
              $extImg = 'img/xlsx.jpg';
            } elseif ($row['ext']=='ppt' || $row['ext']=='pptx') {
              $extImg = 'img/pptx.jpg';
            } elseif ($row['ext']=='pdf') {
              $extImg = 'img/pdf.jpg';
            } elseif ($row['ext']=='zip' || $row['ext']=='rar' || $row['ext']=='tar' || $row['ext']=='7z') {
              $extImg = 'img/zip.png';
            } elseif ($row['ext']=='mpeg' || $row['ext']=='wmv' || $row['ext']=='mp4' || $row['ext']=='avi') {
              $extImg = 'img/video.png';
            } elseif ($row['ext']=='mp3' || $row['ext']=='wav' || $row['ext']=='aiff' || $row['ext']=='wma') {
              $extImg = 'img/audio.png';
            } else {
                $extImg = 'img/unknown.png';
            }

            $filename = $row['filename'];
            $ext = $row['ext'];

            echo '<div class="col 4">
              <div class="row">
                <div class="col 4 align-self-center" style="align-content:center">
                  <center><a href="https://cpcs454-mycloud-bucket.s3-us-west-2.amazonaws.com/'.$filename.'.'.$ext.'"><img src="'.$extImg.'" alt="" style="width:100px; height:120px"></center>
                </div>
              </div>
              <div class="row">
                <div class="col 4 align-self-center">
                  <center>'.$filename.'.'.$ext.'</a></center>
                </div>
              </div>
            </div>';
					}
				}else{
					echo '<div class="container md-auto">
    						<center><h3>You don\'t have any files in your MyCloud yet.</h3></center>
    						</div>';
				}
				?>
        <a href="https://cpcs454-mycloud-bucket.s3-us-west-2.amazonaws.com/android-chrome-512x512.png"></a>

      <!-- File image and description container END-->
    </div>
    <!-- Main File Container END -->
    <hr>
    <div class="row justify-content-center" style="padding-top:1em;">
      <div class="col-md-5 align-self-center">
        <form class="form-group" action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
            Select a File: <input type="file" name="myFile" required>
            <button class="btn btn-primary" type="submit">Upload</button>
        </form>
      </div>
    </div>
  </div>
  <!-- MAIN body END -->

  <!-- js scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
