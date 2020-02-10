<?php
$error = "";
require_once 'dbconfig.php';
if(isset($_POST["registreren-submit"])) {

  function safe($waarde) {
    $waarde = trim($waarde);
    $waarde = stripslashes($waarde);
    $waarde = htmlspecialchars($waarde);
    return $waarde;
  }

  $voornaamInput = safe($_POST["inputVoornaam"]);
  $achternaamInput = safe($_POST["inputAchternaam"]);
  $emailadresInput = safe($_POST["inputEmailAdres"]);
  $permissionInput = safe($_POST["inputPermission"]);

  $sql_emailadres = "SELECT * FROM users WHERE emailadres = '$emailadresInput'";
  $res_emailadres = mysqli_query($conn, $sql_emailadres) or die(mysqli_error($conn));

if (empty($_POST["inputVoornaam"]) || empty($_POST["inputAchternaam"]) || empty($_POST["inputEmailAdres"]) || empty($_POST["inputPermission"])) {
   $error = "Vul de verplichte velden in";
 }
 elseif (mysqli_num_rows($res_emailadres) > 0) {
   $error = "emailadres al in gebruik";
 }

 elseif (!empty($_POST["inputVoornaam"]) && !empty($_POST["inputAchternaam"]) && !empty($_POST["inputEmailAdres"]) && !empty($_POST["inputPermission"]) ) {
   $sql = "INSERT INTO users (voornaam, achternaam, emailadres, permission) VALUES ('$voornaamInput','$achternaamInput','$emailadresInput', '$permissionInput')";
   $conn->query($sql);
   header("Location: ../beheren.php");
  }
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  if ($id == 1 || $id == 2) {
    echo "Deze gebruiker kan niet verwijderd worden";
    header("refresh:2;url=../beheren.php");
  } else {
    $conn->query("DELETE FROM users WHERE id=$id") or die($conn->error());
    header("location: ../beheren.php");
  }
}



?>
