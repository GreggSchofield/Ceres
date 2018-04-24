<!-- This is a page that will allow the client to update their display name.


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
    <title>Ceres || Update Display-name</title>
  </head>
  <body>
    <?php
      // Checks to see if all of the required fields are given values
      if (!isset($_POST['newDispName'])) {
          echo "<strong>You must enter your new display-name!</strong>";
      } elseif (!isset($_POST['newDispNameReType'])) {
          echo "<strong>You must re-type your new display-name!</strong>";
      }

      // Checks whether the two new display name inputs, namely newDispName and
      // newDispNameReType are strictly equal.
      if (!$_POST['newDispName'] !=== $_POST['newDispNameReType']) {
        echo "<strong>It looks like these two new display-name's do not match!</strong>";
      }

      // Checks whether (one of the) new display names is valid. If so, then
      // the display-name is changed.
      if (!validateDisplayName($_POST['newDispName'])) {
          echo "<strong>It looks like your new display-name is not valid</strong><br>
                <strong>Please enter a new one!</strong>";
      } else {
          updateDisplayName($_POST['newDispName']);
          echo "<strong>Your display-name was successfully changed! Hello ",
               "$_POST['newDispName']</strong>";
      }
    ?>

    <div class="">
      <form class="" action="index.html" method="post">
        <input type="text" name="newDispName" placeholder="New display-name"><br>
        <input type="text" name="newDispNameReType" placeholder="Retype new display-name"><br>
        <button type="submit" name="buttonSubmit">Change/Update</button>
      </form>
    </div>
  </body>
</html>
