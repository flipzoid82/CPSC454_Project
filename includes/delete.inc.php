<?php
  include_once 'dbh.inc.php';
  session_start();
  $uid = $_SESSION['uid'];

  if (isset($_GET['filename'])){
    $filename = $_GET['filename'];
    $ext = $_GET['ext'];
    $full = $filename.'.'.$ext;

    //AWS Credentials Redacted

    require '../vendor/autoload.php';
    use Aws\Exception\AwsException;
    use Aws\S3\S3Client;
    try {
        //Create a S3Client
        $s3Client = new S3Client([
            'region' => 'us-west-2',
            'version' => '2006-03-01'
        ]);
        $result = $s3Client->deleteObject([
            'Bucket' => $bucket,
            'Key' => $keyID,
        ]);
    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }

    $sql = "DELETE FROM `trash` WHERE `trash`.`filename` = '$filename' AND `trash`.`ext` = '$ext' AND `trash`.`uid` = '$uid'";
    if (!mysqli_query($conn, $sql)) {
      die('Error: ' . mysql_error());
    } else {
      header('Location: ../trash.php?fileDelete=success&file='.$filename.'.'.$ext);
      exit();
    }
  }
?>
