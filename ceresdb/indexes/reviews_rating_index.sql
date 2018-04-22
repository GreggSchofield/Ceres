-- SQL statement to create an index on the rating attribute of the
-- reviews relation within the Ceres database.
-- Created: 23/04/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
--DROP INDEX reviews_rating_index ON reviews;

CREATE INDEX reviews_rating_index
  USING BTREE
  ON reviews (rating)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
