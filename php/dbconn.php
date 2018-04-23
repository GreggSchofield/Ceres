<?php
 /*This script will attempt to establish a connection to the MySQL database.
     In the event that there is a connection error the prefefined PDO error
     message will be echoed to the standard output.

     Note that this script should be required on every module within the
     Ceres system that needs to interface with the database.

     Created: 15/04/18
     Author: Gregg Schofield */

  try {
    $db_hostname = "mysql";
    $db_database = "u6gs";
    $db_username = "u6gs";
    $db_password = "Password1";
    $db_charset = "utf8mb4";
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
    $opt = array(
      PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false
    );
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
  } catch (PDOException $PDOException) {
      exit("PDO Error: ".$PDOException->getMessage()."<br>");
  }
?>
