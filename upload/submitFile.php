<?php

function SubmitFile(){
  $awsAccessKey = "AKIAIYIUDH5EBUSMNLTQ"; $awsSecretKey = "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"; $bucketName = "usmarwaybs";
  require("S3.php");
  $s3 = new S3($awsAccessKey, $awsSecretKey);


  if (!isset($_FILES['cafeImage']['error'])
  || ($_FILES['cafeImage']['error'] != UPLOAD_ERR_OK) ){
               echo 'Error uploading file.';
  return; }

  $finfo = new finfo(FILEINFO_MIME_TYPE);
  if ($finfo->file($_FILES['cafeImage']['tmp_name']) === "image/jpeg"
  ){
  $fileextension = "jpg";
  } else {
  echo 'Uploaded file was not a valid image.'; return;
  }

  $filehash = sha1_file($_FILES['cafeImage']['tmp_name']);
  $filename = $filehash . "." . $fileextension;

  $ok = $s3->putObjectFile($_FILES['cafeImage']['tmp_name'],
                                    $bucketName,
                                    $filename,
                                    S3::ACL_PUBLIC_READ);

  if ($ok) {
  // $url = 'http://' . $bucketName .'.s3-website-us-east-1.amazonaws.com/' . $filename;
  $url = 'https://s3.amazonaws.com/' . $bucketName . '/' . $filename;

  // echo '<p>File upload successful: <a href="' . $url . '">' . $url . '</a></p><img src="' . $url . '" />';
  return $url;

  } else {
  // echo 'Error uploading file.';
  return "Invalid Upload";
  }
}
