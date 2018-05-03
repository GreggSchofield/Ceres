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
    <link rel= "stylesheet" type="text/css" href="../css/checkPassword.css">
    <link rel="icon" href="../logo.jpeg">
    <title>Ceres || Update Password</title>
  </head>
  <body>
    <script src="../js/checkPassword.js"></script>
    <form id="return" action="homepage.php">
      <input type="submit" value="Return" />
    </form>
    <?php
      if (isset($_POST['curPass']) && isset($_POST['newPass']) && isset($_POST['newPassReTy'])) {
        if ($_POST['newPass'] === $_POST['newPassReTy']) {
          if (loginAuthenticated($_POST['curPass'])) {
            updatePassword($_POST['newPass']);
            echo "<p>You have successfully updated your password!</p>";
          } else {
            echo "<p>Ensure that your current password is correct.</p>";
          }
        } else {
            echo "<p>Ensure that your new passwords match each other.</p>";
        }
      } else {
          echo "<p>Please enter your current password and your new password</p>";
      }
    ?>
    <div class="">
      <form class="" action="updatePassword.php" method="post">
        <input type="password" name="curPass" placeholder="Current Password" required></input>
        <input type="password" name="newPass" placeholder="New Password" required onkeyup="Checkpassword(this.value)"></input>
        <input type="password" name="newPassReTy" placeholder="Retype New Password" required></input>
        <input type="submit" name="button" value="Change/Update">
      </form>
    </div>
    <table border="0" cellpadding="0" cellspacing="0">
     <tr>
      <td id="pwd_Weak" class="pwd pwd_c"> </td>
      <td id="pwd_Medium" class="pwd pwd_c pwd_f"></td>
      <td id="pwd_Strong" class="pwd pwd_c pwd_c_r"> </td>
     </tr>
    </table>
  </body>
</html>
