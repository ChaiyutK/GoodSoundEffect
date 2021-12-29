<?php
require("../mysql/config.php");
$sound_id=$_REQUEST['sound_id'];
$types = $_REQUEST['types'];
//$filename=basename($_FILES["fileToUpload"]["name"]);
$filename=$_REQUEST['sound_name'];
$target_dir = "../Sound/";
$target_file = $target_dir . $sound_id . ".mp3";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = 0; 
  echo "<script>alert('Sorry, file already exists.');window.open('upload.php','_self')</script>";
}

// Allow certain file formats
if($imageFileType != "mp3") {
  $uploadOk = 0;
  echo "<script>alert('Sorry only for mp3.');window.open('upload.php','_self')</script>";
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $sql= "INSERT INTO `sound` VALUES ('$sound_id', '$filename', $types)";
    require("../mysql/connect.php");
    require("../mysql/unconnect.php");
    //echo "<script>alert('The file " . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])) . " has been uploaded.);window.open('index.php','_self')</script>";
    echo "<script>alert('Upload complete.');window.open('upload.php','_self')</script>";
    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "<script>alert('Sorry, there was an error uploading your file.');window.open('upload.php','_self')</script>";
    //echo "Sorry, there was an error uploading your file.";
  }
}
?>