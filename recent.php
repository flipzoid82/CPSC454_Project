<?php
  session_start();

  include_once 'includes/dbh.inc.php';
  if (isset($_SESSION['uid'])){
    $uid = $_SESSION['uid'];
    $fname = $_SESSION['fname'];
  } else {
      // Redirect them to the login page
      header("Location: index.php?login=accessDenied");
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <script type='text/javascript>alert($message)'></script>
  <meta charset="utf-8">
  <title>Recent</title>
  <link rel="stylesheet" href="stylesheets/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
  <link rel="stylesheet" href="stylesheets/style.css">
  <script src="https://kit.fontawesome.com/20a730513b.js" crossorigin="anonymous"></script>
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <meta charset="utf-8">
  <!--  -->
</head>

<body>
  <style media="screen">
    a:link {
        text-decoration: none;
      }
    a:visited {
      text-decoration: none;
    }

    a:hover {
      text-decoration: none;
    }

    a:active {
      text-decoration: none;
    }
  </style>
  <!-- navbar BEGIN -->
  <nav class="navbar navbar-light" style="background-color: #e3f2fd; opacity:.9">
    <a class="navbar-brand" href="main.php">
      <img src="img/cloud-logo.png" width="45" height="45" class="d-inline-block" alt="">
      <p class="d-inline-block" style="font-family: 'Pacifico', cursive;">MyCloud</p>
    </a>
    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
      <li class="nav-item">
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
        <?php
          if (isset($_GET['fileUpload'])){
            $filename = $_GET['file'];
            if ($_GET['fileUpload']==='success') {
              echo '<center><p style="color:green; padding-top: 1em; font-weight: bold">'.$filename.' was successfully uploaded!</center>';
            }
          } else if (isset($_GET['share'])){
            $filename = $_GET['file'];
            $user = $_GET['user'];
            if ($_GET['share']==='success') {
              echo '<center><p style="color:green; padding-top: 1em">'.$filename.' was successfully shared with <strong>@'.$user.'</strong>!</center>';
            } else {
              echo '<center><p style="color:red; padding-top: 1em">The username you entered is not in MyCloud yet!</center>';
            }
          } else if (isset($_GET['fileDelete'])) {
            $filename = $_GET['file'];
            if ($_GET['fileDelete']==='success') {
              echo '<center><p style="color:red; padding-top: 1em; font-weight: bold">'.$filename.' was successfully moved to trash!</center>';
            }
          }
        ?>
        <p style="float:right; padding-top:0.5em;">Logged in as <strong><i>@<?php echo $uid; ?></i></strong></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-auto">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted"><?php echo $fname.'\'s Cloud'; ?></span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between">
              <span class="text-muted"><i class="fas fa-check-square"></i></span>
              <div>
                <h6 class="my-0">Priority</h6>
              </div>
              <span class="text-muted"> > </span>
            </li>
            <a href="main.php">
            <li class="list-group-item d-flex justify-content-between">
              <span class="text-muted"><i class="fas fa-cloud-upload-alt"></i></span>
              <div>
                <h6 class="my-0">MyCloud</h6>
              </div>
              <span class="text-muted"> > </span>
            </li>
            </a>
            <a href="shared.php">
            <li class="list-group-item d-flex justify-content-between">
              <span class="text-muted"><i class="fas fa-users"></i></span>
              <div>
                <h6 class="my-0">Shared with me</h6>
              </div>
              <span class="text-muted"> > </span>
            </li>
            </a>
          <li class="list-group-item d-flex justify-content-between" style="color: white; background-color:grey">
            <span class="text-muted"><i class="fas fa-history" style="color: white"></i></span>
            <div>
              <h6 class="my-0"><strong>Recent</strong></h6>
            </div>
            <span style="color: white"> > </span>
          </li>
          <a href="trash.php">
          <li class="list-group-item d-flex justify-content-between">
            <span class="text-muted"><i class="fas fa-trash-alt"></i></span>
            <div>
              <h6 class="my-0">Trash</h6>
            </div>
            <span class="text-muted"> > </span>
          </li>
          </a>
        </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search MyCloud">
              <div class="input-group-append">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
      </div>
      <div class="col" style="padding-left: 2em; padding-right: 2em">
        <!-- Main Files Container BEGIN -->
        <hr>
        <div class="row" style="padding-left:1em">
          <h3>Main Cloud</h3>
        </div>
        <hr>
        <div class="row justify-content-center">
          <!-- File image and description container -->
          <?php
            $counter = 0;
            $sql = "SELECT * FROM `files` WHERE `uid` = '$uid' ORDER BY `fileID` DESC";
            $result = mysqli_query($conn, $sql) or die(mysql_error());
            if(mysqli_num_rows($result) > 0) {
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

                echo '<div class="col">
                  <a data-toggle="modal" href="#fileModal'.$counter.'">
                  <div class="row">
                    <div class="col align-self-center" style="align-content:center">
                      <center><img src="'.$extImg.'" alt="" style="width:100px; height:100px"></center>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col align-self-center">
                      <center><p style="font-size:13px; color:#000">'.$filename.'.'.$ext.'<p></center>
                    </div>
                  </div>
                  </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="fileModal'.$counter.'" tabindex="-1" role="dialog" aria-labelledby="fileModal'.$counter.'Label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="fileModal'.$counter.'Label">What would you like to do?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col align-self-center" style="align-content:center">
                            <center><img src="'.$extImg.'" alt="" style="width:100px; height:100px"></center>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col align-self-center">
                            <center><p style="font-size:13px; color:#000; padding-top:0.5em">'.$filename.'.'.$ext.'<p></center>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float:left"><i class="fas fa-times-circle"></i></button>
                        <a href="includes/trash.inc.php?filename='.$filename.'&ext='.$ext.'" class="btn btn-primary btn-primary" role="button"><span class="text-muted"><i class="fas fa-trash-alt" style="color:#fff"></i></span></a>
                        <a class="btn btn-primary" data-toggle="collapse" href="#shareInput'.$counter.'" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="far fa-share-square"></i></a>
                        <a href="https://mycloudsecurebucket.s3-us-west-2.amazonaws.com/'.$filename.'.'.$ext.'" class="btn btn-primary btn-primary" role="button"><i class="fas fa-cloud-download-alt"></i></a>
                      </div>
                      <div class="collapse" id="shareInput'.$counter.'">
                        <div class="card card-body">
                        <form action="includes/shared.inc.php?filename='.$filename.'&ext='.$ext.'" method="POST">
                          <label for="username">Enter username to share with:</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input type="text" class="form-control" name="username" id="username" placeholder="username" aria-label="" aria-describedby="basic-addon2">
                              <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Share</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                ';
                $counter++;
              }
            }else{
              echo '<div class="container md-auto">
                    <center><h3>You don\'t have any files in your MyCloud yet.</h3></center>
                    </div>';
            }
            ?>
          <!-- File image and description container END-->
        </div>
        <!-- Main File Container END -->
        <hr>
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
