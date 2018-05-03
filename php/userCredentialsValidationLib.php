<?php

  /* This is a small library that will contain functions to allow high-level
      function calls from the HTHL webpages to complete non-trivial tasks such as
      validating whether client input is valid.

      Created: 17/04/18
      Author[s]: Gregg Schofield */

  /**
  * Function that checks using a regular expression whether a given displayname
  * is valid. A valid displayname is defined to be a non-empty string consisting
  * of upper-case letters, lower-case letters, the digits 0-9 and the lenght of
  * the string must be between 6 and 16 characters long (inclusive).
  * whether a given display name is valid. Returns true or false accordingly.
  * @author Altered by Gregg Schofield but ultimately attributed to:
  * https://gist.github.com/smuddin/1213615
  */
  function validateDisplayName($displayName) {
    if (preg_match('/^[A-Za-z0-9_]{6,16}$/', $displayName)) {
      return true;
    } else { return false; }
  }

  /**
  * Function that checks using a regular expression whether a given password is
  * valid. A valid password is defined to be a non-empty string consisting of
  * least one upper-case letter, at least one lower-case letter, contains at
  * least one number OR special character and the entire string is at least
  * nine characters long (inclusive). Returns true or false accordingly.
  * @author Altered by Gregg Schofield but ultimately attributed to:
  * https://stackoverflow.com/questions/2637896/php-regular-expression-for-strong-password-validation
  */
  function validatePassword($paramStr) {
    if (preg_match('/(?=^.{9,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $paramStr)) {
      return true;
    } else { return false; }
  }

  /**
  * Function that checks using a pre-defined PHP constant whether a valid e-mail
  * address has been entered. Returns true or false accordingly.
  * @param $email The E-mail address to be validated.
  * @author Gregg Schofield
  */
  function validateEmailAddress($email) {
    if (filter_var($paramStr, FILTER_VALIDATE_EMAIL)) {
      return true;
    } else { return false; }
  }

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // code...
  }

  /**
  * This is an internal library function that checks using a regular expression
  * whether a given biography is valid. Returns true or false accordingly.
  * @author Gregg Schofield
  * NOTE: THIS NEEDS IMPLEMENTING!!!!
  */
  function validateBiography($paramStr) {
    if (preg_match('', $paramStr)) {
      return true;
    } else {
        return false;
    }
  }

  /**
  * Function to validate the height of a user. A valid height of a user is a
  * value that satisfies 0.9144 <= height <= 2.4384 meters (3 - 8 foot). Note
  * that this function expects its input in meters.
  * @author Gregg Schofield.
  */
  function validateHeight($height) {
    if ((0.9144 <= $height) && ($height <= 2.4384)) {
      return true;
    } else { return false; }
  }

  /**
  * Function to validate the weight of a user. A valid weight of a user is a
  * value that satisfies 25.4012 <= weight <= 254.012 kilograms (4 - 40 stone)
  * Note that this function expects its input in kilograms.
  * @author Gregg Schofield.
  */
  function validateWeight($weight) {
    if ((25.4012 <= $weight) && ($weight <= 254.012)) {
      return true;
    } else { return false; }
  }

  /**
  * Function to validate the level of activity of a user. A valid level of
  * activity of a user satisfies 1 <= level of activity <= 10.
  * @author Gregg Schofield.
  */
  function validateActivityLevel($activityLevel) {
    if ((1 <= $activityLevel) && ($activityLevel <= 10)) {
      return true;
    } else { return false; }
  }

  /**
  * Function to validate the recipie name of a recipie. A valid recipie name is
  * a non-empty string which consists of upper-case and lower-case characters,
  * hyphens and spaces. The size of the string must be between 2 and 64
  * characters inclusive.
  * @author Gregg Schofield
  */
  function validateRecipieName($recipieName) {
    if (preg_match('/^[a-zA-Z]+([ -]?[a-zA-Z]){2,64}$/', $recipieName)) {
      return true;
    } else { return false; }
  }

  /**
  * Function to validate the steps taken for a recipie. A valid set of steps is
  * a string of arbitraty lenght which consists of upper-case, lower-case,
  * digits (0-9) and the space, commar, period, colon, semi-colon, exclamation
  * and question mark.
  * @author Gregg Schofield
  */
  function validateSteps($steps) {
    if (preg_match('/^[a-zA-Z0-9]+([ ,.:;!]?[a-zA-Z]){2,64}$/', $steps)) {
      return true;
    } else { return false;}
  }

  /**
  * Function that validates the number of servings any particular recipie should
  * serve. The valid serving is any value that satisfies l 1<= v <=32 u.
  * @author Gregg Schofield
  */
  function validateServings($servings) {
    if ((1 <= $servings) && ($servings <= 32)) {
      return true;
    } else { return false;}
  }

  /**
  * Function to validate the name of an ingredient. A valid ingredient recipie
  * name is a non-empty string which consists of upper-case and lower-case characters,
  * hyphens and spaces. The size of the string must be between 2 and 64
  * characters inclusive.
  * @author Gregg Schofield
  */
  function validateIngredientName($ingredientName) {
    if (preg_match('/^[a-zA-Z]+([ -]?[a-zA-Z]){2,64}$/', $recipieName)) {
      return true;
    } else { return false; }
  }

/*VALIDATION FOR THE BELOW IS GRAMS PER GRAM*/

  /**
  * Validates the calories of a particular ingredient. A valid value of calories
  * is one that satisfies 0 <= value <= 1.
  * @author Gregg Schofield
  */
  function validateCalories($calories) {
    if ((0 <= $calories) && ($calories <= 1)) {
      return true;
    } else { return false;}
  }

  /**
  * Validates the protein of a particular ingredient. A valid value of protein
  * is one that satisfies 0 <= value <= 1.
  * @author Gregg Schofield
  */
  function validateProtein($protein) {
    if ((0 <= $protein) && ($protein <= 1)) {
      return true;
    } else { return false;}
  }

  /**
  * Validates the fat of a particular ingredient. A valid value of fat
  * is one that satisfies 0 <= value <= 1.
  * @author Gregg Schofield
  */
  function validateFat($fat) {
    if ((0 <= $fat) && ($fat <= 1)) {
      return true;
    } else { return false;}
  }

  /**
  * Validates the sugar of a particular ingredient. A valid value of sugar
  * is one that satisfies 0 <= value <= 1.
  * @author Gregg Schofield
  */
  function validateSugar($fiber) {
    if ((0 <= $sugar) && ($sugar <= 1)) {
      return true;
    } else { return false;}
  }

  /**
  * Validates the fiber of a particular ingredient. A valid value of fiber
  * is one that satisfies 0 <= value <= 1.
  * @author Gregg Schofield
  */
  function validateFiber($fiber) {
    if ((0 <= $fiber) && ($fiber <= 1)) {
      return true;
    } else { return false;}
  }

  /**
  * Validates the carboydrate of a particular ingredient. A valid value of
  * carboydrate is one that satisfies 0 <= value <= 1.
  * @author Gregg Schofield
  */
  function validateCarbohydrates($carboydrates) {
    if ((0 <= $carboydrates) && ($carboydrates <= 1)) {
      return true;
    } else { return false;}
  }
?>
