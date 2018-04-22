<!DOCTYPE html>
<html>
	<head>
		<title>Upload Image</title>
	</head>
	<body>
		<h1>Upload an image</h1>
		<!-- remember to replace action value below with the php file to be transferred to-->
		<form action="uploadImageTest.php" method="post" enctype="multipart/form-data">
    		Browse for image to upload
    		<!-- the file upload name will be 'fileToUpload'-->
    		<input type="file" name="fileToUpload" id="fileToUpload">
    		<input type="submit" value="Upload Image" name="submit">
		</form>
		<?php
			#requires "file_uploads = On" in the .ini file
			#this var needs to be replaced with the directory in which the file will be placed
			$uploadDir = "../images/";
			$uploadFile = $uploadDir . basename($_FILES['fileToUpload']['name']);
			$uploadCheck = 1;
			$errorCode = -1;
			$imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ". <br>";
			        $uploadOk = 1;
							$erroCode = 0;
			    } else {
			        echo "ERROR: not an image. <br>";
			        $uploadOk = 0;
							$erroCode = 1;
			    }
			}

			if ($_FILES["fileToUpload"]["size"] > 2097152) {
    			echo "ERROR: File too large, please try again with a smaller file. <br>";
    			$uploadCheck = 0;
					$erroCode = 2;
    	}

    	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
    			echo "ERROR: Unsupported file type, please try again with a jpeg or png file. <br>";
 					$uploadCheck = 0;
					$erroCode = 3;
    	}

    	if ($uploadOk == 0) {
    			echo "File not uploaded. Error ".$errorCode."<br>";
    	}
    	else {
    			if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadFile)) {
    				echo "File " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded. <br>";
    			} else {
    				echo "Unknown error uploading file. <br>";
    			}
    	}
		?>
	</body>
</html>
