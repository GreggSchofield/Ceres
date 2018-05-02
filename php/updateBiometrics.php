<!-- This is a page that will allow the client to change/update their
     biometric information.


    Created: 24/04/18
    Author[s]: Gregg Schofield -->

<?php
  include 'sessionCookieHandlerLib.php';
  include 'userCredentialsValidationLib.php';
  include 'queryLib.php';
  start_session();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ceres || Calculate Metrics</title>
  </head>
  <body>
    <?php
      if (isset($_POST['height'] && validateHeight($_POST['height'])) {
        if (isset($_POST['weight'] && validateWeight($_POST['weight'])) {
          if (isset($_POST['lvlOfAct']) && validateActivityLevel($_POST['lvlOfAct'])) {
            updateBiometrics($_POST['height'], $_POST['weight'], $_POST['lvlOfAct']);
          }
        }
      }
    ?>
    <div class="">
      <form class="" action="index.html" method="post">
        <input type="height" name="height" placeholder="Height (m)" required><br>
        <input type="weight" name="weight" placeholder="Weight (kg)" required><br>
        <input type="range" name="lvlOfAct" min="1" max="50" value="25" required><br>
        <button type="button" name="">Submit</button>
      </form>
    </div>
  </body>
</html>
