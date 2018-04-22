-- SQL statement to create an index on the joinDate and activityLevel of the
-- users relation within the Ceres database.
-- Created: 23/04/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
--DROP INDEX users_joinDate_activityLevel_index ON users;

CREATE INDEX users_joinDate_activityLevel_index
  USING BTREE
  ON users (joinDate,activityLevel)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
