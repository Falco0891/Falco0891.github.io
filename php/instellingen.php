<?php
$error = "";
session_start(); /*waarschijnlijk niet nodig*/
require_once 'dbconfig.php';
include 'user_session.php';

if(isset($_POST["modal-submit"])) {
  function safe($waarde) {
    $waarde = trim($waarde);
    $waarde = stripslashes($waarde);
    $waarde = htmlspecialchars($waarde);
    return $waarde;
  }

  $baanInput = safe($_POST["inputBaan"]);
  $woonplaatsInput = safe($_POST["inputWoonplaats"]);
  $geboorteInput = safe($_POST["inputDate"]);
  $geslachtInput = safe($_POST["inputGeslacht"]);
  $telefoonInput = safe($_POST["inputTelefoon"]);

  if ($baan == $baanInput && $woonplaats == $woonplaatsInput && $geboortedatum == $geboorteInput && $geslacht == $geslachtInput && $telefoonnummer == $telefoonInput) {
    header("Location: ../instellingen.php");
  } else {
    $query1 ="UPDATE users SET baan='$baanInput' WHERE id='$user_id'";
    $query2 ="UPDATE users SET woonplaats='$woonplaatsInput' WHERE id='$user_id'";
    $query3 ="UPDATE users SET geboortedatum='$geboorteInput' WHERE id='$user_id'";
    $query4 ="UPDATE users SET geslacht='$geslachtInput' WHERE id='$user_id'";
    $query5 ="UPDATE users SET telefoonnummer='$telefoonInput' WHERE id='$user_id'";
    $conn->query($query1);
    $conn->query($query2);
    $conn->query($query3);
    $conn->query($query4);
    $conn->query($query5);
    header("Location: ../instellingen.php");
  }
}



if(isset($_POST["name-submit"])) {
  function safe($waarde) {
    $waarde = trim($waarde);
    $waarde = stripslashes($waarde);
    $waarde = htmlspecialchars($waarde);
    return $waarde;
  }

  $voornaamInput = safe($_POST["FirstName"]);
  $achternaamInput = safe($_POST["LastName"]);

  if ($voornaam == $voornaamInput && $achternaam == $achternaamInput) {
    header("Location: ../instellingen.php");
  } else {
    $query1 ="UPDATE users SET voornaam='$voornaamInput' WHERE id='$user_id'";
    $query2 ="UPDATE users SET achternaam='$achternaamInput' WHERE id='$user_id'";
    $conn->query($query1);
    $conn->query($query2);
    header("Location: ../instellingen.php");
  }
}




if(isset($_POST["email-submit"])) {
  function safe($waarde) {
    $waarde = trim($waarde);
    $waarde = stripslashes($waarde);
    $waarde = htmlspecialchars($waarde);
    return $waarde;
  }
  $emailadresInput = safe($_POST["ChangeEmail"]);


  $sql_emailadres = "SELECT * FROM users WHERE emailadres = '$emailadresInput'";
  $res_emailadres = mysqli_query($conn, $sql_emailadres) or die(mysqli_error($conn));


if (mysqli_num_rows($res_emailadres) > 0) {
   echo "bestaat al";
 }
  else {
    $query ="UPDATE users SET emailadres='$emailadresInput' WHERE id='$user_id'";
    $conn->query($query);
    header("Location: ../instellingen.php");
  }
}



if(isset($_POST["password-submit"])) {
  function safe($waarde) {
    $waarde = trim($waarde);
    $waarde = stripslashes($waarde);
    $waarde = htmlspecialchars($waarde);
    return $waarde;
  }

  $huidigwachtwoordInput = safe($_POST["HuidigWachtwoord"]);
  $nieuwwachtwoordInput = safe($_POST["NieuwWachtwoord"]);
  $bevestigwachtwoordInput = safe($_POST["BevestigWachtwoord"]);

  if ($huidigwachtwoordInput == $wachtwoord && $nieuwwachtwoordInput == $bevestigwachtwoordInput) {
    $query ="UPDATE users SET wachtwoord='$nieuwwachtwoordInput' WHERE id='$user_id'";
    $conn->query($query);
    header("Location: logout.php");
  } elseif ($nieuwwachtwoordInput !== $bevestigwachtwoordInput) {
    header("Location: ../instellingen.php");
  }
  elseif ($huidigwachtwoordInput !== $wachtwoord) {
    header("Location: ../instellingen.php");
  }
}







if(isset($_POST["delete-submit"])) {
  function safe($waarde) {
    $waarde = trim($waarde);
    $waarde = stripslashes($waarde);
    $waarde = htmlspecialchars($waarde);
    return $waarde;
  }
  $emailadresInput = safe($_POST["DeleteEmail"]);
  if ($emailadres == $emailadresInput) {
    $sql ="DELETE FROM users WHERE id ='$user_id'";
    $conn->query($sql);
    header("Location: logout.php");
  } elseif ($emailadres !== $emailadresInput) {
    header("Location: ../instellingen.php");
  }
}

?>
