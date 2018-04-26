<?php
require_once 'sessionCookieHandlerLib.php';
require_once 'queryLib.php';
require_once 'userCredentialsValidationLib.php';
startSession();

$userIDa = htmlspecialchars($_POST["userIDa"]);
$userIDb = htmlspecialchars($_POST["userIDb"]);

include 'dbconn.php';

$stmt = $pdo->query("insert into follows (userIDa, userIDb, weighting) values (".$userIDa.", ".$userIDb.", 1);");

?>
