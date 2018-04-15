<!-- This script will take

     Note that this script will contain functions that allos the Ceres system
     to interface with the MySQL database.

     Created: 15/04/18
     Author: Gregg Schofield -->

<?php
  include 'dbconn.php';

  /**
  * This function can be called by any page within the Ceres application. When
  * called, this function will translate a information given as arguments and
  * will execute the corresponding query, returning a PDOStatement object
  * containing the resultant tuples (if any).
  * @param array $parameterArray will contain an arbitrary number of
  * strings for the SQL query.
  * @param string $queryType will contain the information regarding the type of
  * query string to use.
  * @throws PDOException In the event that there is an error whilst executing
  * the query.
  * @return $preparedStatement
  * @author Gregg Schofield
  */
  public function queryCeresdb($parameterArray, $queryType) {

    // Please note that I will need to add later some control structure to allow
    // the correct SQL query template file (e.g. query1.sql) to be read into the
    // $queryStatement variable.
    $queryStatement = file_get_contents();

    try {
      $pdo->beginTransaction();

      $preparedStatement = $pdo->prepare($queryStatement);

      $parameterCounter = 1;
      foreach ($parameterArray as $parameterElement) {
        if (gettype($parameterElement) = 'string') {
          $PDOConstant = 'PDO::PARAM_STR';
        } elseif (gettype($parameterElement) = 'integer') {
            $PDOConstant = 'PDO::PARAM_INT';
        } elseif (gettype($parameterElement) = 'boolean') {
            $PDOConstant = 'PDO::PARAM_BOOL';
        } else {
            $PDOConstant = 'PDO::PARAM_NULL';
        }
        $preparedStatement->bindParam($parameterCounter, $parameterElement, $parameterElement);
        $parameterCounter += 1;
      }

      $preparedStatement->execute();

      return $preparedStatement;

      $pdo->commit();
    } catch (PDOException $PDOException) {
      $pdo->rollback();
      exit("PDO Error: ".$PDOException->getMessage()."<br>");
    }
  }
?>
