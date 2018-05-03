<?php
	require_once 'sessionCookieHandlerLib.php';
	require_once 'queryLib.php';
	require_once 'userCredentialsValidationLib.php';
	startSession();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/Reset.css">
		<link rel="stylesheet" type="text/css" href="../css/MainStyle.css">
		<link rel="stylesheet" type="text/css" href="../css/ResultsStyle.css">
		<link rel="icon" href="../logo.jpeg">
		<script src="../js/phpFunctions.js"></script>
	  <script src="../js/searchRecipes.js"></script>

		<script>

		function listResults() {
			var tempTagList = $_GET["tags"];
//			console.log(tempTagList);
			var tempIngredientList = $_GET["ingredients"];
//			console.log(tempIngredientList);
			var divRecipes = document.getElementById("results");
			var postStr = "";
			if (tempTagList != undefined) {
				postStr += "tags=";
				postStr += tempTagList;
			}
			if (tempIngredientList != undefined) {
				if (tempTagList != undefined) {
					postStr += "&ingredients=";
				} else {
					postStr += "ingredients=";
				}
				postStr += tempIngredientList;
			}
			console.log(postStr);
	    var recipeList = callPost("getRecipesByTag.php", postStr).split(",");
//			console.log(recipeList);
			for (var i = 0; i < recipeList.length; i ++) {
				console.log(recipeList[i]);
			}
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

		function loadPage() {
			loadGet();
			listResults();
		}

		window.onload = loadPage;

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

		<h2>Search for recipes</h2>

		<div id="tagList"><input type="text" id="txtSearch" onkeyup="checkTag()" placeholder="Search for tags"></input></div>
    <div id="suggestedTags"></div>
    <button id="btnSearch" onclick="search()">Search</button>

		<!--

		<div class="dropdown">
			<button class="dropbtn">Sort</button>
			<div class="dropdown-content">
				<a href="#">Most viewed</a>
				<a href="#">Highest rating</a>
				<a href="#">Alphabetical</a>
			</div>
		</div>

	-->

	</div>

	<div id="results">

	</div>

	</body>

</html>
