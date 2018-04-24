<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ceres</title>
  </head>
  <script src="../js/phpFunctions.js"></script>
  <script src="../js/searchRecipes.js"></script>
  <script>



  </script>

  <body>
    <?php
      if (isset($_SESSION["userid"])) {
        ?>
        <form action="signOut.php">
          <input type="submit" id="signIn" value="Sign out"></input>
        </form>
        <form action="addRecipePage.php">
          <input type="submit" id="addRecipe" value="Upload new recipe"></input>
        </form>
        <?php
      } else {
        ?>
        <form action="signIn.php">
          <input type="submit" id="signIn" value="Sign in / register"></input>
        </form>
        <?php
      }
    ?>
    <div id="tagList"><input type="text" id="txtSearch" onkeyup="checkTag()" placeholder="Search for tags to find the recipe you're looking for"></input></div>
    <div id="suggestedTags"></div>
    <button id="btnSearch" onclick="search()">Search</button>
    <div id="featuredRecipes">
    </div>
  </body>
</html>
