-- This is an SQL script that deletes all tables in the Ceres database
-- taking into account foreign-key dependencies and then re-builds the
-- database, again, taking into account foreign-key dependencies.

-- Note that this should NOT be included in the final version of the Ceres
-- system. This script should only be used for testing purposes.

-- Author: Gregg Schofield

-- First delete all of the existing tables:
DROP TABLE IF EXISTS 'follows';
DROP TABLE IF EXISTS 'recipe_tags';
DROP TABLE IF EXISTS 'recipe_ingredients';
DROP TABLE IF EXISTS 'reviews';
DROP TABLE IF EXISTS 'recipes';
DROP TABLE IF EXISTS 'saved_recipes';
DROP TABLE IF EXISTS 'tags';
DROP TABLE IF EXISTS 'user_ingredients';
DROP TABLE IF EXISTS 'ingredients';
DROP TABLE IF EXISTS 'users';

-- Then re-build the tables:
CREATE TABLE IF NOT EXISTS users (
	userID MEDIUMINT UNIQUE NOT NULL AUTO_INCREMENT,
	email VARCHAR (32) NOT NULL,
	password VARCHAR (20) NOT NULL,
	joinDate TIMESTAMP NOT NULL,
	gender CHAR,
	dateOfBirth date,
	displayName VARCHAR (20) NOT NULL,
	bio TINYTEXT,
	dietaryRequirements VARCHAR (20),
	height FLOAT,
	weight FLOAT,
	activityLevel FLOAT,
	dateSinceLasAccess date NOT NULL,
	PRIMARY KEY (userID)
);

CREATE TABLE IF NOT EXISTS ingredients (
	ingredientID MEDIUMINT UNIQUE NOT NULL AUTO_INCREMENT,
	ingredientName VARCHAR (64) NOT NULL,
	calories FLOAT NOT NULL,
	protein FLOAT NOT NULL,
	fat FLOAT NOT NULL,
	sugar FLOAT NOT NULL,
	fiber FLOAT NOT NULL,
	carbohydrates FLOAT NOT NULL,
	contentTags VARCHAR (1000),
	weighting FLOAT NOT NULL,
	PRIMARY KEY (ingredientID)
);

CREATE TABLE IF NOT EXISTS user_ingredients (
	userID MEDIUMINT NOT NULL,
	ingredientID MEDIUMINT NOT NULL,
	weighting integer NOT NULL,
	FOREIGN KEY (userID) REFERENCES users (userID),
	FOREIGN KEY (ingredientID) REFERENCES ingredients (ingredientID)
);

CREATE TABLE IF NOT EXISTS tags (
	tagID MEDIUMINT UNIQUE NOT NULL AUTO_INCREMENT,
	tagName VARCHAR (32) NOT NULL,
	PRIMARY KEY (tagID)
);

CREATE TABLE IF NOT EXISTS saved_recipes (
	userID MEDIUMINT NOT NULL,
	recipeID MEDIUMINT NOT NULL,
	PRIMARY KEY (userID, recipeID)
);

CREATE TABLE IF NOT EXISTS recipes (
	recipeID MEDIUMINT UNIQUE NOT NULL AUTO_INCREMENT,
	userID MEDIUMINT NOT NULL,
	recipeName VARCHAR (100) NOT NULL,
	dateUploaded TIMESTAMP NOT NULL,
	pictureURL VARCHAR (64),
	steps VARCHAR (1000) NOT NULL,
	uses INT NOT NULL,
	recipeViews INT NOT NULL,
	servings INT NOT NULL,
	PRIMARY KEY (recipeID),
	FOREIGN KEY (userID) REFERENCES users (userID)
);

CREATE TABLE IF NOT EXISTS reviews (
	reviewID MEDIUMINT UNIQUE NOT NULL AUTO_INCREMENT,
	userID MEDIUMINT NOT NULL,
	recipeID MEDIUMINT NOT NULL,
	reviewText text,
	rating smallint,
	dateTimePosted TIMESTAMP NOT NULL,
	FOREIGN KEY (userID) REFERENCES users (userID),
	FOREIGN KEY (recipeID) REFERENCES recipes (recipeID)
);

CREATE TABLE IF NOT EXISTS recipe_ingredients (
	recipeID MEDIUMINT NOT NULL,
	ingredientID MEDIUMINT NOT NULL,
	weight REAL NOT NULL,
	FOREIGN KEY (recipeID) REFERENCES recipes(recipeID),
	FOREIGN KEY (ingredientID) REFERENCES ingredients(ingredientID)
);

CREATE TABLE IF NOT EXISTS recipe_tags (
	recipeID MEDIUMINT NOT NULL,
	tagID MEDIUMINT NOT NULL
);

CREATE TABLE IF NOT EXISTS follows (
	userIDa MEDIUMINT NOT NULL,
	userIDb MEDIUMINT NOT NULL,
	dateOfFollow TIMESTAMP NOT NULL,
	weighting integer NOT NULL,
	FOREIGN KEY (userIDa) REFERENCES users(userID),
	FOREIGN KEY (userIDb) REFERENCES users(userID)
);
