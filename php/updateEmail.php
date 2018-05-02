<!-- This is a page that will allow the client to update their email.


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
    <title>Ceres || Update E-mail</title>
  </head>
  <body>
    <?php
      if (isset($_POST['newEmail']) && isset($_POST['newEmailReType'])) {
        if ($_POST['newEmail'] === $_POST['newEmailReType']) {
          if (validateEmailAddress($_POST['newEmail'])) {
            updateEmailAddress($_POST['newEmail']);
            echo "<p>You have successfully updated your E-mail!</p>";
          } else {
              echo "<p>Ensure that your new e-mail is valid!</p>";
          }
        } else {
            echo "<p>Ensure that your new E-mails match each other.</p>";
        }
      } else {
          echo "<p>Ensure that all fields are completed.</p>";
      }
    ?>

    <div class="">
      <form class="" action="index.html" method="post">
        <input type="text" name="newEmail" placeholder="New E-mail"><br>
        <input type="text" name="newEmailReType" placeholder="Retype new E-mail"><br>
        <input type="submit" name="button" value="Change/Update">
      </form>
    </div>
  </body>
</html>
