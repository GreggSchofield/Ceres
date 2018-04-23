-- SQL statement to create an index on the key attribute of the reviews
-- relation within the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
--DROP INDEX reviews_reviewID_index ON reviews;

CREATE INDEX IF EXISTS reviews_reviewID_index
  USING HASH
  ON reviews (reviewID)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
