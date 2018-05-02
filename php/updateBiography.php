<!-- This is a page that will allow the client to update their Biography.


    Created: 24/04/18
    Author[s]: Gregg Schofield -->

    <?php
      include 'sessionCookieHandlerLib';
      include 'userCredentialsValidationLib';

      start_session();
    ?>

<!DOCTYPE html>
<html>
  <head>
    <meta>
    <title>Ceres || Update Biography</title>
  </head>
  <body>
    <?php
      if (isset($_POST['newBio'])) {
        if (validateBiography($_POST['newBio'])) {
          updateBio($_POST['newBio']);
          echo "<p>You have successfully updated your biography!</p>";
        } else {
            echo "<p>Please check your biography!</p>";
        }
      } else {
          echo "<p>Ensure that the field is completed.</p>";
      }
    ?>

    <div class="">
      <form class="" action="index.html" method="post">
        <textarea name="newBio" rows="8" cols="80" required></textarea>
        <input type="submit" name="button" value="Change/Update">
      </form>
    </div>
  </body>
</html>
