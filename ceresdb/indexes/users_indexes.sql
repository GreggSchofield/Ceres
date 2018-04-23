-- SQL statement to create an index on the key attribute of the users
-- relation within the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
DROP INDEX users_userID_index ON users;

CREATE INDEX IF EXISTS users_userID_index
  USING HASH
  ON users (userID)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
