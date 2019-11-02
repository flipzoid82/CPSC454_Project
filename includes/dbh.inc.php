<?php
// $dbServername = "us-cdbr-iron-east-05.cleardb.net";
// $dbUsername = "b7a37373778cd3";
// $dbPassword = "6e2329cb";
// $dbName = "heroku_ad3d2aecaa3717c";
// $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// $dbServername = "35.223.88.133";
// $dbUsername = "admin";
// $dbPassword = "admin";
// $dbName = "FuzzyFeatQuizzes";
// $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
// if (!$conn) {
//            die('Could not connect: ' . mysqli_error());
//        }


$dbServername = "localhost:8889";
$dbUsername = "admin";
$dbPassword = "admin";
$dbName = "MyCloud";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
           die('Could not connect: ' . mysqli_error());
       }
?>
