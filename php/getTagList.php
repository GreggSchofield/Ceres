<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

  $t = htmlspecialchars($_POST["t"]);
//  $t = "";

  include 'dbconn.php';

  class tag {
    public $type;
    public $name;
    public $id;
    public $weight;

    public function __construct($type, $id, $name, $weight) {
      $this->type = $type;
      $this->id = $id;
      $this->name = $name;
      $this->weight = $weight;
    }

  }

  $tags = array();

  $ingredientList = $pdo->query("select ingredientID, ingredientName, weighting from ingredients where ingredientName like '".$t."%'");
  $tagList = $pdo->query("select tagID, tagName, weight from tags where tagName like '".$t."%'");


  foreach ($ingredientList as $row) {
    array_push($tags, new tag("ingredient", $row["ingredientID"], $row["ingredientName"], $row["weighting"]));
  }

  foreach ($tagList as $row) {
    array_push($tags, new tag("tag", $row["tagID"], $row["tagName"], $row["weight"]));
  }

  function compare($a, $b) {
      return strcmp($b->weight, $a->weight);
  }
  usort($tags, "compare");

  foreach ($tags as $i) {
    echo $i->type.",".$i->id.",".$i->name.",";
  }

?>
