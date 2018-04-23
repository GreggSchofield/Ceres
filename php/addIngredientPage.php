<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add new ingredient</title>
  </head>
  <script src="../js/phpFunctions.js"></script>
  <script>

  function addIngredient() {
    var name = document.getElementById("txtName").value.toLowerCase();
    if (document.getElementById("txtPrep").value.toLowerCase() != "") {
      name = document.getElementById("txtName").value.toLowerCase() + " (" + document.getElementById("txtPrep").value.toLowerCase() + ")";
    }
    var protein = document.getElementById("txtProtein").value;
    var fat = document.getElementById("txtFat").value;
    var sugar = document.getElementById("txtSugar").value;
    var fiber = document.getElementById("txtFiber").value;
    var carbs = document.getElementById("txtCarbs").value;
    var calories = (9 * fat) + (4 * protein) + (4 * carbs);
    var containsNuts = document.getElementById("boxNuts").checked;
    var containsGluten = document.getElementById("boxGluten").checked;
    var containsDairy = document.getElementById("boxDairy").checked;
    var containsMeat = document.getElementById("boxMeat").checked;
    var content = "";
    if (containsNuts) {
      content += "nuts;"
    }
    if (containsGluten) {
      content += "gluten;"
    }
    if (containsDairy) {
      content += "dairy;"
    }
    if (containsMeat) {
      content += "meat;"
    }

    var callStr = "addIngredient.php";
    var varStr = "name='" + name + "'&calories=" + calories + "&protein=" + protein + "&fat=" + fat + "&sugar=" + sugar + "&fiber=" + fiber + "&carbs=" + carbs + "&contents='" + content + "'";
    callPost(callStr, varStr);

    alert("Ingredient '" + name + "' added");

    document.getElementById("addIngredientForm").reset();

  }

  </script>

  <body>

    <h1>Add a new ingredient</h1>

    <form id="addIngredientForm">
      <p>Ingredient name: </p>
      <input type="text" id="txtName"></input>
      <p>Preparation: </p>
      <input type="text" id="txtPrep"></input>
      <p>Please enter data to 3 decimal places where possible</p>
      <p>Protein (grams per gram of ingredient): </p>
      <input type="number" id="txtProtein"></input>
      <p>Fat (per gram): </p>
      <input type="number" id="txtFat"></input>
      <p>Sugar (per gram): </p>
      <input type="number" id="txtSugar"></input>
      <p>Fiber (per gram): </p>
      <input type="number" id="txtFiber"></input>
      <p>Carbohydrates (per gram): </p>
      <input type="number" id="txtCarbs"></input>
      <p>Content: </p>
      <input type="checkbox" id="boxNuts">Contains nuts</input><br>
      <input type="checkbox" id="boxGluten">Contains gluten</input><br>
      <input type="checkbox" id="boxDairy">Contains dairy</input><br>
      <input type="checkbox" id="boxMeat">Contains meat</input>
    </form>

    <br><br><br>

    <input type="button" id="btnAddIngredient" value="Add ingredient" onclick="addIngredient()"></input>

  </body>

</html>