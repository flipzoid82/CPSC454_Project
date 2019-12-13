<?php
  include_once 'dbh.inc.php';
  session_start();
  $uid = $_SESSION['uid'];

$sql = "DELETE FROM `trash` WHERE `trash`.`uid` = '$uid'";
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysql_error());
} else {
    header('Location: ../trash.php?AllfileDelete=success');
    exit();
}
?>
