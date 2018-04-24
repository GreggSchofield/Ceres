<?php

  /*
  This is a small library that will contain functions to allow high-level
      function calls from the HTHL webpages to complete non-trivial tasks such as
      validating whether client input is valid.

      Created: 17/04/18
      Author[s]: Gregg Schofield
    */

  // This php library requires a connection to the Ceresdb.
  include_once 'dbconn.php';

  /**
  * This is an internal library function that checks using a regular expression
  * whether a given display name is valid. Returns true or false accordingly.
  * @author Altered by Gregg Schofield but ultimately attributed to:
  * https://www.w3schools.com/php/php_form_url_email.asp
  */
  function validateDisplayName($paramStr) {
    if (preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5-31}$/', $paramStr)) {
      return true;
    } else { return false; }
  }

  /**
  * This is an internal library function that checks using a regular expression
  * whether a given password is valid. Returns true or false accordingly.
  * @author Altered by Gregg Schofield but ultimately attributed to:
  * https://stackoverflow.com/questions/24164973/regular-expression-to-match-minimum-password-requirements-and-other-characters
  */
  function validatePassword($paramStr) {
    if (preg_match('/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)\w{8,20}$/', $paramStr)) {
      return true;
    } else { return false; }
  }

  /**
  * This is an internal library function that checks using a regular expression
  * whether a given e-mail address is valid. Returns true or false accordingly.
  * @author Gregg Schofield
  */
  function validateEmailAddress($paramStr) {
    if (filter_var($paramStr, FILTER_VALIDATE_EMAIL)) {
      return true;
    } else { return false; }
  }

  /**
  * This is an internal library function that checks using a regular expression
  * whether a given biography is valid. Returns true or false accordingly.
  * @author Gregg Schofield
  */
  function validateBiography($paramStr) {
    if (preg_match('', $paramStr)) {
      return true;
    } else {
        return false;
    }
  }
?>
