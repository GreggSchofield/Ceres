-- SQL statements to create indexes on a subset of attributes of the users relation
-- within the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
DROP INDEX users_index;

CREATE INDEX users_index ON users USING HASH (userID);

-- comment this command out if you are attempting to create this index for the
-- first time.
DROP INDEX users_joinDate_index;

CREATE INDEX users_joinDate_index ON users USING B-tree (joinDate);
