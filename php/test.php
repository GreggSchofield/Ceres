<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ceres || Sign-up</title>
    <!-- Obviously this will eventually go into a PHP library called validation
         or something like that -->
    <?php
      public function validateDispName($param) {
        if (preg_match("/^[[:alnum:]]+([[:alnum:]]( )[[:alnum:]])*[alnum]+$/", $param)) {
          return true;
        } else {
            return false;
        }
      }
      public function validateDispName($param) {
        return false;
      }
      public function validateBio($prarm) {
        return false;
      }
      public function validatePassword($prarm) {
        return false;
      }
    ?>
  </head>
  <body>
    <?php
      if (isset($_POST['dispName']) && validateDispName($_POST['dispName'])) {
        $_SESSION['dispName'] = $_POST['dispName'];
      }
      if (isset($_POST['email']) && validateEmail($_POST['email'])) {
       $_SESSION['email'] = $_POST['email'];
      }
      if (isset($_POST['bio']) && validateBio($_POST['bio'])) {
       $_SESSION['bio'] = $_POST['bio'];
      }
      if (isset($_POST['pswd']) && validatePassword($_POST['pwsd'])) {
       $_SESSION['pswd'] = $_POST['pswd'];
      }
    ?>
    <form action="test.php" method="post">
      <input type="text" name="dispName" placeholder="Display name"><br>
      <input type="text" name="email" placeholder="Email"><br>
      <input type="text" name="bio" placeholder="Biography"><br>
      <input type="password" name="pswd" placeholder=""="Password"><br>
      <button type="submit" name="submit">Let's eat!</button>
    </form>
  </body>
</html>
