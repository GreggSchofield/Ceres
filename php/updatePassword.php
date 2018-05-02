<!-- This is a page that will allow the client to update their password.


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
    <meta>
    <title>Ceres || Update Password</title>
  </head>
  <body>
    <?php
      if (isset($_POST['curPass']) && isset($_POST['newPass']) && isset($_POST['newPassReTy'])) {
        if ($_POST['newPass'] === $_POST['newPassReTy']) {
          if (loginAuthenticated($_POST['curPass'])) {
            if (validatePassword($_POST['newPass'])) {
              updatePassword($_POST['newPass']);
              echo "<p>You have successfully updated your password!</p>";
            } else {
                echo "<p>Ensure that your new password is valid!</p>";
            }
          } else {
            echo "<p>Ensure that your current password is correct.</p>";
          }
        } else {
            echo "<p>Ensure that your new passwords match each other.</p>";
        }
      } else {
          echo "<p>Ensure that all fields are completed.</p>";
      }
    ?>
    <div class="">
      <form class="" action="updatePassword.php" method="post">
        <input type="password" name="curPass" placeholder="Current Password" required><br>
        <input type="password" name="newPass" placeholder="New Password" required><br>
        <input type="password" name="newPassReTy" placeholder="Retype New Password" required><br>
        <input type="submit" name="button" value="Change/Update">
      </form>
    </div>
  </body>
</html>
