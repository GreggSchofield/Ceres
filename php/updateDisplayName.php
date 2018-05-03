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
    <title>Ceres || Update Display-name</title>
  </head>
  <body>
    <?php
      if (isset($_POST['newDispName']) && isset($_POST['newDispNameReType'])) {
        if ($_POST['newDispName'] === $_POST['newDispNameReType']) {
          updateDisplayName($_POST['newDispName']);
          echo "<p>You have successfully updated your Displayname!</p>";
        } else {
            echo "<p>Ensure that your new Displaynames match each other.</p>";
        }
      } else {
          echo "<p>Ensure that all fields are completed.</p>";
      }
    ?>

    <form class="" action="updateDisplayName.php" method="post">
      <input type="text" name="newDispName" placeholder="New display-name"></input>
      <input type="text" name="newDispNameReType" placeholder="Retype new display-name"></input>
      <input type="submit" value="Change/Update"></input>
    </form>
  </body>
</html>
