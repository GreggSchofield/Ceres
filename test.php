

<!DOCTYPE html>
<?php
  session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ceres || Sign-in</title>
  </head>
  <body>
    <form action="action_page.php">

      <div class="container">
        <label for="dspNmLbl"><b>Display name</b></label>
        <input type="text"
               placeholder="e.g. john_smith92"
               name="dspNm_input"
               required>

        <label for="psw"><b>Password</b></label>
        <input type="password"
               placeholder="Im not looking!"
               name="psw_input"
               required>

        <button type="submit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>

     </form>
  </body>
</html>
