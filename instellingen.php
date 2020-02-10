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
  <title>Werknemerloket.nl | Instellingen</title>
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
        <a href="instellingen.php" class="list-group-item list-group-item-active list-group-item-action">
          <div class="active-line"></div>
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
        <div class="card">

          <div class="card-header">
            <div class="card-titles">
              <h5 class="card-title">Persoonlijke gegevens</h5>
              <span class="card-title-description">Als u uw persoonlijke gegevens wilt bewerken of bekijken, klik dan op de onderstaande knop.</span>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <div class="col pl-0 d-flex">
                <button type="submit" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#PersoonlijkModal">Bekijk</button>
              </div>
            </div>
            <hr>
          </div>
          <div class="modal fade bd-example-modal-xl" id="PersoonlijkModal" tabindex="-1" role="dialog" aria-labelledby="PersoonlijkModal" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModal3Label">Persoonlijke gegevens</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <div class="form-group row mb-20">
                    <label for="customFile" class="col-md-12">Upload profielfoto</label>
                    <div class="col-md-12">
                      <div class="custom-file">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label font-weight-normal" for="customFile">Choose file</label>
                        <button type="submit" name="upload-submit" class="btn btn-primary mt-2 mb-3">Update</button>
                      </form>
                      </div>
                    </div>
                  </div>



                  <form action="php/instellingen.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row mb-20">
                      <label for="inputBaan" class="col-md-12">Baan</label>
                      <div class="col-md-12">
                        <input type="text" name="inputBaan" class="form-control" id="inputBaan" value="<?php echo $baan; ?>">
                      </div>
                    </div>
                    <div class="form-group row mb-20">
                      <label for="inputWoonplaats" class="col-md-12">Woonplaats</label>
                      <div class="col-md-12">
                        <input type="text" name="inputWoonplaats" class="form-control" id="inputWoonplaats" value="<?php echo $woonplaats; ?>">
                      </div>
                    </div>
                    <div class="form-group row mb-20">
                      <label for="inputDate" class="col-md-12">Geboortedatum</label>
                      <div class="col-md-12">
                        <input type="date" name="inputDate" class="form-control" id="inputDate" value="<?php echo $geboortedatum; ?>">
                      </div>
                    </div>
                    <div class="form-group row mb-20">
                      <label for="inputGeslacht" class="col-md-12">Geslacht</label>
                      <div class="col-md-12">
                        <select id="inputGeslacht" name="inputGeslacht" class="form-control" value="<?php echo $geslacht; ?>">
                          <option value="man" <?php if($geslacht=="man") echo 'selected="selected"'; ?>>Man</option>
                          <option value="vrouw" <?php if($geslacht=="vrouw") echo 'selected="selected"'; ?>>Vrouw</option>
                          <option value="overige" <?php if($geslacht=="overige") echo 'selected="selected"'; ?>>Overige</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputTelefoon" class="col-md-12">Telefoonnummer</label>
                      <div class="col-md-12">
                        <input type="number" name="inputTelefoon" class="form-control" id="inputTelefoon" value="<?php echo $telefoonnummer; ?>">
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="modal-submit" class="btn btn-primary">Update</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card-header pt-0">
            <div class="card-titles">
              <h5 class="card-title">Algemene informatie</h5>
              <span class="card-title-description">Door ons uw naam te laten weten, kunnen we onze ondersteuningservaring veel persoonlijker maken.</span>
            </div>
          </div>
          <div class="card-body">
            <form action="php/instellingen.php" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <div class="col-lg-2 col-md-6 col-sm-12 pl-0">
                  <label for="FirstName">Voornaam</label>
                  <input type="text" name="FirstName" class="form-control" id="FirstName" value="<?php echo $voornaam ?>">
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 pl-0">
                  <label for="LastName">Achternaam</label>
                  <input type="text" name="LastName" class="form-control" id="LastName" value="<?php echo $achternaam ?>">
                </div>
                <div class="col mt-3 pl-0 d-flex">
                  <button type="submit" name="name-submit" class="btn btn-primary">toepassen</button>
                </div>
              </div>
            </form>
            <hr>
          </div>

          <div class="card-header pt-0">
            <div class="card-titles">
              <h5 class="card-title">Account informatie</h5>
              <span class="card-title-description">Hier kunt u het e-mailadres wijzigen dat u op werknemerloket gebruikt.</span>
            </div>
          </div>
          <div class="card-body">
            <form action="php/instellingen.php" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <div class="col-lg-2 col-md-6 col-sm-12 pl-0">
                  <label for="Email">E-mail Address</label>
                  <input type="text" name="ChangeEmail" class="form-control" id="Email" value="<?php echo $emailadres ?>">
                </div>
                <div class="col mt-3 pl-0 d-flex">
                  <button type="submit" class="btn btn-primary" name="email-submit">aanpassen</button>
                </div>
              </div>
            </form>
            <hr>
          </div>
          <div class="card-header pt-0">
            <div class="card-titles">
              <h5 class="card-title">Verander Wachtwoord</h5>
            </div>
          </div>
          <div class="card-body">
            <form action="php/instellingen.php" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <div class="col-lg-2 col-md-6 col-sm-12 pl-0">
                  <label for="HuidigWachtwoord" style="white-space: nowrap;">Huidig Wachtwoord</label>
                  <input type="password" name="HuidigWachtwoord" class="form-control" id="HuidigWachtwoord">
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 pl-0">
                  <label for="NieuwWachtwoord" style="white-space: nowrap;">Nieuw Wachtwoord</label>
                  <input type="password" name="NieuwWachtwoord" class="form-control" id="NieuwWachtwoord">
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 pl-0">
                  <label for="BevestigWachtwoord" style="white-space: nowrap;">Bevestig Wachtwoord</label>
                  <input type="password" name="BevestigWachtwoord" class="form-control" id="BevestigWachtwoord">
                </div>
                <div class="col mt-3 pl-0 d-flex">
                  <button type="submit" class="btn btn-primary" name="password-submit">aanpassen</button>
                </div>
              </div>
            </form>
            <hr>
          </div>
          <div class="card-header pt-0">
            <?php   include 'php/login.php' ?>
            <div class="card-titles">
              <span class="card-title-description">We doen ons best om je een geweldige ervaring te bezorgen - we zijn triest om je te zien vertrekken.</span><br>
              <span class="card-title-description">Type uw emailadres over om verder te gaan.</span>
              <form class="mt-3" action="php/instellingen.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                <div class="col-lg-2 col-md-6 col-sm-12 pl-0">
                  <input type="email" class="form-control" id="DeleteEmail" name="DeleteEmail" placeholder="<?php echo $emailadres; ?>">
                </div>
                <div class="col pl-0 d-flex">
                  <button class="btn btn-danger" type="submit" name="delete-submit">Verwijder je account</button>
                </div>
              </div>
              </form>
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
  <script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  </script>
</body>

</html>
