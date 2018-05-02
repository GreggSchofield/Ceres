<?php
  include 'sessionCookieHandlerLib';

  start_session();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ceres || Settings</title>
      <link rel="stylesheet" type="text/css" href="Reset.css">
  		<link rel="stylesheet" type="text/css" href="MainStyle.css">
  </head>
  <body>
    <div class="">
      <p id="">Account settings</p>
    </div>
    <div class="">
      <button type="button" name="updateDisplayName" onclick="updateDisplayName.php"></button><br>
      <button type="button" name="updateProfilePicture" onclick="updateDisplayName.php"></button><br>
      <button type="button" name="updateEmail" onclick="updateEmail.php"></button><br>
      <button type="button" name="updatePassword" onclick="updatePassword"></button><br>
      <button type="button" name="updateBiography" onclick="updateBiography.php"></button><br>
      <button type="button" name="calculateMetrics" onclick="calculateMetrics.php"></button>
    </div>
  </body>
</html>
