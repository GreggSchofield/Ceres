<?php
	require_once ('sessionCookieHandlerLib.php');
	startSession();
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
			if (isset($_POST['user_email'])) {
				if (validateEmailAddress($_POST['user_email']);) {
					$_SESSION['user_email'] = $_POST['user_email'];
					// re-direct the user to another page
				}

			}
		?>
		<form id="return" action="main.htm">
			<input type="button" value="Return" />
		</form>
		<div id="container">
			<h2>Title</h2>
			<form action="/SubmitEmail.php">
				<!-- Hey Chris I changed the value attribute here to the placeholder
				     this improves the user experience. -->
				<input type="text" name="Email" placeholder="Email"><br>
				<input id="submitBtn" type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>
