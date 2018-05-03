<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();
  expSession();
  genNewSessionIdentifier();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ceres</title>
    <link rel="stylesheet" type="text/css" href="../css/Reset.css">
		<link rel="stylesheet" type="text/css" href="../css/MainStyle.css">
    <link rel="icon" href="../logo.jpeg">
  </head>
  <script src="../js/phpFunctions.js"></script>
  <script src="../js/searchRecipes.js"></script>
  <script>

  function Recipe(id, name, pictureURL, username) {
    this.id = id;
    this.name = name;
    this.pictureURL = pictureURL;
    this.username = username;
  }

  var featuredRecipeList = [];

  function featuredRecipes() {
    var divRecipes = document.getElementById("slideshow");
    var recipeList = (callPost("getFeaturedRecipes.php").split(","));
    var cropLength = 10;
    if (recipeList.length > cropLength * 4) {
      recipeList.length = cropLength * 4;
    }
    for (var i = 0; i < recipeList.length - 4; i += 4) {
      var id = recipeList[i];
      var name = recipeList[i+1];
      var pictureURL = recipeList[i+2];
      var username = recipeList[i+3];

      var recipeButton = document.createElement("a");
      recipeButton.setAttribute("class", "Slides");
      recipeButton.id = id;
      var text = document.createTextNode(name + " - uploaded by " + username);
      var picture = document.createElement("img");
      if (pictureURL == "") {
        picture.setAttribute("src", "../placeholder.png");
      } else {
        picture.setAttribute("src", pictureURL);
      }
      picture.setAttribute("width", "530");
      picture.setAttribute("height", "auto");
      recipeButton.onclick = function() {selectRecipe(this);};
      recipeButton.href = "viewRecipe.php?recipe=" + id;
      recipeButton.appendChild(picture);
      recipeButton.appendChild(document.createElement("br"));
      recipeButton.appendChild(text);
      divRecipes.appendChild(recipeButton);
    }
    carousel();
  }

  var slideIndex = 0;
  function carousel() {
    var x = document.getElementsByClassName("Slides");
    for (var i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    x[slideIndex].style.display = "block";
    slideIndex++;
    if (slideIndex >= x.length) {slideIndex = 0;}
    setTimeout(carousel, 4000);
  }

  function selectRecipe(element) {
    var id = element.id;
    window.location = 'viewRecipe.php?recipe=' + id;
  }

  function gotoAccount() {
    window.location = 'accountPage.php?user=' + callPost("getUserID.php", "");
  }

  window.onload = featuredRecipes;

  </script>

  <body>

    <div id ="menuBar">
      <img src="../logo.jpeg" id="logo">
  		<table>
  			<tr>
          <?php
          if (isset($_SESSION["userid"])) {
          ?>
  				<th>
  					<form class="menuButton" action="addRecipePage.php">
  					<input type="submit" value="Upload new recipe" />
  					</form>
  				</th>
          <th>
            <form class="menuButton">
  					  <input type="button" onclick="gotoAccount()" value="Account settings"/>
            </form>
  				</th>
          <th>
  					<form class="menuButton" action="signOut.php">
  					<input type="submit" value="Sign out" />
  					</form>
  				</th>
          <?php
          } else {
          ?>
          <th>
  					<form class="menuButton" action="signIn.php">
  					<input type="submit" value="Sign in / register" />
  					</form>
  				</th>
          <?php
          }
          ?>
  			</tr>
  		</table>
  	</div>

    <div id="searchBar">
      <div id="tagList"><input type="text" id="txtSearch" name="search" onkeyup="checkTag()" placeholder="Search for tags to find the recipe you're looking for"></input></div>
      <div id="suggestedTags" name="tagBox"></div>
      <button id="btnSearch" onclick="search()">Search</button>
    </div>

    <div id="centerContain">
      <div id="slideshow">
      </div>
    </div>

  </body>
</html>
