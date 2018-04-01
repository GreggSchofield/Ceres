-- SQL statements to insert records into the recipie_tags table of the Ceres database
-- (execute this file to initially populate the database).
-- Created: 19/03/18
-- Author: Gregg Schofield

-- The recipie_tags relation schema has the recipieTagID and tagName attributes with
-- character varying and character varying types respectively.

-- comment this command out if you are attempting to populate this table for the
-- first time.
DELETE * FROM recipie_tags;

INSERT INTO recipie_tags VALUES ('','');
