<?php
	require_once ('sessionCookieHandlerLib.php');
	require_once 'queryLib.php';
	startSession();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ceres || Sign-in</title>
		<link rel="stylesheet" type="text/css" href="Reset.css">
		<link rel="stylesheet" type="text/css" href="SignInStyle.css">
  </head>
  <body>
		<?php
		// Checks to see if a password has been entered on the page-load.
			if (isset($_POST['pswd'])) {
				if (validatePassword(isset($_POST['pswd']))) {
					// Checks whether the password entered
					checkValidEmail(isset($_POST['pswd'])) or die("Apologies, that was the wrong password");
				} else {
					$error = true;
				}
			}

			// Obviously move this into the correct php library later on
			function FunctionName($paramPswd) {
				$stmt = '';
			}
		?>
		<div class="">
			<form class="" action="index.html" method="post">
				<input type="password" name="password" placeholder="Password">
				<input type="submit" name="submit" value="Log-in">
			</form>
		</div>
  </body>
</html>
