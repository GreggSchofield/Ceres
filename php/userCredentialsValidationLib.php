<!-- This is a small library that will contain functions to allow high-level
    function calls from the HTHL webpages to complete non-trivial tasks such as
    validating whether client input is valid.

    Created: 17/04/18
    Author[s]: Gregg Schofield -->

<?php

  // Don't forget that this php library will certainly need to connect with the
  // ceresdb!
  //include_once '';

  /**
  * This is an internal library function that checks using a regular expression
  * whether a given e-mail address is valid. Returns true or false accordingly.
  * @author Altered but ultimately attributed to:
  * https://www.w3schools.com/php/php_form_url_email.asp
  */
  function validateEmailAddress($paramStr) {
    if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$paramStr)) {
      return true;
    } else {
        return false;
    }
  }

  /**
  * This is an internal library function that checks using a regular expression
  * whether a given e-mail address is valid. Returns true or false accordingly.
  * @author Gregg Schofield
  * WE NEED TO COLLECTIVELY DECIDE ON WHAT CONSTITUTES A VALUE DISPLAYNAME!
  */
  public function FunctionName($paramStr) {
    if (preg_match("",$paramStr)) {
      return true;
    } else {
        return false;
    }
  }
?>
