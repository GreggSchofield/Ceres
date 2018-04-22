<?php
  #requires "file_uploads = On" in the .ini file
  #this var needs to be replaced with the directory in which the file will be placed
//  $imageName = htmlspecialchars($_GET["name"]);
  $uploadDir = "../images/";
  $uploadFile = $uploadDir . basename($_FILES['fileToUpload']['name']);
  $uploadCheck = 1;
  $errorCode = -1;
  $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
//    echo "File is an image - " . $check["mime"] . ". <br>";
    $uploadOk = 1;
    $errorCode = 0;
  } else {
//    echo "ERROR: not an image. <br>";
    $uploadOk = 0;
    $errorCode = 1;
  }

  if ($_FILES["fileToUpload"]["size"] > 2097152) {
//    echo "ERROR: File too large, please try again with a smaller file. <br>";
    $uploadCheck = 0;
    $errorCode = 2;
  }

  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
//    echo "ERROR: Unsupported file type, please try again with a jpeg or png file. <br>";
    $uploadCheck = 0;
    $errorCode = 3;
  }

  if ($uploadOk == 0) {
//    echo "File not uploaded. Error ".$errorCode."<br>";
  }
  else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadFile)) {
//      echo "File " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded. <br>";
    } else {
//      echo "Unknown error uploading file. <br>";
    }
  }

  echo $errorCode;

?>
