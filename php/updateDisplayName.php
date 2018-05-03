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
    <title>Ceres || Update Display-name</title>
  </head>
  <body>
    <form id="return" action="homepage.php">
      <input type="submit" value="Return" />
    </form>
    <?php
      if (isset($_POST['newDispName']) && isset($_POST['newDispNameReType'])) {
        if ($_POST['newDispName'] == $_POST['newDispNameReType']) {
          updateDisplayName($_POST['newDispName']);
          echo "<p>You have successfully updated your display name!</p>";
        } else {
            echo "<p>Ensure that your new display names match each other.</p>";
        }
      } else {
          echo "<p>Please enter your new display name</p>";
      }
    ?>

    <form class="" action="updateDisplayName.php" method="post">
      <input type="text" name="newDispName" placeholder="New display-name"></input>
      <input type="text" name="newDispNameReType" placeholder="Retype new display-name"></input>
      <input type="submit" value="Change/Update"></input>
    </form>
  </body>
</html>
