<?php
  include_once 'dbh.inc.php';
  session_start();
  $uid = $_SESSION['uid'];
  
  if (isset($_GET['filename'])){
    $filename = $_GET['filename'];
    $ext = $_GET['ext'];
    $full = $filename.'.'.$ext;

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

    $sql = "DELETE FROM `shared` WHERE `shared`.`file` = '$full' AND (`shared`.`user1` = '$uid' OR `shared`.`user2` = '$uid')";
    if (!mysqli_query($conn, $sql)) {
      die('Error: ' . mysql_error());
    } else {
      header('Location: ../shared.php?fileDelete=success&file='.$name.'.'.$ext);
      exit();
    }
  }
?>
