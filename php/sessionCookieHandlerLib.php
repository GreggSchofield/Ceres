<?php

  /* This is a small library that will contain functions to allow high-level
      function calls from the HTHL webpages to complete psudo-complex tasts such
      as starting a session and regenerating the session id. Essentially, this
      library will allow you to complete tasks which would otherwise take 2 or more
      lines of PHP in a single line.

      Created: 17/04/18
      Author[s]: Gregg Schofield */

  // Temporal constant definitions.
  define("UNIXTIME", 2592000);
  define("MINS30", 1800);

  /**
  * Checks if the client is logged in, if this is the case, then the client is
  * re-directed to the relative URL path specified in the sinle parameter.
  * @param $relativeRedirectionPath Stores the relative URL path that the user
  *        is to be re-directed to.
  * @author Gregg Schofield
  */
  function reDirectIfLoggedIn($relativeRedirectionPath) {
    if (isset($_SESSION['x'])) {
      header('Location: '.$relativeRedirectionPath);
    }
  }

  /**
  * Creates a new session along with a new session id in the event that the
  * client is a first time visitor, otherwise a new session id is generated.
  * @author Gregg Schofield
  */
  function startSession() {
    session_start();
    session_regenerate_id();
  }

  /**
  * Destroys ALL data associated with the current session along with any data
  * that may be stored in one of the PHP superglobal arrays (such as $_SESSION).
  * Additionally, gives a user a cookie comprising of the session name, session
  * id, the UNIX time and a relative path (this path).
  * @author Gregg Schofield
  */
  function endSession() {
    session_destroy();
    session_unset();
    setcookie(session_name(), session_id(), time()-UNIXTIME, '/');
  }

  /**
  * If a client has been inactive for over 30 minutes then the endSession() is
  * called. Otherwise simply set the session variable to the current time.
  * IMPORTANT WE WILL EVENTUALLY HAVE TO CHANGE THE VARIABLE NAME x IF WE WANT THIS
  * FUNCTION TO WORK CORRECTLY! DELETE THIS COMMENT AFTER THE FACT.
  * @author Gregg Schofield but ultimately attributed to Gumbo
  * https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
  */
  function expSession() {
    if (isset($_SESSION['x'])) {
      if (time() - $_SESSION['x'] > MINS30) {
        endSession();
        if (session_id() != "" || isset($_COOKIE[session_name()])) {
          setcookie(session_name(), session_id(), time()-UNIXTIME, '/');
        }
      } else {
        $_SESSION['x'] = time();
      }
    }
  }

  /**
  * This function will set a new session identifier if there is not one already
  * set, or in the event that it is more than 30 minutes, a new one is generated.
  * This prevents session hijacking.
  * IMPORTANT WE WILL EVENTUALLY HAVE TO CHANGE THE VARIABLE NAME x IF WE WANT THIS
  * FUNCTION TO WORK CORRECTLY! DELETE THIS COMMENT AFTER THE FACT.
  * @author Gregg Schofield but ultimately attributed to Gumbo
  * https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
  */
  function genNewSessionIdentifier() {
    if (!isset($_SESSION['x'])) {
      $_SESSION['x'] = time();
    } elseif (time() - $_SESSION['x'] > MINS30) {
      session_regenerate_id();
      $_SESSION['x'] = time();
    }
  }
  
?>
