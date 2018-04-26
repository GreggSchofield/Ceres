<!-- This is a page that will allow the client to update their display name.


    Created: 24/04/18
    Author[s]: Gregg Schofield -->

<?php
  require 'sessionCookieHandlerLib.php';
  require 'queryLib.php';
  require 'userCredentialsValidationLib.php';
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
      // Checks to see if all of the required fields are given values

      $newDispName = "";
      $newDispNameReType = "";

      if (isset($_POST["newDispName"])) {
        $newDispName = htmlspecialchars($_POST["newDispName"]);
      }
      if (isset($_POST["newDispNameReType"])) {
        $newDispNameReType = htmlspecialchars($_POST["newDispNameReType"]);
      }

      if (!isset($_POST['newDispName'])) {
          echo "<strong>You must enter your new display-name!</strong>";
      } elseif (!isset($_POST['newDispNameReType'])) {
          echo "<strong>You must re-type your new display-name!</strong>";
      }

      // Checks whether the two new display name inputs, namely newDispName and
      // newDispNameReType are strictly equal.
      if ($newDispName != $newDispName) {
        echo "<strong>It looks like these two new display-name's do not match!</strong>";
      }

      // Checks whether (one of the) new display names is valid. If so, then
      // the display-name is changed.
      if (!validateDisplayName($newDispName)) {
          echo "<strong>It looks like your new display-name is not valid</strong><br>
                <strong>Please enter a new one!</strong>";
      } else {
          updateDisplayName($newDispName);
          echo "<strong>Your display-name was successfully changed! Hello ",
               "".$newDispName."</strong>";
      }
    ?>

    <form class="" action="updateDisplayName.php" method="post">
      <input type="text" name="newDispName" placeholder="New display-name"></input>
      <input type="text" name="newDispNameReType" placeholder="Retype new display-name"></input>
      <input type="submit" name="buttonSubmit">Change/Update</input>
    </form>
  </body>
</html>
