<?php

  // $dbServername = "localhost:8889";
  // $dbUsername = "admin";
  // $dbPassword = "admin";
  // $dbName = "MyCloud";
  // $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
  //
  // if (!$conn) {
  //   die('Could not connect: ' . mysqli_error());
  // }


  $dbServername = "";
  $dbUsername = "";
  $dbPassword = "";
  $dbName = "";
  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

?>
