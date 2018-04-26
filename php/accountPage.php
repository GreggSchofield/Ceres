<?php
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

    window.onload = loadGet;

    </script>
    <body>
    <?php
  require 'sessionCookieHandlerLib.php';
  require 'queryLib.php';
  require 'userCredentialsValidationLib.php';
  startSession();

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
    echo "<b>Welcome to your page ".$displayName."</b>\n";
    echo "<p>Email: ".$email."</p><button onclick='changeEmail()'>Update email address</button>\n";
    echo "<p>Bio:<br>".$bio."</p><button onclick='changeBio()'>Update bio</button>\n";
    echo "<p>Gender: ".$gender."</p><button onclick='changeGender()'>Update gender</button>\n";
    echo "<p>Date of birth: ".$height."</p><button onclick='changeDoB()'>Update date of birth</button>\n";
    echo "<p>Height: ".$height."</p><button onclick='changeHeight()'>Update height</button>\n";
    echo "<p>Weight: ".$gender."</p><button onclick='changeWeight()'>Update weight</button>\n";
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
  }

  ?>
  </body>
</html>
