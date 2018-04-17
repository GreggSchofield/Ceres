<?php
  $t = htmlspecialchars($_GET["t"]);
  $db_hostname = "mysql";
  $db_database = "u6jg";
  $db_username = "u6jg";
  $db_password = "";
  $db_charset = "utf8mb4";
  $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";

  $opt = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false
  );

  try {
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
    $stmt = $pdo->query("select * from tagList where tagName like '".$t."%'");
    foreach ($stmt as $row) {
      echo $row["tagName"].",";
    }
  } catch (PDOException $e) {
    exit("PDO ERROR :".$e->getMessage()."<br>");
  }
?>
