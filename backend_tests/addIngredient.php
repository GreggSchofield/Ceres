<?php
  $name = htmlspecialchars($_GET["name"]);
  $calories = htmlspecialchars($_GET["calories"]);
  $protein = htmlspecialchars($_GET["protein"]);
  $fat = htmlspecialchars($_GET["fat"]);
  $sugar = htmlspecialchars($_GET["sugar"]);
  $fiber = htmlspecialchars($_GET["fiber"]);
  $carbs = htmlspecialchars($_GET["carbs"]);
  $contents = htmlspecialchars($_GET["contents"]);
  $db_hostname = "mysql";
  $db_database = "u6gs";
  $db_username = "u6gs";
  $db_password = "Password1";
  $db_charset = "utf8mb4";
  $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";

  $opt = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false
  );

  try {
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
    $stmt = $pdo->query("insert into ingredients (ingredientName, calories, protein, fat, sugar, fiber, carbohydrates, contentTags, weighting) values (".$name.", ".$calories.", ".$protein.", ".$fat.", ".$sugar.", ".$fiber.", ".$carbs.", ".$contents.", 1)");
  } catch (PDOException $e) {
    exit("PDO ERROR :".$e->getMessage()."<br>");
  }
?>
