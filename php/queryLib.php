<!-- This is a small library that will contain functions to allow high-level
    function calls from the HTHL webpages to complete SQL query-based tasts.

    Created: 17/04/18
    Author[s]: Gregg Schofield -->

<?php

  include 'dbconn.php';

  function createUser($email, $pswd, $dispName) {
    try {
      $stmt = 'INSERT INTO users (email, password, displayName) VALUES ?, ?, ?';

      $pdo->beginTransaction();
      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$email,PDO::PARAM_STR);
      $stmt->bindParam(1,$pswd,PDO::PARAM_STR);
      $stmt->bindParam(1,$dispName,PDO::PARAM_STR);
      $stmt->execute();
      $pdo->commit();
    } catch (PDOException $PDOException) {
      $pdo->rollback();
        exit("PDO Error: ".$PDOException->getMessage()."<br>");
    }
  }

  function updateInfo() {
    //
  }

  function loginAuthenticated($pswdAttempt) {
    try {
      $stmt = 'SELECT password FROM users WHERE email = ?';

      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$_SESSION['email'],PDO::PARAM_STR);
      $stmt->execute();

      $dbHash = $stmt->fetchColumn();
      if ($dbPswd === password_hash($pswdAttempt)) {
        return true;
      } else {
          return false;
      }
    } catch (\Exception $e) {
        return false;
    }

  }

?>
