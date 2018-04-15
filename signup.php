<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="index.html" method="post">
      <input type="text" name="" value="" placeholder="Display name">
      <input type="text" name="email" value="" placeholder="Password">
      <input type="text" name="" value="" placeholder="E-mail">
      <input type="text" name="" value="Biography">
      <button type="button" name="btnSignUp">Let's eat!</button>
    </form>
    <?php
      $_SESSION['dispName'];
      $_SESSION['pswd'];
      $_SESSION['email'];
      $_SESSION['bio'];
    ?>
  </body>
</html>
