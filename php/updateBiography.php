<!-- This is a page that will allow the client to update their Biography.


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
    <title>Ceres || Update Biography</title>
  </head>
  <body>
    <?php
      // Checks if the client currently has a biography.
      if (!hasBio($_SESSION['email'])) {
        $bioString = '';
      } else {
          $bioString = getBioContents($_SESSION['email']);
      }

      // Now populate the textarea with the contents of the bio (if any)
      

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
        <textarea name="newBiography" rows="8" cols="80"></textarea>
        <button type="submit" name="buttonSubmit">Change/Update</button>
      </form>
    </div>
  </body>
</html>
