<?php
require_once 'sessionCookieHandlerLib.php';
require_once 'queryLib.php';
require_once 'userCredentialsValidationLib.php';
startSession();

$userIDa = htmlspecialchars($_POST["userIDa"]);
$userIDb = htmlspecialchars($_POST["userIDb"]);

include 'dbconn.php';

$stmt = $pdo->query("delete from follows where userIDa=".$userIDa." and userIDb=".$userIDb.";");

?>
