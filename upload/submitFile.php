<?php

function SubmitFile(){
  // setting variables for AWS keys
  $awsAccessKey = "AKIAIYIUDH5EBUSMNLTQ"; $awsSecretKey = "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"; $bucketName = "usmarwaybs";
  // importing S3 library
  require("S3.php");
  //making an s3 object
  $s3 = new S3($awsAccessKey, $awsSecretKey);

  //checking if the image exists and giving an error if it doesn't
  if (!isset($_FILES['cafeImage']['error'])
  || ($_FILES['cafeImage']['error'] != UPLOAD_ERR_OK) ){
               echo 'Error uploading file.';
  return; }

  // Checking file info for the image to be uploaded to see if its a jpeg
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  if ($finfo->file($_FILES['cafeImage']['tmp_name']) === "image/jpeg"
  ){
  $fileextension = "jpg";
  } else {
  echo 'Uploaded file was not a valid image.'; return;
  }
  //creating a filehash to be the name of the file to be uploaded and setting that as the filename
  $filehash = sha1_file($_FILES['cafeImage']['tmp_name']);
  $filename = $filehash . "." . $fileextension;
  //uploading the file onto the S3 bucket using the s3 API
  $ok = $s3->putObjectFile($_FILES['cafeImage']['tmp_name'],
                                    $bucketName,
                                    $filename,
                                    S3::ACL_PUBLIC_READ);

  if ($ok) {

  $url = 'https://s3.amazonaws.com/' . $bucketName . '/' . $filename;

  //returning the URL to be put into the database
  return $url;

  } else {
  // echo 'Error uploading file.';
  return "Invalid Upload";
  }
}
