<?php
  session_start();
  include 'php/user_session.php';
  if (!isset($_SESSION['ingelogd'])) {
    header("Location: login.php");
  } elseif ($permission !== "Admin") {
    header("Location: index.php");
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
  <title>Werknemerloket.nl | Beheren</title>
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
        <a href="account.php" class="list-group-item list-group-item-action">
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
            echo '<a href="beheren.php" class="list-group-item list-group-item-active list-group-item-action">';
            echo '<div class="active-line"></div>';
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
        <div class="card mb-20">
          <div class="card-header">
            <h4 class="card-title">Beheren</h4>
            <span class="card-title-description">Accounts beheren en permissions instellen.</span>
          </div>
          <div class="card-body">
            <button class="btn btn-primary" type="submit" name="button" data-toggle="modal" data-target=".bd-example-modal-lg">account aanmaken</button><br>
          </div>
        </div>


        <div class="card mb-20 pt-20">
          <div class="card-body">
            <?php
            //display all users
            include_once("php/dbconfig.php");


            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo '<div class="test">';
              echo '<table class="table ">';
              echo '<thead>';
              echo '<tr>';
              echo '<th>user id</th>';
              echo '<th>voornaam</th>';
              echo '<th>achternaam</th>';
              echo '<th>emailadres</th>';
              echo '<th>permission</th>';
              echo '<th class="text-right">actie</th>';
              echo '</tr>';
                while($row = $result->fetch_assoc()) {
                    $profile_id = $row["id"];
                    echo '</thead>';
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<td class="align-middle">'.$row["id"].'</td>';
                    echo '<td class="align-middle">'.$row["voornaam"].'</td>';
                    echo '<td class="align-middle">'.$row["achternaam"].'</td>';
                    echo '<td class="align-middle">'.$row["emailadres"].'</td>';
                    echo '<td class="align-middle">'.$row["permission"].'</td>';
                    echo '<td class="text-right">
                            <a href="php/beheren.php?delete='.$profile_id.'" class="btn btn-danger mr-2">'.'verwijderen'.'</a>
                            <a href="profile.php?id='.$profile_id.'" class="btn btn-primary">'.'naar profiel'.'</a>
                          </td>';
                    echo '<tr>';
                    echo '</tbody>';
                }
                echo '</table>';
                echo '</div>';
            }
            else {
               echo "0 results";
            }
            ?>
          </div>
        </div>



      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModal3Label">Account aanmaken</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="php/beheren.php" method="post" enctype="multipart/form-data">
              <div class="form-group row mb-20">
                <div class="col-lg-6 col-sm-12 p-0">
                <label for="inputVoornaam" class="col-md-12">Voornaam</label>
                <div class="col-md-12">
                  <input type="text" name="inputVoornaam" class="form-control" id="inputVoornaam">
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 p-0 mt-3 mt-lg-0">
              <label for="inputAchternaam" class="col-md-12">Achternaam</label>
              <div class="col-md-12">
                <input type="text" name="inputAchternaam" class="form-control" id="inputAchternaam">
              </div>
            </div>
              </div>
              <div class="form-group row mb-20">
                <label for="inputEmailAdres" class="col-md-12">E-mail Address</label>
                <div class="col-md-12">
                  <input type="email" name="inputEmailAdres" class="form-control" id="inputEmailAdres">
                </div>
              </div>
                <div class="form-group">
                  <label for="inputPermission" class="col-md-12">Permissions</label>
                  <div class="col-md-12">
                    <select id="inputPermission" name="inputPermission" class="form-control">
                      <option selected>Gebruiker</option>
                      <option>Admin</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="registreren-submit" class="btn btn-primary">aanmaken</button>
                </div>
            </form>
          </div>
          </div>
        </div>
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
