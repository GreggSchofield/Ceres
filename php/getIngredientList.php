<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

  $t = htmlspecialchars($_POST["t"]);

  include 'dbconn.php';

  $stmt = $pdo->query("select ingredientID, ingredientName from ingredients where ingredientName like '".$t."%'");
  foreach ($stmt as $row) {
    echo $row["ingredientID"].",".$row["ingredientName"].",";
  }
?>
