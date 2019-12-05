<?php
session_start();
$user1 = $_SESSION['uid'];
include 'dbh.inc.php';

$user2 = mysqli_real_escape_string($conn, $_POST[username]);
$filename = $_GET['filename'].'.'.$_GET['ext'];

$sql = "SELECT * FROM user WHERE `UID`='$user2'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck < 1) {
  header("Location: ../main.php?share=invalid_username");
	exit();
} else {
  $sql = "INSERT INTO `shared` (`user1`, `file`, `user2`) VALUES ('$user1', '$filename', '$user2')";
  if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysql_error());
  }else{
  header('Location: ../main.php?share=success&file='.$filename.'&user='.$user2);
  exit();
  }
}
?>
