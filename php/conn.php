<!-- This script will establish a connection to the PostgreSQL database. It will
     then proceed to pass SQL queries to the DBMS, wait for results, and then
     pass these results back to a python script for further processing.

     Created: 19/03/18
     Author: Gregg Schofield -->

<?php
  // Define connection parameters
  $dbname = 'u6gs';
  $host = 'localhost';
  $port = '5432';
  $user = 'u6gs';
  $password = 'Password1';
  $options = '--client_encoding=UTF8';

  // Attempts to open a connection to the PostgreSQL database
  function establishConnection() {
    $dbconn = pg_connect($dbname,$host,$port,$user,$password,$options)
      or die('A connection could not be successfully established.');
    echo "Connection successfully established.";
  }

  //
  function executePreparedQuery($queryName, $queryContent) {
    $result = pg_prepare($dbconn, $queryName, $queryContent);
    return $result = pg_execute($dbconn, $queryName, $param1);
  }

  // Attempts to close the connection to the PostgreSQL database
  function closeConnection() {
    pg_close($dbconn);
  }
?>
