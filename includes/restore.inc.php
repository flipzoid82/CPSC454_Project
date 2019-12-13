<?php
  include_once 'dbh.inc.php';
  session_start();
  $uid = $_SESSION['uid'];

  if (isset($_GET['filename'])){
    $filename = $_GET['filename'];
    $ext = $_GET['ext'];

    $sql = "INSERT INTO `files` (`fileID`, `filename`, `ext`, `uid`) VALUES (NULL, '$filename', '$ext', '$uid')";
    if (!mysqli_query($conn, $sql)) {
      die('Error: ' . mysql_error());
    } else {
      header('Location: ../trash.php?fileRestore=success&file='.$filename.'.'.$ext);
    }

    $sql = "DELETE FROM `trash` WHERE `trash`.`filename` = '$filename' AND `trash`.`ext` = '$ext' AND `trash`.`uid` = '$uid'";
    if (!mysqli_query($conn, $sql)) {
      die('Error: ' . mysql_error());
    } else {
      exit();
    }
  }
?>
