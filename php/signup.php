<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'userCredentialsValidation.php';
  startSession();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ceres || Sign-up</title>
  </head>
  <?php
    if (isset($_POST["txtDisplayName"])) {

      // Checks whether the entered display name is valid. If so, it is stored
      // as a session variable, else, $error is set to true.
      if (validateDispName($displayName)) {
        $_SESSION['dispName'] = $displayName;
      } else { $error = true; }

      // Checks whether the entered email is valid. If so, it is stored
      // as a session variable, else, $error is set to true.
      if (validateEmail($email)) {
        $_SESSION['email'] = $email;
      } else { $error = true; }

      // Checks whether the entered password is valid. If so, a one-way hash
      // is created and this is stored as a session variable, else, $error is
      // set to true.
      if (validatePswd($password)) {
        $pswdhash = password_hash($password, PASSWORD_DEFAULT);
        $_SESSION['pswd'] = $password;
      } else { $error = true; }

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
    <?php
      // Checks is the user has entered any data into the fields. If so, then
      // this data is validated and the corresponding session superglobal's are
      // set.
      if (isset($_POST['dispName'])) {
        validateDispName($_POST['dispName']);
      } elseif (isset($_POST['pswd'])) {
          validatePswd($_POST['pswd']);
      } elseif (isset($_POST['email'])) {
          validateEmail($_POST['email']);
      } elseif (isset($_POST['bio'])) {
          validateBio($_POST['bio']);
      }

    ?>
    <!-- Form that allows the user to enter a display name, password, email and
         biography -->
    <form class="" action="index.html" method="post">
      <input type="text" name="input_disp_name" placeholder="Display name" required><br>
      <input type="text" name="input_pswd" placeholder="Password" required><br>
      <input type="text" name="input_email" placeholder="E-mail" required><br>
      <input type="text" name="input_bio" placeholder="Biography"><br>
      <button type="button" name="btnSignUp">Let's eat!</button>
    </form>
  </body>
</html>
