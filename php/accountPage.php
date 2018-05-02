<?php
	require 'sessionCookieHandlerLib.php';
	require 'queryLib.php';
	require 'userCredentialsValidationLib.php';
	startSession();
?>
<!DOCTYPE html>
<html>
	<head>
  </head>
		<form action="homepage.php">
			<input type="submit" value="Return">
		</form>
		<script src="../js/phpFunctions.js"></script>
	  <script src="../js/searchRecipes.js"></script>
    <script>

    function follow() {
      var pageID = $_GET["user"];
      var userID = callPost("getUserID.php", "");
      callPost("addFollow.php", "userIDa=" + userID + "&userIDb=" + pageID);
      location.reload();
    }

    function unfollow() {
      var pageID = $_GET["user"];
      var userID = callPost("getUserID.php", "");
      callPost("removeFollow.php", "userIDa=" + userID + "&userIDb=" + pageID);
      location.reload();
    }

		function changeVal(varToChange) {
			console.log(varToChange);
			var div = document.getElementById("div" + varToChange);
			var textBox = document.createElement("input");
			textBox.type = "text";
			textBox.id = "txt" + varToChange;
			div.insertBefore(textBox, div.children[1]);
			var button = document.getElementById("btn" + varToChange);
			button.onclick = function() {updateVal(varToChange);};
			button.innerHTML = "Change";
		}

		function updateVal(varToUpdate) {
			var value = document.getElementById("txt" + varToUpdate).value;
			var varName = "";
			if (varToUpdate == "DisplayName") {
				varName = "displayName";
				value = "'" + value + "'";
			}
			if (varToUpdate == "Email") {
				varName = "email";
				value = "'" + value + "'";
			}
			if (varToUpdate == "Gender") {
				varName = "gender";
				value = "'" + value + "'";
			}
			if (varToUpdate == "DoB") {
				varName = "dateOfBirth";
			}
			if (varToUpdate == "Height") {
				varName = "height";
			}
			if (varToUpdate == "Weight") {
				varName = "weight";
			}
			callPost("updateUserInfo.php", "user=" + callPost("getUserID.php", "") + "&varName=" + varName + "&value=" + value);
			location.reload();
		}

		function gotoPage(page) {
			window.location = page;
		}

    window.onload = loadGet;

    </script>
    <body>
    <?php
  $userID = -1;
  if (isset($_SESSION["userid"])) {
    $userID = $_SESSION["userid"];
  }
  $pageID = htmlspecialchars($_GET["user"]);

  include 'dbconn.php';

  $stmt = $pdo->query("select email, password, joinDate, gender, dateOfBirth, displayName, bio, dietaryRequirements, height, weight from users where userID=".$pageID.";");

  $row = $stmt->fetch();
  $displayName = $row["displayName"];
  $email = $row["email"];
  $password = $row["password"];
  $joinDate = $row["joinDate"];
  $gender = $row["gender"];
  $dateOfBirth = $row["dateOfBirth"];
  $bio = $row["bio"];
  $dietaryRequirements = $row["dietaryRequirements"];
  $height = $row["height"];
  $weight = $row["weight"];

  if ($userID == $pageID) {
    echo "<b>Welcome to your page</b>\n";
		echo "<div id='divDisplayName'><p>Display name: ".$displayName."</p><button id='btnDisplayName' onclick='gotoPage(\"updateDisplayName.php\")'>Update display name</button></div>\n";
    echo "<div id='divEmail'><p>Email: ".$email."</p><button id='btnEmail' onclick='gotoPage(\"updateEmail.php\")'>Update email address</button></div>\n";
    echo "<div id='divBio'><p>Bio:<br>".$bio."</p><button id='btnBio' onclick='gotoPage(\"updateBiography.php\")'>Update bio</button></div>\n";
//    echo "<div id='divGender'><p>Gender: ".$gender."</p><button id='btnGender' onclick='gotoPage(\"updateGender.php\")'>Update gender</button></div>\n";
//    echo "<div id='divDoB'><p>Date of birth: ".$dateOfBirth."</p><button id='btnDoB' onclick='gotoPage(\"updateDateOfBirth.php\")'>Update date of birth</button></div>\n";
//    echo "<div id='divHeight'><p>Height: ".$height."</p><button id='btnHeight' onclick='gotoPage(\"updateHeight.php\")'>Update height</button></div>\n";
//    echo "<div id='divWeight'><p>Weight: ".$gender."</p><button id='btnWeight' onclick='gotoPage(\"updateWeight.php\")'>Update weight</button></div>\n";
		echo "<h2>Your recipes</h2>\n";
  } else {
    echo "<b>".$displayName."'s page</b>";
    echo "<p>Email: ".$email."</p>\n";
    echo "<p>Joined ".$joinDate."</p>\n";
    if ($bio != "") {
      echo "<p>Bio:<br> ".$bio."</p>\n<br>\n";
    }
    if ($userID != -1) {
      $stmt = $pdo->query("select * from follows where userIDa=".$userID." and userIDb=".$pageID.";");
      $following = $stmt->fetch();
      if (gettype($following) == "array") {
        echo "<button onclick='unfollow()'>Stop following this user</button>\n";
      } else {
        echo "<button onclick='follow()'>Follow this user</button>\n";
      }
    }
		echo "<h2>Recipes this user has uploaded</h2>\n";
  }
	$stmt = $pdo->query("select recipeID, recipeName, dateUploaded, pictureURL from recipes where userID=".$pageID.";");
	foreach ($stmt as $row) {
		$recipeID = $row["recipeID"];
		$recipeName = $row["recipeName"];
		$dateUploaded = $row["dateUploaded"];
		$pictureURL = $row["pictureURL"];
		echo "<a href=\"viewRecipe.php?recipe=".$recipeID."\">\n";
		if ($pictureURL == "") {
			echo "<img src='../placeholder.png' height='150' width='auto'>\n";
		} else {
			echo "<img src=\"".$pictureURL."\" height='150' width='auto'>";
		}
		echo $recipeName." - uploaded on ".$dateUploaded."\n";
		echo "</a>\n<br>\n";
	}

  ?>
  </body>
</html>
