<?php
  if (isset($_GET['filename'])){
    $filename = $_GET['filename'];
    $ext = $_GET['ext'];
    $full = $filename.'.'.$ext;

    include_once 'dbh.inc.php';
    session_start();
    $uid = $_SESSION['uid'];

    // require '../vendor/autoload.php';
    // use Aws\S3\S3Client;
    //
    // $bucket = 'mycloudsecurebucket';
    // $keyname = $full;
    //
    // $s3 = new S3Client([
    //     'version' => 'latest',
    //     'region'  => 'us-west-2'
    // ]);
    // // Delete an object from the bucket.
    // $s3->deleteObject([
    //     'Bucket' => $bucket,
    //     'Key'    => $keyname
    // ]);

    $sql = "DELETE FROM `files` WHERE `files`.`filename` = '$filename' AND `files`.`ext` = '$ext' AND `files`.`uid` = '$uid'";
    if (!mysqli_query($conn, $sql)) {
      die('Error: ' . mysql_error());
    } else {
      header('Location: ../main.php?fileDelete=success&file='.$filename.'.'.$ext);
      exit();
    }
  }
?>
