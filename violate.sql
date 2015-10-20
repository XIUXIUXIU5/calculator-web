INSERT INTO Movie
VALUES(4657,"Just kidding",1890,"PG","20th Century Fox");
-- Violates the PRIMARY KEY constraint since each movie in the Movie table should have a unique ID but movie with ID 4657 was already in the table.
-- ERROR 1062 (23000) at line 1: Duplicate entry '4657' for key 'PRIMARY'


INSERT INTO Movie
VALUES(60000,"Happy",-5,"PG","20th Century Fox");
-- Violates the CHECK constraint since the year of each movie should between 0-2015.

INSERT INTO Actor
VALUES(135,"Acton","Ada","Female",19910101,NULL);
-- Violates the PRIMARY KEY constraint since each actor in the Actor table should have a unique ID but actor with ID 135 was already in the table.
-- ERROR 1062 (23000) at line 2: Duplicate entry '135' for key 'PRIMARY'


INSERT INTO Actor
VALUES(4000,"Ack","Bedn","AAA", 18940204,NULL);
-- Violates the CHECK constraint since the sex gender of each actor should either be male or female.

INSERT INTO Director
VALUES(45604, "Schell","Adam",19870401,NULL);
-- Violates the PRIMARY KEY constraint since each director in the Director table should have a unique ID but director with ID 45604 was already in the table.
-- ERROR 1062 (23000) at line 1: Duplicate entry '45604' for key 'PRIMARY'


INSERT INTO MovieGenre
VALUES(5000,"Crime");
-- Violates the FOREIGN KEY constraint since each movie ID here should also appear in the Movie table.
-- ERROR 1452 (23000) at line 1: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieGenre`, CONSTRAINT `MovieGenre_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))


INSERT INTO MovieDirector
VALUES(50000,974);
-- Violates the FOREIGN KEY constraint for movie ID since each movie ID here should also appear in the Movie table.
-- ERROR 1452 (23000) at line 1: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))


INSERT INTO MovieDirector
VALUES(831,600000);
-- Violates the FOREIGN KEY constraint for director ID since each director ID here should also appear in the Director table.
-- ERROR 1452 (23000) at line 1: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))


INSERT INTO MovieActor
VALUES(50000,180,"Captain");
-- Violates the FOREIGN KEY constraint for movie ID since each movie ID here should also appear in the Movie table.
-- ERROR 1452 (23000) at line 1: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))


INSERT INTO MovieActor
VALUES(1004,600000,"Jemi");
-- Violates the FOREIGN KEY constraint for actor ID since each actor ID here should also appear in the Actor table.
-- ERROR 1452 (23000) at line 1: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `Actor` (`id`))

INSERT INTO Review
VALUES("Emily",'2015-10-20 00:00:01',50000,2,"Bad movie");
-- Violates the FOREIGN KEY constraint for movie ID since each movie ID here should also appear in the Movie table.
-- ERROR 1452 (23000) at line 1: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`Review`, CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))

INSERT INTO Review
VALUES("Jane",'2015-10-20 00:00:01',831,-2,"Good movie");
-- Violates the CHECK constraint for the rating since the rating should be non negative.

