<?php
// $dbServername = "localhost:8889";
// $dbUsername = "admin";
// $dbPassword = "admin";
// $dbName = "FuzzyFeatQuizzes";
// $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	include_once 'dbh.inc.php';

	$first = $_POST[fname];
	$last = $_POST[lname];
  $uid = $_POST[uid];
	$email = $_POST[email];
	$pwd = $_POST[password];

  //Hashing the password
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	//Insert the user into the database
	$sql = "INSERT INTO `user` (`UID`, `fname`, `lname`, `email`, `password`) VALUES ('$uid', '$first', '$last', '$email', '$hashedPwd')";
	if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysql_error());
  }else{
	header("Location: ../index.php?signup=success");
	exit();
  }
?>
