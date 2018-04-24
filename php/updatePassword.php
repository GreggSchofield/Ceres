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
      // Checks to see if all of the required fields are given values
      if (!isset($_POST['currentPassword'])) {
          echo "<strong>You must enter your current Password!</strong>";
      } elseif (!isset($_POST['newPassword'])) {
          echo "<strong>You must enter your new Password!</strong>";
      } elseif (!isset($_POST['newPasswordReType'])) {
          echo "<strong>You must re-type your new Password!</strong>";
      }

      // Checks to see if the entered current password is valid for the user
      if (!loginAuthenticated($_POST['currentPassword'])) {
        echo "<strong>It looks like your current password was incorrect!</strong>";
      }

      // Checks whether the two new password's, namely newPassword and
      // newPasswordReType are strictly equal.
      if (!$_POST['newPassword'] !=== $_POST['newPasswordReType']) {
        echo "<strong>It looks like these two new Password's do not match!</strong>";
      }

      // Checks whether (one of the) new password's are valid. If so, then
      // the Email is changed.
      if (!validatePassword($_POST['newPassword'])) {
          echo "<strong>It looks like your new Password is not valid</strong><br>
                <strong>Please check whether this is correct!</strong>";
      } else {
          updatePassword($_POST['newDispName']);
          echo "<strong>Your E-mail was successfully changed!</strong>";
      }
    ?>

    <div class="">
      <form class="" action="index.html" method="post">
        <input type="password" name="currentPassword" placeholder="Current Password"><br>
        <input type="password" name="newPassword" placeholder="New Password"><br>
        <input type="password" name="newPasswordReType" placeholder="Retype New Password"><br>
        <button type="submit" name="buttonSubmit">Change/Update</button>
      </form>
    </div>
  </body>
</html>
