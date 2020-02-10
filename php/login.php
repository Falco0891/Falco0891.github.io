<?php
$error = "";
if (isset($_POST['submit'])) {
  $InputEmailadres = $_POST['InputEmailadres'];
  $InputWachtwoord = $_POST['InputWachtwoord'];
  if (!empty($InputEmailadres) && !empty($InputWachtwoord)) {
    require("dbconfig.php");
    function safe($waarde) {
      $waarde = trim($waarde);
      $waarde = stripslashes($waarde);
      $waarde = htmlspecialchars($waarde);
      return $waarde;
    }
    $emailadres = safe($_POST['InputEmailadres']);
    $wachtwoord = safe($_POST['InputWachtwoord']);
    $sql = "SELECT * FROM users WHERE emailadres = '".$emailadres."' AND BINARY wachtwoord = '".$wachtwoord."'";
    if ($result = $conn->query($sql)) {
        $aantal = $result->num_rows;
        if ($aantal == 1) {
          $user = $result->fetch_row();
          session_start();
          $_SESSION['user_id'] = $user[0];
          $_SESSION['ingelogd'] = true;
          header("Location: index.php");
        }
        else {
          $error = "Emailadres of wachtwoord onjuist";
        }
      }
    }
    elseif (empty($_POST['InputEmailadres']) || empty($_POST['InputWachtwoord'])) {
      $error = "Vul de verplichte velden in";
    }

  }
 ?>
