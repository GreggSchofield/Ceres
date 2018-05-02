<!-- This is a page that will allow the client to change/update their
     biometric information.


    Created: 24/04/18
    Author[s]: Gregg Schofield -->

    <?php
      include 'sessionCookieHandlerLib';
      include 'userCredentialsValidationLib';

      start_session();
    ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ceres || Calculate Metrics</title>
  </head>
  <body>
    <?php
      if (isset($_POST['height']) && isset($_POST['weight']) && isset($_POST['lvlOfAct'])) {
        if (validateHeight($_POST['height'])) {
          if (validateWeight($_POST['weight'])) {
            if (validateActivityLevel($_POST['lvlOfAct'])) {
              updateBiometrics($_POST['height'], $_POST['weight'], $_POST['lvlOfAct']);
              echo "<p>You have successfully updated your Displayname!</p>";
            } else {
                echo "Ensure that you have level of activity is correct!";
            }
          } else {
              echo "Ensure that you have weight is correct!";
          }
        } else {
            echo "Ensure that you have height is correct!";
        }
      } else {
          echo "<p>Ensure that all fields are completed.</p>";
      }
    ?>
    <div class="">
      <form class="" action="index.html" method="post">
        <input type="height" name="height" placeholder="Height (m)" required><br>
        <input type="weight" name="weight" placeholder="Weight (kg)" required><br>
        <input type="range" name="lvlOfAct" min="1" max="50" value="25" required><br>
        <input type="submit" name="button" value="Change/Update">
      </form>
    </div>
  </body>
</html>
