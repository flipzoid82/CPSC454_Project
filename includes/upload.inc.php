<?php
  include_once 'dbh.inc.php';
  session_start();
  $uid = $_SESSION['uid'];

  require '../vendor/autoload.php';
  use Aws\S3\S3Client;
  if (isset($_FILES['myFile'])) {
    $file_name = $_FILES['myFile']['name'];
    $tmp = explode('.', $file_name);
    $ext = end($tmp);
    $name = $tmp[0];
    $file_tmp = $_FILES['myFile']['tmp_name'];

    $bucket = 'cpcs454-mycloud-bucket';
    $keyname = $file_name;
    $keyID = 'AKIAQGIR226JT4C2AOGL';
    $secret = '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';

    $s3 = new Aws\S3\S3Client([
    			'region'  => 'us-west-2',
    			'version' => 'latest',
    			'credentials' => [
    				'key'    => $keyID,
    				'secret' => $secret
    			]
    		]);

    // Upload data.
    try {
        $result = $s3->putObject([
            'Bucket' => 'cpcs454-mycloud-bucket',
            'Key'    => $file_name,
            'SourceFile' => $file_tmp,
            'ACL'    => 'public-read',
        ]);
        //echo $result->get('ObjectURL');
    } catch (Aws\S3\Exception\S3Exception $e) {
        echo "There was an error uploading the file.\n";
        echo $e->getMessage();
    }

    //INSERT filename into DB
    $sql = "INSERT INTO `files` (`fileID`, `filename`, `ext`, `uid`) VALUES (NULL, '$name', '$ext', '$uid')";
    if (!mysqli_query($conn, $sql)) {
      die('Error: ' . mysql_error());
    } else {
      header("Location: ../main.php?fileUpload=success");
      exit();
    }
  } else {
    header("Location: ../main.php?fileUpload=no_file_chosen");
  }


?>
