<?php
  require 'dbconn.php';
  require 'startSession.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ceres || *Add a tagline here*</title>
    <!--Reference to the stylesheet-->
    <link rel="Stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <header>
      <nav>
        <div class="main-wrapper">
          <ul>
            <li><a href="index.php">Home</a></li>
          </ul>
          <div>
            <form action="" method="post">
              <!--I have added two blank patterns attribute here. Please feel free
                  to add a regular expression if we do not do this on script side.-->
              <input type="text" name="dispName" placeholder="Displayname" pattern="">
              <input type="text" name="pswd" placeholder="Password" pattern="">
              <button type="submit" name="submit">Lets eat!</button>
            </form>
            <a href="signup.php">Sign up</a>
          </div>
        </div>
      </nav>
    </header>
    <section class="main-container">
      <div class="main-wrapper">
        <h2></h2>
      </div>
    </section>
  </body>
</html>
