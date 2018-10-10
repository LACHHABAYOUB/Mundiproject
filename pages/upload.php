<?php

if (!file_exists("uploads/logo/".$id_entreprise."/")) {
    mkdir("uploads/logo/".$id_entreprise."/", 0777, true);
}
else{
	require('fonction.php');
	$dir="uploads/logo/".$id_entreprise."/";
	clearDir($dir);
	mkdir("uploads/logo/".$id_entreprise."/", 0777, true);
}
$target_dir = "uploads/logo/".$id_entreprise."/";

$target_file = $target_dir . basename($_FILES["logo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit_cmp"])) {
    $check = getimagesize($_FILES["logo"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
		$error="File is not an image.";
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["logo"]["size"] > 100000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	$error="Sorry, your file is too large.";
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
	$error="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	if(empty($imageFileType)){
	unset ($error);
	$target_file=null;
	                         }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["logo"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
		$error="Sorry, there was an error uploading your file.";
    }
}
?>