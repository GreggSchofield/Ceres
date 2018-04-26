<?php
	require_once 'sessionCookieHandlerLib.php';
	require_once 'queryLib.php';
	require_once 'userCredentialsValidationLib.php';
	startSession();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../Reset.css">
		<link rel="stylesheet" type="text/css" href="../ResultsStyle.css">
		<script src="../js/phpFunctions.js"></script>
	  <script src="../js/searchRecipes.js"></script>

		<script>

		function listResults() {
			var tagList = $_GET["tags"].split(";");
			var ingredientList = $_GET["ingredients"].split(";");
			var divRecipes = document.getElementById("results");
	    var recipeList = (callPost("getRecipesByTag.php").split(","));
	    for (var i = 0; i < recipeList.length - 4; i += 4) {
	      var recipeButton = document.createElement("a");
	      var id = recipeList[i];
	      var name = recipeList[i+1];
	      var pictureURL = recipeList[i+2];
	      var username = recipeList[i+3];
	      recipeButton.id = id;
	      var text = document.createTextNode(name + " - uploaded by " + username);
	      var picture = document.createElement("img");
	      if (pictureURL == "") {
	        picture.setAttribute("src", "../placeholder.png");
	      } else {
	        picture.setAttribute("src", pictureURL);
	      }

	      picture.setAttribute("height", "150");
	      picture.setAttribute("width", "auto");
	      recipeButton.onclick = function() {selectRecipe(this);};
	      recipeButton.href = "viewRecipe.php?recipe=" + id;
	      recipeButton.appendChild(picture);
	      recipeButton.appendChild(text);
	      divRecipes.appendChild(recipeButton);
	      divRecipes.appendChild(document.createElement("br"));
	    }
		}

		window.onload = listResults;

		</script>

		<title>Search</title>
	</head>
	<body>

	<div id="topBar">

		<form id="return" action="homepage.php">
		<input type="button" value="Return" />
		</form>

		<form id="account" action="accountSettings.php">
		<input type="button" value="Account" />
		</form>



	</div>

	<div id="searchContainer">

		<h2>Title</h2>


		<div id="searchBar">
			<form action="">
				<input type="text" placeholder="Search..." name="search">
				<button type="submit">Search</button>
			</form>
		</div>

		<div class="dropdown">
			<button class="dropbtn">Sort</button>
			<div class="dropdown-content">
				<a href="#">Most viewed</a>
				<a href="#">Highest rating</a>
				<a href="#">Alphabetical</a>
			</div>
		</div>

		<textarea name="tagBox" placeholder="Tags" disabled></textarea>



	</div>

	<div id="results">

	</div>

	</body>

</html>
