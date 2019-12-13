<?php
	include_once 'dbh.inc.php';

	$first = $_POST[fname];
	$last = $_POST[lname];
  	$uid = $_POST[uid];
	$email = $_POST[email];
	$pwd = $_POST[password];
	$pwd2 = $_POST[password2];

	if ($pwd != $pwd2){
		header("Location: ../signup.php?signUp=passNotMatch");
		exit();
	}

	$sql = "SELECT * FROM `user` WHERE `UID` = '$uid' OR `email`='$uid'";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck > 0) {
		header("Location: ../signup.php?signUp=usernameOrEmailTaken");
		exit();
	} else {
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
	}
  	
?>
