      <!--
      This is a small library that will contain functions to allow high-level
      function calls from the HTHL webpages to complete SQL query-based tasts.

      Created: 17/04/18
      Author[s]: Gregg Schofield
    -->

<?php

  include 'dbconn.php';

  function createUser($email, $pswd, $dispName) {
    // TODO: think about why this has been implemented as a transaction! Check
    // whether this user does not already exist!!!
    try {
      $stmt = 'INSERT INTO users (email, password, displayName) VALUES (?, ?, ?)';

      include 'dbconn.php';

      $pdo->beginTransaction();
      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$email,PDO::PARAM_STR);
      $stmt->bindParam(2,$pswd,PDO::PARAM_STR);
      $stmt->bindParam(3,$dispName,PDO::PARAM_STR);
      $stmt->execute();
      $pdo->commit();
      $stmt = $pdo->query("select last_insert_id();");
      $id = $stmt->fetch();
      return $id;
    } catch (PDOException $PDOException) {
      $pdo->rollback();
        exit("PDO Error: ".$PDOException->getMessage()."<br>");
      return -1;
    }
  }

  function updateDisplayName($newDispName) {
    // TODO:
  }

  function FunctionName($newEmailAddress) {
    // TODO:
  }

  function FunctionName($email) {
    // TODO:
  }

  function FunctionName($email) {
    // TODO:
  }

  function updatePassword($updatedPassword) {
    // TODO: please hash this as it is plain-text
    try {
      $stmt = 'UPDATE users SET password = ? WHERE email = ?';

      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$updatedPassword,PDO::PARAM_STR);
      $stmt->bindParam(2,$_SESSION['email'],PDO::PARAM_STR);
      $stmt->execute();
    } catch (PDOException $PDOException) {
        exit("PDO Error: ".$PDOException->getMessage()."<br>");
    }

  }

  function loginAuthenticated($pswdAttempt) {
    try {
      $stmt = 'SELECT password FROM users WHERE email = ?';

      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$_SESSION['email'],PDO::PARAM_STR);
      $stmt->execute();

      $dbHash = $stmt->fetchColumn();
      // verifies that the given hash matches the given password
      if (password_verify($pswdAttempt, $dbHash)) {
        return true;
      } else {
          return false;
      }
    } catch (\Exception $e) {
        return false;
    }

  }

?>
