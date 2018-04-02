-- SQL query to return all recipie attributes of a user profile where the userID
-- attributes match the ones given by the user. The results are ordered by
-- the recipieViews in descending order.
-- NOTE I have used the ?_ syntax to denote the variable of the implementation
-- scripting language.
-- Created: 02/04/18
-- Author: Gregg Schofield

SELECT *
FROM
  users AS u,
  recipies AS r
INNER JOIN u ON
  u.userID = ?_userID
GROUP BY
  r.recipieName
ORDER BY
  COUNT(recipieViews) DESC;
