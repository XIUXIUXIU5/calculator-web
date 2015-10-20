-- Query to show the names of all the actors in the movie 'Die Another Day.'
-- We combine three tables which are the Actor table, the Movie table and the Movie Actor table
-- We then check the title attribute in the Movie table and then get the Movie id.
-- We then use that movie Id to get the actors' IDs in the MovieActor table
-- We then find the first names and last names of the actors by checking the actors' IDs in the Actor table.
SELECT first,last
FROM Actor, Movie, MovieActor
WHERE Movie.title="Die Another Day" AND Movie.id = MovieActor.mid AND MovieActor.aid = Actor.id;

-- Query to count the number of actors who acted in multiple movies.
-- We first joined the MovieActor table with itself and check the conditions such that the actor ID matched while the movie ID did not match.
-- We then calculate how many distinct actor IDs there are using the COUNT method.
SELECT COUNT(DISTINCT A.aid)
FROM MovieActor A, MovieActor B
WHERE A.aid=B.aid AND A.mid<B.mid;


-- Query to calculate the numberof movies with genre "Crime".
-- We choose all the tuples with the condition that genre="Crime" from the MovieGenre table. 
-- We then use the aggregate COUNT(*) method to calculate the total number.
SELECT count(*)
FROM MovieGenre
WHERE genre = "Crime";