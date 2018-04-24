<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Reset.css">
		<link rel="stylesheet" type="text/css" href="SignInStyle.css">
		<title>Group Project</title>
	</head>
	<body>
		<?php
			if (isset($_POST['txtEmail'])) {
				include 'dbconn.php';
	      $password = htmlspecialchars($_POST["txtPassword"]);
	      $email = htmlspecialchars($_POST["txtEmail"]);
				$_POST = array();

	      $query = "select password from users where email='".$email."';";
	      $stmt = $pdo->query($query);
	      $checkPass = $stmt->fetch()["password"];
	      if (count($checkPass) != 1) {
	        echo "<b>There are no users registered with that email address</b>\n<br>\n";
	      } else {
					if ($checkPass != $password) {
						echo "<b>Incorrect password</b>\n<br>\n";
					} else {
						$query = "select userID from users where email='".$email."';";
		        $stmt = $pdo->query($query);
		        $id = $stmt->fetch()["userID"];
		        $_SESSION["userid"] = $id;
		        header("Location: homepage.php");
		        die();
					}
				}
			}
		?>
		<div id="container">
			<h2>Sign In</h2>
			<form action="SignIn.php" method="post">
				<!-- Hey Chris I changed the value attribute here to the placeholder
				     this improves the user experience. -->
				<input type="text" name="txtEmail" placeholder="Email"><br>
				<input type="text" name="txtPassword" placeholder="Password"><br>
				<input id="submitBtn" type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>
