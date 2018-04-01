-- SQL statements to create indexes on a subset of attributes of the recipies relation
-- within the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
DROP INDEX recipies_index;

CREATE INDEX recipies_index ON recipies USING HASH (recipieID);
