<?php
  $name = htmlspecialchars($_POST["name"]);

  include 'dbconn.php';

  $query = "select tagID from tags where tagName=".$name.";";
  echo $query."\n";
  $stmt = $pdo->query($query);
  $id = "";
  if (!empty($stmt)) {
    $id = $stmt->fetch()["tagID"];
    echo $id;
  }
  if ($id == "") {
    $stmt = $pdo->query("insert into tags (tagName, weight) values (".$name.", 1);");
//  }
  } else {
    $stmt = $pdo->query("select weight from tags where tagID=".$id.";");
    $weight = $stmt->fetch()["weight"];
    $weight += 1;
    $stmt = $pdo->query("update tags set weight=".$weight." where tagID=".$id.";");
  }
?>
