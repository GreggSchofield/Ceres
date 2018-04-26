<!-- This is a page that will allow the client to update their password.


    Created: 24/04/18
    Author[s]: Gregg Schofield -->

<?php
  include 'redirect.php';
  include 'userCredentialsValidationLib.php';
  include 'queryLib.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta>
    <title>Ceres || Update Password</title>
  </head>
  <body>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<strong>Hello</strong>";
      }
    ?>
    <div class="">
      <form class="" action="updatePassword.php" method="post">
        <input type="password" name="curPass" placeholder="Current Password"><br>
        <input type="password" name="newPass" placeholder="New Password"><br>
        <input type="password" name="newPassReTy" placeholder="Retype New Password"><br>
        <button type="submit" name="buttonSubmit">Change/Update</button>
      </form>
    </div>
  </body>
</html>
