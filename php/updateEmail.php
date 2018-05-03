<?php
  include 'sessionCookieHandlerLib.php';
  include 'userCredentialsValidationLib.php';
  include 'queryLib.php';
  startSession();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta>
    <link rel="stylesheet" type="text/css" href="../css/Reset.css">
		<link rel="stylesheet" type="text/css" href="../css/MainStyle.css">
    <link rel="icon" href="../logo.jpeg">
    <title>Ceres || Update E-mail</title>
  </head>
  <body>
    <form id="return" action="homepage.php">
      <input type="submit" value="Return" />
    </form>
    <?php
      if (isset($_POST['newEmail']) && isset($_POST['newEmailReType'])) {
        if ($_POST['newEmail'] === $_POST['newEmailReType']) {
          updateEmailAddress($_POST['newEmail']);
          echo "<p>You have successfully updated your E-mail!</p>";
        } else {
          echo "<p>Ensure that your new E-mails match each other.</p>";
        }
      } else {
        echo "<p>Please enter your email address</p>";
      }
    ?>

    <div class="">
      <form class="" action="updateEmail.php" method="post">
        <input type="text" name="newEmail" placeholder="New E-mail"></input>
        <input type="text" name="newEmailReType" placeholder="Retype new E-mail"></input>
        <input type="submit" name="button" value="Change/Update">
      </form>
    </div>
  </body>
</html>
