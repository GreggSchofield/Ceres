<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ceres || Update-password</title>
  </head>
  <body>
    <?php
      if (isset($_POST['currentPass']) && isset($_POST['newPass']) &&
          isset($_POST['newPassRetype'])) {
            // Initially checks if the two new passwords are not equal.
            if ($_POST['newPass'] !== $_POST['newPassRetype']) {
              // In this event an error message should be shown and the script
              // should die or something?
            } elseif (/*The current password should match the password hash associated with the current user*/) {
                updatePassword($_POST['newPass']);
            } else {
                // In this event an error message should be shown and the script
                // should die or something?
            }
      }
    ?>
    <div class="">
      <form class="" action="index.html" method="post">
        <input type="password" name="currentPass" placeholder="Current password"><br>
        <input type="password" name="newPass" placeholder="New password"><br>
        <input type="password" name="newPassRetype" placeholder="Retype new password"><br>
        <button type="submit" name="buttonSubmit">Update</button>
      </form>
    </div>
  </body>
</html>
