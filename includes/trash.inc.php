<?php
  include_once 'dbh.inc.php';
  session_start();
  $uid = $_SESSION['uid'];

  if (isset($_GET['filename'])){
    $filename = $_GET['filename'];
    $ext = $_GET['ext'];

    $sql = "INSERT INTO `trash` (`fileID`, `filename`, `ext`, `uid`) VALUES (NULL, '$filename', '$ext', '$uid')";
    if (!mysqli_query($conn, $sql)) {
      die('Error: ' . mysql_error());
    } else {
      header('Location: ../main.php?fileDelete=success&file='.$filename.'.'.$ext);
    }

    $sql = "DELETE FROM `files` WHERE `files`.`filename` = '$filename' AND `files`.`ext` = '$ext' AND `files`.`uid` = '$uid'";
    if (!mysqli_query($conn, $sql)) {
      die('Error: ' . mysql_error());
    } else {
      exit();
    }
  }
?>
