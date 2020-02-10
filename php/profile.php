<?php
    include_once("dbconfig.php");

    if (isset($_GET['id']))
    {
        $user_id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id='$user_id'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

          if($row = $result->fetch_assoc()) {
              echo '<div class="card mb-30">';
                echo '<div class="card-header rounded">';
                  echo '<div class="profile-background"></div>';
                  echo '<div class="profile-image">';
                    echo '<img src="'.$row["avatar"].'" width="100px" />';
                  echo '</div>';
                  echo '<div class="profile-name-container">';
                    echo '<span class="profile-name">'.$row["voornaam"].' ' .$row["achternaam"].'</span>';
                    echo '<span class="profile-name-under">'.$row["baan"].'</span>';
                  echo '</div>';
                echo '</div>';
          }
            echo '</div>';
        }
        else {
           echo "0 results";
        }
    }

    else {

        echo '<h2>Alle Members:</h2>';

        $sql = "SELECT * FROM users";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                echo '<hr />';
                echo '<table>';
                echo '<tr><td>ID:</td><td>'.$row["id"].'</td></tr>';
                echo '<tr><td>Firstname:</td><td>'.$row["achternaam"].'</td></tr>';
                echo '<tr><td>Lastname:</td><td>'.$row["emailadres"].'</td></tr>';
                echo '<tr><td>Country:</td><td>'.$row["permission"].'</td></tr>';
                echo '</table>';

            }
        }
        else {
           echo "0 results";
        }
    }


?>
