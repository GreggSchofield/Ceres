-- SQL statements to insert records into the users table of the Ceres database
-- (execute this file to initially populate the database).
-- Created: 19/03/18
-- Author: Gregg Schofield

-- The users relation schema has the userID, email, password, joinDate, gender,
-- dateOfBirth, displayName, bio, dietaryRequirements, height, weight,
-- activityLevel and dateSinceLasAccess attributes with character varying,
-- character varying, character varying, date, boolean, date, character varying,
-- character varying, character varying, real, real, real and date types respectively.

-- comment this command out if you are attempting to populate this table for the
-- first time.
DELETE * FROM users;

INSERT INTO users VALUES (1,'ussoffutir-3709@yopmail.com','',NOW(),'M','1982-03-09','Rivers Urswick','Lorem ipsum dolor sit amet, usu an everti iriure, nec posse mazim legimus ut.','Vegan',175.3,82.1,0.7,NOW());
INSERT INTO users VALUES (2,'ennarimez-0721@yopmail.com','',NOW(),'M','1987-12-06','Laurenc Nambiar','Ne meis possim splendide ius, quidam eleifend vim eu, eum iusto errem impedit ei.','None',167.7,80.9,0.5,NOW());
INSERT INTO users VALUES (3,'icuduffam-6650@yopmail.com','',NOW(),'F','1992-07-21','Silvia Dion','In duo nostro quaestio, pro dicam inciderint id.','Vegan',193.3,72.3,0.3,NOW());
INSERT INTO users VALUES (4,'duzepagu-6918@yopmail.com','',NOW(),'M','1995-09-22','Proculeius George','Eu per quis error tantas. Illum virtute nusquam vim ad, cu sed ignota virtute.','None',184.0,67.5,0.3,NOW());
INSERT INTO users VALUES (5,'adefassep-4748@yopmail.com','',NOW(),'F','2001-01-03','Jane Quintus (Joan)','Sit ei error recteque definitiones, cum id tation audiam voluptatibus.','None',147.3,90.6,0.5,NOW());
INSERT INTO users VALUES (6,'mygumetiw-8835@yopmail.com','',NOW(),'O','2003-03-14','Countess Seyward','Ea mei unum molestiae definitiones, cu ullum aperiri prodesset has.','Vegetarian',182.3,87.1,0.6,NOW());
INSERT INTO users VALUES (7,'agutalyre-3980@yopmail.com','',NOW(),'M','2000-04-04','Philostrate Donjohn','No nam reque animal, sint dictas rationibus nam et.','Vegan',178.3,84.5,0.6,NOW());
INSERT INTO users VALUES (8,'wuveqefi-4926@yopmail.com','',NOW(),'F','1967-12-30','Mary Mate','In tibique commune referrentur duo, ut eos zril ponderum.','None',191.1,75.4,0.7,NOW());
INSERT INTO users VALUES (9,'eppaxellar-7801@yopmail.com','',NOW(),'F','1974-12-17','Krishna Claudius','Vis congue appareat iudicabit ut.','None',139.4,90.5,0.1,NOW());
INSERT INTO users VALUES (10,'rarrelebi-6122@yopmail.com','',NOW(),'M','1999-09-19','Say Grey','Te munere iisque numquam eum, purto nominati nam ut.','None',156.1,68.3,0.1,NOW());
INSERT INTO users VALUES (11,'ganezatepp-4811@yopmail.com','',NOW(),'M','1995-01-11','Andrew Lodowick','Vis ad nibh perfecto interesset, ad usu solum bonorum dissentiunt.','Vegetarian',184.3,95.3,0.1,NOW());
INSERT INTO users VALUES (12,'dymemannex-5935@yopmail.com','',NOW(),'O','1997-08-19','Olivia Lincoln (Lyvia)','Hinc fabulas pertinacia ad vim. An eos viris delicata.','None',169.0,47.6,0.2,NOW());
