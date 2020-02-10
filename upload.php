<?php
session_start(); /*waarschijnlijk niet nodig*/
require_once 'php/dbconfig.php';
include 'php/user_session.php';

if (isset($_POST['upload-submit'])) {
  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg', 'jpeg', 'png');


  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 500000) {
        $fileNameNew = "profile".$user_id.".".$fileActualExt;
        $fileDestination = 'avatar/'.$fileNameNew;

        $sql = "UPDATE users SET avatar='$fileDestination' WHERE id='$user_id'";
        $conn->query($sql);

        move_uploaded_file($fileTmpName, $fileDestination);
        header("Location: instellingen.php?uploadsuccess");
      } else {
        echo "Your file is to big!";
      }
    } else {
      echo "There was an error uploading your file!";
    }
  } else {
    echo "You cannot upload files of this type!";
  }
}

 ?>
