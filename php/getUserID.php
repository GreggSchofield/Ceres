<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

  if (isset($_SESSION["userid"])) {
    echo $_SESSION["userid"];
  } else {
    echo -1;
  }
?>
