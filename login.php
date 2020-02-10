<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <title>Werknemerloket.nl | Login</title>
  <meta charset="utf-8">
</head>

<body>
  <?php include('php/login.php') ?>
  <div class="login-page-wrapper">
    <div class="login-page-container-left">
      <div class="login-page-innercontainer">
        <h1>Welkom!</h1>
        <span>Login op werknemerloket & ontdek wat het te te bieden heeft!</span>
      </div>
    </div>


    <div class="login-page-container-right">
      <div class="form-container">
        <div class="form-top">
          <img class="form-logo" src="assets/images/logo.png" alt="">
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="InputEmail">Email</label>
            <input type="email" name="InputEmailadres" class="form-control" id="InputEmail" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="InputWachtwoord">Wachtwoord</label>
            <input type="password" name="InputWachtwoord" class="form-control" id="InputWachtwoord">
          </div>
          <span class="error"><?php echo $error; ?></span><br>
          <div class="form-group">
            <div class="checkbox">
              <label><input type="checkbox">Remember me</label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary ButtonSubmit">Log in</button>
          </div>
        </form>
        <div class="links">
          <a href="#">Wachtwoord vergeten?</a>
          <a href="#">Hulp nodig met inloggen?</a>
        </div>
      </div>
    </div>







  </div>
</body>

</html>
