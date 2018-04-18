<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'userCredentialsValidation.php';
  startSession();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ceres || Sign-up</title>
  </head>
  <body>
    <?php
      // Checks is the user has entered any data into the fields. If so, then
      // this data is validated and the corresponding session superglobal's are
      // set.
      if (isset($_POST['dispName'])) {
        validateDispName($_POST['dispName']);
      } elseif (isset($_POST['pswd'])) {
          validatePswd($_POST['pswd']);
      } elseif (isset($_POST['email'])) {
          validateEmail($_POST['email']);
      } elseif (isset($_POST['bio'])) {
          validateBio($_POST['bio']);
      }

    ?>
    <!-- Form that allows the user to enter a display name, password, email and
         biography -->
    <form class="" action="index.html" method="post">
      <input type="text" name="input_disp_name" placeholder="Display name" required><br>
      <input type="text" name="input_pswd" placeholder="Password" required><br>
      <input type="text" name="input_email" placeholder="E-mail" required><br>
      <input type="text" name="input_bio" placeholder="Biography"><br>
      <button type="button" name="btnSignUp">Let's eat!</button>
    </form>
  </body>
</html>
