<!-- This is a page that will allow the client to update their email.


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
    <title>Ceres || Update E-mail</title>
  </head>
  <body>
    <?php
      // Checks to see if all of the required fields are given values
      if (!isset($_POST['newEmail'])) {
          echo "<strong>You must enter your new E-mail!</strong>";
      } elseif (!isset($_POST['newEmailReType'])) {
          echo "<strong>You must re-type your new E-mail!</strong>";
      }

      // Checks whether the two new E-mail's, namely newEmail and
      // newEmailReType are strictly equal.
      if (!$_POST['newEmail'] !=== $_POST['newEmailReType']) {
        echo "<strong>It looks like these two new E-mail's do not match!</strong>";
      }

      // Checks whether (one of the) new E-mail's are valid. If so, then
      // the Email is changed.
      if (!validateEmailAddress($_POST['newEmail'])) {
          echo "<strong>It looks like your new E-mail is not valid</strong><br>
                <strong>Please check whether this is correct!</strong>";
      } else {
          updateEmailAddress($_POST['newDispName']);
          echo "<strong>Your E-mail was successfully changed!</strong>";
      }
    ?>

    <div class="">
      <form class="" action="index.html" method="post">
        <input type="text" name="newEmail" placeholder="New E-mail"><br>
        <input type="text" name="newEmailReType" placeholder="Retype new E-mail"><br>
        <button type="submit" name="buttonSubmit">Change/Update</button>
      </form>
    </div>
  </body>
</html>
