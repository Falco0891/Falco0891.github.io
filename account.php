<?php
  session_start();
  include 'php/user_session.php';
  if (!isset($_SESSION['ingelogd'])) {
    header("Location: login.php");
  }
 ?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
  <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Werknemerloket.nl | Account</title>
  <meta charset="utf-8">
</head>

<body>
  <div class="d-flex" id="wrapper">
    <div id="sidebar-wrapper">
      <div class="sidebar-heading">
        <img class="sidebar-logo" src="assets/images/logo.png" alt="">
      </div>
      <div class="sidebar-profile">
        <div class="sidebar-profile-inner">
          <div class="sidebar-profile-image">
            <img src="<?php echo $avatar; ?>" alt="">
          </div>
          <div class="profile-name-container">
            <span class="profile-name"><?php echo $volnaam; ?></span>
            <span class="profile-name-under"><?php echo $baan; ?></span>
          </div>
        </div>
      </div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action">
          <i class="fas link-icon fa-th"></i>
          <span>Dashboard</span>
        </a>
        <a href="account.php" class="list-group-item list-group-item-active list-group-item-action">
          <div class="active-line"></div>
          <i class="fas link-icon fa-user-circle"></i>
          <span>Account</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <i class="fas link-icon fa-file-user"></i>
          <span>Werknemers</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <i class="fas link-icon fa-calendar-week"></i>
          <span>Afspraken</span>
        </a>
        <a href="instellingen.php" class="list-group-item list-group-item-action">
          <i class="fas link-icon fa-sliders-h"></i>
          <span>Instellingen</span>
        </a>
        <?php
          if ($permission == "Admin") {
            echo '<a href="beheren.php" class="list-group-item list-group-item-action">';
            echo '<i class="fas link-icon fa-tasks-alt"></i>';
            echo '<span>Beheren</span>';
            echo '</a>';
          }
         ?>
      </div>
    </div>
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light">
        <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-align-left"></i></button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="navbar-profile-image">
                  <img src="<?php echo $avatar; ?>" alt="">
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="php/logout.php">Uitloggen</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="card mb-30">
          <div class="card-header rounded">
            <div class="profile-background"></div>
            <div class="profile-image">
              <img src="<?php echo $avatar; ?>" alt="">
            </div>
            <div class="profile-name-container">
              <span class="profile-name"><?php echo $volnaam; ?></span>
              <span class="profile-name-under"><?php echo $baan; ?></span>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <div class="card-titles">
              <h5 class="card-title">Account</h5>
              <span class="card-title-description">Alleen u kunt het informatie hier beneden zien.</span>
            </div>
          </div>
          <div class="card-body"></div>
          <div class="card-footer"></div>
        </div>
      </div>

    </div>
  </div>
  <script src="js/jquery/jquery.min.js"></script>
  <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>

</html>
