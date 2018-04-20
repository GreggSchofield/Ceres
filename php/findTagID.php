<?php
  $name = htmlspecialchars($_POST["name"]);

  include 'dbconn.php';

  $stmt = $pdo->query("select tagID from tags where tagName=".$name);
  echo $stmt->fetch()["tagID"];
?>
