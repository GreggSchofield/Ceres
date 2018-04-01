-- SQL statements to insert records into the users table of the Ceres database
-- (execute this file to initially populate the database).
-- Created: 19/03/18
-- Author: Gregg Schofield

-- The users relation schema has the userID, email, password, joinDate, gender,
-- dateOfBirth, displayName, bio, dietaryRequirements, height, weight,
-- activityLevel and dateSinceLasAccess attributes with character varying,
-- character varying, character varying, date, boolean, date, character varying,
--character varying, character varying, real, real, real and date types respectively.

-- comment this command out if you are attempting to create this table for the
-- first time.
DELETE * FROM users;

INSERT INTO users VALUES ('','','',,,,'','','',,,,);
