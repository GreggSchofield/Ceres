<!-- This is a page that will allow the client to change/update their
     biometric information.


    Created: 24/04/18
    Author[s]: Gregg Schofield -->

<?php
  session_start();
  include 'userCredentialsValidationLib.php';
  include 'queryLib.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ceres || Calculate Metrics</title>
  </head>
  <body>
    <div class="">
      <form class="" action="index.html" method="post">
        <input type="height" name="" placeholder="Height (m)" required><br>
        <input type="weight" name="" placeholder="Weight (kg)" required><br>
        <input type="range" min="1" max="50" value="25" required><br>
        <button type="button" name="">Submit</button>
      </form>
    </div>
  </body>
</html>
