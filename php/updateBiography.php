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
    <title>Ceres || Update Biography</title>
  </head>
  <body>
    <form id="return" action="homepage.php">
      <input type="submit" value="Return" />
    </form>
    <?php
      if (isset($_POST['newBio'])) {
        updateBiography($_POST['newBio']);
        echo "<p>You have successfully updated your biography!</p>";
      } else {
          echo "<p>Please fill in your bio</p>";
      }
    ?>

    <div class="">
      <form class="" id="bioForm" action="updateBiography.php" method="post">
        <textarea name="newBio" rows="8" cols="80" required form="bioForm"></textarea>
        <input type="submit" name="button" value="Change/Update"></input>
      </form>
    </div>
  </body>
</html>
