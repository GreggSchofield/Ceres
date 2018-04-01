-- SQL statements to insert records into the recipies table of the Ceres database
-- (execute this file to initially populate the database).
-- Created: 19/03/18
-- Author: Gregg Schofield

-- The recipies relation schema has the recipieID, userID, recipieName,
-- dateUploaded, pictureURL, steps, uses, recipieViews, tags and servings
-- attributes with character varying, character varying, character varying,
-- timestamp with time zone, character varying, character varying, integer,
-- integer, character varying and integer types respectively.

-- comment this command out if you are attempting to create this table for the
-- first time.
DELETE * FROM recipies;

INSERT INTO recipies VALUES ('','','',,'','',,,'',);
