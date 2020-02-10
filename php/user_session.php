<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "werknemerloket";
$conn = mysqli_connect($servername, $username, $password, $dbname);
*/

require("dbconfig.php");


$id = $_SESSION['user_id'];


$result = mysqli_query($conn,"SELECT * FROM `users` WHERE id = '$id'");
$row = mysqli_fetch_array($result);

$user_id = $row['id'];
$voornaam = $row['voornaam'];
$achternaam = $row['achternaam'];
$emailadres = $row['emailadres'];
$wachtwoord = $row['wachtwoord'];
$permission = $row['permission'];
$telefoonnummer = $row['telefoonnummer'];
$woonplaats = $row['woonplaats'];
$geboortedatum = $row['geboortedatum'];
$geslacht = $row['geslacht'];
$baan = $row['baan'];
$avatar = $row['avatar'];
$created_at = $row['created_at'];
$volnaam = $voornaam . ' ' . $achternaam;

 ?>
