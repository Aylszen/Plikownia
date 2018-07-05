<?php
session_start();
$target_dir = $_SESSION['startDirection']."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$_SESSION['alertsControl']=1;
$_SESSION['alertsMessage'];
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $_SESSION['alertsMessage']= "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $_SESSION['alertsMessage']= "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['alertsMessage']= "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $_SESSION['alertsMessage']= "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
   && $fileType != "gif" ) {
    $_SESSION['alertsMessage']= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION['alertsMessage']= $_SESSION['alertsMessage']." Your file was not uploaded.";
	header('Location: home.php');
	exit();
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //echo '<script>alert("Hello")</script>';
		$_SESSION['alertsMessage']="The file has been uploaded";
        header('Location: home.php');
    } else {
        $_SESSION['alertsMessage']= "Sorry, there was an error uploading your file.";
		header('Location: home.php');
    }

}
?>
