-- SQL query to return the userID and password attributes of a
-- user profile where the displayName and email attributes match the
-- ones given by the user.
-- NOTE I have used the ?_ syntax to denote the variable of the implementation
-- scripting language.
-- Created: 02/04/18
-- Author: Gregg Schofield

SELECT
  u.displayName, u.password
FROM
  users AS u
WHERE
  ?_displayName = u.displayName
  AND
  ?_email = u.email
