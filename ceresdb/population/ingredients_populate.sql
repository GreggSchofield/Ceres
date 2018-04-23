-- SQL statements to insert records into the ingredients table of the Ceres database
-- (execute this file to initially populate the database).
-- Created: 19/03/18
-- Author: Gregg Schofield

-- The ingredients relation schema has the ingredientID, ingredientName, calories,
-- protein, fat, sugar, fiber, carbohydrates, contentTags and weighting attributes
-- with character varying, character varying, real, real, real, real, real, real,
-- character varying and real types respectively.

-- comment this command out if you are attempting to populate this table for the
-- first time.
DELETE * FROM ingredients;

INSERT INTO ingredients VALUES (1,'sugar',  ,,,,,,'',);
INSERT INTO ingredients VALUES (2,'meat',,,,,,,'',);
INSERT INTO ingredients VALUES (3,'oil',,,,,,,'',);
INSERT INTO ingredients VALUES (4,'egg',,,,,,,'',);
INSERT INTO ingredients VALUES (5,'milk',,,,,,,'',);
INSERT INTO ingredients VALUES (6,'fat',,,,,,,'',);
INSERT INTO ingredients VALUES (7,'spice',,,,,,,'',);
INSERT INTO ingredients VALUES (8,'herb',,,,,,,'',);
INSERT INTO ingredients VALUES (9,'flour',,,,,,,'',);
INSERT INTO ingredients VALUES (10,'salt',,,,,,,'',);
INSERT INTO ingredients VALUES (11,'butter',,,,,,,'',);
INSERT INTO ingredients VALUES (12,'nut',,,,,,,'',);
INSERT INTO ingredients VALUES (13,'gluten',,,,,,,'',);
INSERT INTO ingredients VALUES (14,'soybean',,,,,,,'',);
INSERT INTO ingredients VALUES (15,'bread',,,,,,,'',);
INSERT INTO ingredients VALUES (16,'fish',,,,,,,'',);
INSERT INTO ingredients VALUES (17,'chicken',,,,,,,'',);
INSERT INTO ingredients VALUES (18,'cheese',,,,,,,'',);
INSERT INTO ingredients VALUES (19,'rice',,,,,,,'',);
INSERT INTO ingredients VALUES (20,'wheat',,,,,,,'',);
INSERT INTO ingredients VALUES (21,'food-colouring',,,,,,,'',);
INSERT INTO ingredients VALUES (22,'dairy-product',,,,,,,'',);
INSERT INTO ingredients VALUES (23,'juice',,,,,,,'',);
INSERT INTO ingredients VALUES (24,'water',,,,,,,'',);
INSERT INTO ingredients VALUES (25,'lemon',,,,,,,'',);
INSERT INTO ingredients VALUES (26,'vinegar',,,,,,,'',);
INSERT INTO ingredients VALUES (27,'sugar-substitute',,,,,,,'',);
INSERT INTO ingredients VALUES (28,'vegatable-oil',,,,,,,'',);
INSERT INTO ingredients VALUES (29,'peanut',,,,,,,'',);
INSERT INTO ingredients VALUES (30,'tomato',,,,,,,'',);
INSERT INTO ingredients VALUES (31,'chocolate',,,,,,,'',);
INSERT INTO ingredients VALUES (32,'starch',,,,,,,'',);
INSERT INTO ingredients VALUES (33,'maize',,,,,,,'',);
