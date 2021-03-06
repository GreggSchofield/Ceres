<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Upload recipe</title>
  </head>
  <link rel="stylesheet" type="text/css" href="../css/Reset.css">
  <link rel="stylesheet" type="text/css" href="../css/AddStyle.css">
  <link rel="icon" href="../logo.jpeg">
  <script src="../js/phpFunctions.js"></script>
  <script>

  var ingredientsList = [];
  var tagList = [];
  var tempUserID = callPost("getUserID.php");
  console.log(tempUserID);

  function Ingredient(ingID, ingName, weight) {
    this.ingID = ingID;
    this.ingName = ingName;
    this.weight = weight;
  }

  function checkTag() {
    var text = document.getElementById("txtSearchIngredient").value;
    var tagButtons = document.getElementById("ingredientTagList");
    tagButtons.innerHTML = "";
    if (text != "") {
      var possibleTags = callPost("getIngredientList.php", "t=" + text);
      var wordList = possibleTags.split(",");
      var option;
      if (wordList.length > 22) {
        wordList.length = 22;
      }
      for (var i = 0; i < wordList.length - 2; i += 2) {
        button = document.createElement("button");
        var id = wordList[i];
        var name = wordList[i+1];
        button.id = id;
        button.innerHTML = name;
        button.onclick = function() {selectTag(this);};
        tagButtons.appendChild(button);
      }
    }
  }

  var tempIngredient;
  function selectTag(element) {
    var id = element.id;
    var name = element.innerHTML;
    console.log("Tag selected");
    tempIngredient = new Ingredient(id, name, 0);
    document.getElementById("txtSearchIngredient").value = name;
  }
  function clearTag() {
    console.log("Tag cleared");
    tempIngredient = null;
  }

  function addIngredient() {
    if (tempIngredient == null) {
      alert("Please select an appropriate ingredient tag");
    } else {
      var weight = document.getElementById("txtIngredientWeight").value;
      if (weight <= 0) {
        alert("Please input an appropriate weight for the ingredient")
      } else {
        console.log("Ingredient added");
        var newIngredient = new Ingredient(tempIngredient.ingID, tempIngredient.ingName, document.getElementById("txtIngredientWeight").value);
        ingredientsList.push(newIngredient);
        updateIngredients();
        document.getElementById("txtSearchIngredient").value = "";
        document.getElementById("txtIngredientWeight").value = "";
        clearTag();
        checkTag();
      }
    }
  }

  function updateIngredients() {
    var ingredientDiv = document.getElementById("ingredientsList");
    ingredientDiv.innerHTML = "";
    var text;
    for (var i = 0; i < ingredientsList.length; i++) {
      text = document.createTextNode(ingredientsList[i].ingName + ", " + ingredientsList[i].weight + "g ")
      ingredientDiv.appendChild(text);
      var button = document.createElement("button");
      button.id = i;
      button.innerHTML = "Remove";
      button.onclick = function() {removeIngredient(this.id);};
      ingredientDiv.appendChild(button);
      ingredientDiv.appendChild(document.createElement("br"));
    }
  }

  function removeIngredient(i) {
    console.log("Removing ingredient " + i);
    ingredientsList.splice(i, 1);
    updateIngredients();
  }

  function addTag() {
    var text = document.getElementById("txtTagName").value;
    if (text == "") {
      alert("Please input some text for the tag");
    } else {
      tagList.push(text);
      document.getElementById("txtTagName").value = "";
      updateTags();
    }
  }

  function removeTag(i) {
    console.log("Removing tag " + i);
    tagList.splice(i, 1);
    updateTags();
  }

  function updateTags() {
    var tagDiv = document.getElementById("tagList");
    tagDiv.innerHTML = "";
    var text;
    for (var i = 0; i < tagList.length; i++) {
      text = document.createTextNode(tagList[i] + " ");
      tagDiv.appendChild(text);
      var button = document.createElement("button");
      button.id = i;
      button.innerHTML = "Remove";
      button.onclick = function() {removeTag(this.id);};
      tagDiv.appendChild(button);
      tagDiv.appendChild(document.createElement("br"));
    }
  }

  function addRecipe() {
    var name = document.getElementById("txtName").value;
    var instructions = document.getElementById("txtInstructions").value;
    var servings = document.getElementById("txtServings").value;
    var callStr = "addRecipe.php";
    var varStr = "userid=" + tempUserID + "&name='" + name + "'&instructions='" + instructions + "'&servings=" + servings;
    var recipeID = parseInt(callPost(callStr, varStr));
    console.log(recipeID)
    for (var i = 0; i < ingredientsList.length; i++) {
      callStr = "addRecipeIngredient.php"
      varStr = "recipe=" + recipeID + "&ingredient=" + ingredientsList[i].ingID + "&weight=" + ingredientsList[i].weight;
      callPost(callStr, varStr);
    }
    for (var i = 0; i < tagList.length; i++) {
      callPost("addTag.php", "name='" + tagList[i] + "'");
      var tagID = callPost("findTagID.php", "name='" + tagList[i] + "'");
      callPost("addRecipeTag.php", "recipe=" + recipeID + "&tag=" + tagID);
    }

    if (document.getElementById("fileToUpload").value != undefined) {
      var imageName = recipeID + "img";
      document.getElementById("picture").action = "uploadRecipeImage.php?name=" + imageName + "&id=" + recipeID;
      document.getElementById("picture").submit();
    } else {
      window.location.href="homepage.php";
    }
  }

  </script>

  <body>

    <h1>Upload a new recipe</h1>

    <form action="homepage.php">
      <input type ="submit" id="btnReturn" value="Return to homepage"></input>
    </form>

    <p>Recipe name: </p>
    <input type="text" id="txtName"></input>
    <br>
    <p>Picture: </p>
    <form id="picture" action="uploadRecipeImage.php" method="post" enctype="multipart/form-data">
      <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpg, .jpeg, .png">
    </form>
    <p>Instructions: </p>
    <textarea id="txtInstructions" cols=50 rows=20></textarea>
    <p>Number of servings: </p>
    <input type ="number" id="txtServings"></input>

    <div id="ingredientsSection">
      <br>
      <b>Ingredients:</b>
      <p>Search for the appropriate ingredient: </p>
      <input type ="text" id="txtSearchIngredient" onkeyup="checkTag();clearTag();"></input>
      <div id="ingredientTagList">
      </div>
      <form action="addIngredientPage.php">
        <p>Can't find the ingredient you're looking for? Why not...</p>
        <input type ="submit" id="btnAddIngredient" value="add a new ingredient!"></input>
      </form>
      <p>Input the weight in grams of the ingredient: </p>
      <input type ="number" id="txtIngredientWeight"></input>
      <br><br>
      <button id="btnAddIngredient" onclick="addIngredient()">Add ingredient</button>
      <br><br>
      <div id="ingredientsList">
      </div>
    </div>

    <br><br>
    <b>Tags: </b>
    <input type ="text" id="txtTagName"></input>
    <button id="btnAddTag" onclick="addTag()">Add tag</button>
    <br><br>
    <div id="tagList">
    </div>
    <br><br>
    <button id="btnAddRecipe" onclick="addRecipe()">Upload recipe</button>

  </body>
</html>
