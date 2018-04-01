-- SQL statements to insert records into the reviews table of the Ceres database
-- (execute this file to initially populate the database).
-- Created: 19/03/18
-- Author: Gregg Schofield

-- The reviews relation schema has the reviewID, userID, recipieID, reviewText,
-- rating and dateTimePosted attributes with character varying, character varying,
-- character varying, text, smallint and timestamp with time zone types respectively.

-- comment this command out if you are attempting to create this table for the
-- first time.
DELETE * FROM reviews;

INSERT INTO reviews VALUES ('','','','',,,);
