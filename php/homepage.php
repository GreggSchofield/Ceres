<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  require 'redirect.php';
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

  function featuredRecipes() {
    var divRecipes = document.getElementById("featuredRecipes");
    var recipeList = (callPost("getFeaturedRecipes.php").split(","));
    for (var i = 0; i < recipeList.length - 2; i += 2) {
      var button = document.createElement("button");
      var id = recipeList[i];
      var name = recipeList[i+1];
      button.id = id;
      button.innerHTML = name;
      button.onclick = function() {selectRecipe(this);};
      divRecipes.appendChild(button);
      divRecipes.appendChild(document.createElement("br"));
    }
  }

  function selectRecipe(element) {
    var id = element.id;
    window.location = 'viewRecipe.php?recipe=' + id;
  }

  window.onload = featuredRecipes;

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
    <br>
    <div id="tagList"><input type="text" id="txtSearch" onkeyup="checkTag()" placeholder="Search for tags to find the recipe you're looking for"></input></div>
    <div id="suggestedTags"></div>
    <button id="btnSearch" onclick="search()">Search</button>
    <h3>Featured recipes</h3><br>
    <div id="featuredRecipes">
    </div>
  </body>
</html>
