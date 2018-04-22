<?php
  $t = htmlspecialchars($_POST["t"]);

  include 'dbconn.php';

  $stmt = $pdo->query("select ingredientID, ingredientName from ingredients where ingredientName like '".$t."%'");
  foreach ($stmt as $row) {
    echo $row["ingredientID"].",".$row["ingredientName"].",";
  }
?>
