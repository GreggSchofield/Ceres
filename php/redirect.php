<!-- This is a small script that should be included in every web-page except the
     log-in page. It checks whether the client has loaded a Ceres webpage
     without having an acive session. In this event it will simple re-direct the
     log-in page.

     require 'redirect.php';


    Created: 24/04/18
    Author: Gregg Schofield -->

<?php
  if (!(isset($_SESSION['dispName']) && isset($_SESSION['email']))) {
    header("Location: SignIn.php");
  }
?>
