<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
  </head>
  <?php
    if (isset($_POST["txtDisplayName"])) {
      include 'dbconn.php';
      $displayName = htmlspecialchars($_POST["txtDisplayName"]);
      $password = htmlspecialchars($_POST["txtPassword"]);
      $email = htmlspecialchars($_POST["txtEmail"]);
      $_POST = array();
      $error = false;
//      echo "<p>".$displayName.", ".$password.", ".$email."</p>\n<br>\n";

      $query = "select email from users where email='".$email."';";
      $stmt = $pdo->query($query);
      $stmt = $stmt->fetch()["email"];
      if (count($stmt) != 0) {
        $error = true;
        echo "<b>There is already an account registered to that email address</b>\n<br>\n";
      }

      $query = "select displayName from users where displayName='".$displayName."';";
      $stmt = $pdo->query($query);
      $stmt = $stmt->fetch()["displayName"];
      if (count($stmt) != 0) {
        $error = true;
        echo "<b>That username is already taken</b>\n<br>\n";
      }

      if ($displayName == "" || $password == "" || $email == "") {
        $error = true;
        echo "<b>Please enter all the required information</b>\n<br>\n";
      }

      if (!$error) {
        $query = "insert into users (email, password, displayName) value ('".$email."', '".$password."', '".$displayName."');";
        $stmt = $pdo->query($query);
        $stmt = $pdo->query("select last_insert_id();");
        $id = $stmt->fetch()["last_insert_id()"];
        $_SESSION["userid"] = $id;
        header("Location: homepage.php");
        die();
      }

    }
  ?>
  <body>
    <form class="" action="signup.php" method="post">
      <input type="text" name="txtDisplayName" value="" placeholder="Display name">
      <input type="text" name="txtPassword" value="" placeholder="Password">
      <input type="text" name="txtEmail" value="" placeholder="E-mail">
      <button type="submit" id="btnSignUp">Let's eat!</button>
    </form>
    <?php
      $_SESSION['dispName'];
      $_SESSION['pswd'];
      $_SESSION['email'];
      $_SESSION['bio'];
    ?>
  </body>
</html>
