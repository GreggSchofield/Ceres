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
		<link rel="stylesheet" type="text/css" href="../SignInStyle.css">
		<title>Ceres || Sign-in</title>
	</head>
	<body>
		<?php
			$email = "";
			if (isset($_SESSION["userEmail"])) {
				$email = $_SESSION["userEmail"];
			}
			if (isset($_POST["txtEmail"])) {
				$email = $_POST["txtEmail"];
				$_SESSION["userEmail"] = $email;
			}
			$email = trim($email);
			if ($email != "") {
			if (validateEmailAddress($email)) {
				if (isset($_POST['txtPassword'])) {
					$password = htmlspecialchars($_POST["txtPassword"]);
					if (isset($_POST['txtCheckPassword'])) {
						$checkPassword = htmlspecialchars($_POST["txtCheckPassword"]);
						if ($password == $checkPassword) {
							// Register new account and go to homepage
							$id = createUser($email, $password, $email);
			        $_SESSION["userid"] = $id;
			        header("Location: homepage.php");
			        die();
						} else {
							// Ask user to verify their password again
							?>
							<h>Register an account</h>
							<form id="return" action="signOut.php">
								<input type="submit" value="Return" />
							</form>
							<b>Those passwords don't match</b><br>
							<form action="signIn.php" method="post">
								<input type="text" name="txtPassword" placeholder="Type password"><br>
								<input type="text" name="txtCheckPassword" placeholder="Type password again"><br>
								<input id="submitBtn" type="submit" value="Submit">
							</form>
							<?php
						}
					} else {
						// Check the password is correct
						$query = "select password from users where email='".$email."';";
			      $stmt = $pdo->query($query);
			      $checkPass = $stmt->fetch()["password"];
						if ($checkPass != $password) {
							// The given password is incorrect
							?>
							<h>Sign in</h>
							<form id="return" action="signOut.php">
								<input type="submit" value="Return" />
							</form>
							<b>That password is incorrect</b><br>
							<form action="signIn.php" method="post">
								<input type="text" name="txtPassword" placeholder="Password"><br>
								<input id="submitBtn" type="submit" value="Submit">
							</form>
							<?php
						} else {
							// The password and email are both correct
							$query = "select userID from users where email='".$email."';";
			        $stmt = $pdo->query($query);
			        $id = $stmt->fetch()["userID"];
			        $_SESSION["userid"] = $id;
							header("Location: homepage.php");
			        die();
						}
					}
				} else {
					$query = "select password from users where email='".$email."';";
		      $stmt = $pdo->query($query);
		      $checkPass = $stmt->fetch()["password"];
		      if (count($checkPass) != 1) {
						// If the account with the given email doesn't exist
					?>
					<h>Register an account</h>
					<form id="return" action="signOut.php">
						<input type="submit" value="Return" />
					</form>
					<form action="signIn.php" method="post">
						<input type="text" name="txtPassword" placeholder="Type password"><br>
						<input type="text" name="txtCheckPassword" placeholder="Type password again"><br>
						<input id="submitBtn" type="submit" value="Submit">
					</form>
					<?php
					} else {
						// If the account with the given email exists
						?>
						<h>Sign in</h>
						<form id="return" action="signOut.php">
							<input type="submit" value="Return" />
						</form>
						<form action="signIn.php" method="post">
							<input type="text" name="txtPassword" placeholder="Password"><br>
							<input id="submitBtn" type="submit" value="Submit">
						</form>
						<?php
					}
				}
			} else {
					?>
					<h>Sign in / register</h>
					<form id="return" action="signOut.php">
						<input type="submit" value="Return" />
					</form>
					<b>Please enter a valid email address</b><br>
					<form action="signIn.php" method="post">
						<input type="text" name="txtEmail" placeholder="Email"><br>
						<input id="submitBtn" type="submit" value="Submit">
					</form>
					<?php
				}
			} else {
				?>
				<h>Sign in / register</h>
				<form id="return" action="signOut.php">
					<input type="submit" value="Return" />
				</form>
				<form action="signIn.php" method="post">
					<input type="text" name="txtEmail" placeholder="Email"><br>
					<input id="submitBtn" type="submit" value="Submit">
				</form>
				<?php
			}
		?>
	</body>
</html>
