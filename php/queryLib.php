<?php

/* This is a small library that will contain functions to allow high-level
function calls from the HTHL webpages to complete SQL query-based tasts.

Created: 17/04/18
Author[s]: Gregg Schofield */

  // This library obviously requires a connection to the MySQL database.
  require 'dbconn.php';

  /**
  * Sets all of the superglobal variables in the event of a successful log-in.
  * Although we currently think that this is not needed because Jack runs querys
  * on pages that require information such as email and userid present in the
  * session superglobal array, this method provides reassurance that such values
  * will be present on all pages of the Ceres system minus the log-in page.
  * This is especially important for the demonstration.
  * @param $email The E-mail used to retrieve all of the users information and
  * store in the sessios superglobal array.
  * @author Gregg Schofield
  */
  function setAllSuperglobals($email) {
    $stmt = 'SELECT userID, joinDate, gender, dateOfBirth, displayName, bio,
             dietaryRequirements, height, weight, activityLevel,
             dateSinceLasAccess FROM users WHERE email = ?';

    $stmt->prepare($stmt);
    $stmt->bindParam(1,$_SESSION['email'],PDO::PARAM_STR);
    $stmt->execute();

    $sessionKeys = ['userID', 'joinDate', 'gender', 'dateOfBirth',
                    'displayName', 'bio', 'dietaryRequirements', 'height',
                    'weight', 'activityLevel', 'dateSinceLasAccess'];

    $cnt = 0;

    foreach ($sessionKeys as $key) {
      $_SESSION[$key] = $stmt->fetchColumn($cnt);
      $cnt++;
    }
  }

  /**
  * Function to create a user profile with the following parameters:
  * @param $email The email for the new user.
  * @param $pswd The password for the new user
  * @author Gregg Schofield
  */
  function createUser($email, $password, $displayName) {
    $testLine = 'This is a test line...';
    $stmt = 'INSERT INTO users (email, password, displayName) VALUES (?, ?, ?)';

    // Hashes the value of $password using the default hashing algorithm.
//    $password = password_hash($password, PASSWORD_DEFAULT);

    include 'dbconn.php';

    try {
      $pdo->beginTransaction();
      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$email,PDO::PARAM_STR);
      $stmt->bindParam(2,$password,PDO::PARAM_STR);
      $stmt->bindParam(3,$displayName,PDO::PARAM_STR);
      $stmt->execute();
      $pdo->commit();
      $stmt = "select userID from users where email=?;";
      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$email,PDO::PARAM_STR);
      $id = $stmt->fetch()["userID"];
      return $id;
    } catch (PDOException $PDOException) {
      $pdo->rollback();
        exit("PDO Error: ".$PDOException->getMessage()."<br>");
      return -1;
    }
    return -1;
  }

  /**
  * Function to update a users display name with the of the parameter:
  * @author Gregg Schofield
  * @param $dispName The new display name.
  */
  function updateDisplayName($dispName) {
    include 'dbconn.php';
    try {
      $stmt = 'UPDATE users SET displayName = ? WHERE userID = '.$_SESSION["userid"];

      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$dispName,PDO::PARAM_STR);
      // Note that this PDO::PARAM_INT may cause an error - if so, change to STR
//      $stmt->bindParam(2,$_SESSION['userid'],PDO::PARAM_STR);
      $stmt->execute();
      return true;
    } catch (PDOException $PDOException) {
        echo "PDO Error: ".$PDOException->getMessage()."<br>";
        return false;
    }
  }

  /**
  * Function to update the email of a existing user with the value of the
  * parameter:
  * @param $newEmailAddress The new email address.
  * @author Gregg Schofield
  */
  function updateEmailAddress($newEmailAddress) {
    include 'dbconn.php';
    try {
      $stmt = 'UPDATE users SET email = ? WHERE userid = '.$_SESSION["userid"];

      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$newEmailAddress,PDO::PARAM_STR);
      // Note that this PDO::PARAM_INT may cause an error - if so, change to STR
//      $stmt->bindParam(2,$_SESSION['email'],PDO::PARAM_STR);
      $stmt->execute();
    } catch (PDOException $PDOException) {
        echo "PDO Error: ".$PDOException->getMessage()."<br>";
        return false;
    }
  }

  /**
  * Function to update the biography of an existing user with the value
  * of the parameter:
  * @param $biography The new biography.
  * @author Gregg Schofield
  */
  function updateBiography($biography) {
    include 'dbconn.php';
    try {
      $stmt = 'UPDATE users SET bio = ? WHERE userid='.$_SESSION["userid"];

      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$biography,PDO::PARAM_STR);
//      $stmt->bindParam(2,$_SESSION['email'],PDO::PARAM_STR);
      $stmt->execute();
    } catch (PDOException $PDOException) {
        echo "PDO Error: ".$PDOException->getMessage()."<br>";
        return false;
    }

  }

  /**
  * Function to check whether the users has any content in their biography.
  * Returns true/false accordingly.
  * @author Gregg Schofield
  */
  /*
  function hasBio() {
    try {
      $stmt = 'SELECT bio FROM users WHERE email = ?';
      $stmt = $pdo->prepare($stmt);
      // Note that this PDO::PARAM_INT may cause an error - if so, change to STR
      $stmt->bindParam(1,$_SESSION['email'],PDO::PARAM_STR);
      $stmt->execute
      // This has no value!
      $pdo = $new value(val_1 + val+ 2);

      if ($stmt->rowCount() !== 0) {
        return true;
      } else { return false; }
    } catch (PDOException $PDOException) {
        echo "PDO Error: ".$PDOException->getMessage()."<br>";
        return false;
    }
  }
  */

  /**
  * Function to return the contents of a user biography.
  * @author Gregg Schofield
  */
  function getBioContents() {
    try {
      $stmt = 'SELECT bio FROM users WHERE email = ?';
      $stmt = $pdo->prepare($stmt);
      // Note that this PDO::PARAM_INT may cause an error - if so, change to STR
      $stmt->bindParam(1,$_SESSION['email'],PDO::PARAM_STR);
      $stmt->execute();
      return $retString = $stmt->getAttribute();
    } catch (PDOException $PDOException) {
        echo "PDO Error: ".$PDOException->getMessage()."<br>";
        return false;
    }
  }

  /**
  * Function to update the existing password of a user with the password
  * provided as a parameter:
  * @param $password The new password.
  * @author Gregg Schofield
  */
  function updatePassword($password) {

    // Hashes the value of $password using the default hashing algorithm.
//    $password = password_hash($password, PASSWORD_DEFAULT);

    include 'dbconn.php';

    try {
      $stmt = 'UPDATE users SET password = ? WHERE userID='.$_SESSION["userid"];

      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$password,PDO::PARAM_STR);
//      $stmt->bindParam(2,$_SESSION['email'],PDO::PARAM_STR);
      $stmt->execute();
      return true;
    } catch (PDOException $PDOException) {
        echo "PDO Error: ".$PDOException->getMessage()."<br>";
        return false;
    }

  }

  /**
  * Function to authenticate a change in system setting when the user has
  * already logged in.
  * @param $password The password entered by the user.
  * @author Gregg Schofield
  */
  function loginAuthenticated($password) {
    include 'dbconn.php';
    try {
      $stmt = 'SELECT password FROM users WHERE userID = '.$_SESSION["userid"];

      $stmt = $pdo->prepare($stmt);
//      $stmt->bindParam(1,$_SESSION['email'],PDO::PARAM_STR);
      $stmt->execute();

      $dbHash = $stmt->fetchColumn();
      // verifies that the given hash matches the given password
      if ($password == $dbHash) {
        return true;
      } else {
          return false;
      }
    } catch (PDOException $PDOException) {
        echo "PDO Error: ".$PDOException->getMessage()."<br>";
        return false;
    }

  }

  /**
  * Function to update the biometric information of the user. The biometric
  * information of the user consists of the users height, weight and level
  * of activity.
  * @param $height The height of the user.
  * @param $weight The weight of the user.
  * @param $loa The level of activity of the user.
  * @author Gregg Schofield
  */
  function updateBiometrics($height, $weight, $loa) {
    try {
      $stmt = 'UPDATE users SET height = ?, weight = ?, activityLevel = ? WHERE email = ?';

      $stmt = $pdo->prepare($stmt);
      $stmt->bindParam(1,$height);
      $stmt->bindParam(2,$weight);
      $stmt->bindParam(3,$loa);
      $stmt->bindParam(4,$_SESSION['email'],PDO::PARAM_STR);
      $stmt->execute();

      return true;
    } catch (\Exception $e) {
        echo "PDO Error: ".$PDOException->getMessage()."<br>";
        return false;
    }
  }

?>
