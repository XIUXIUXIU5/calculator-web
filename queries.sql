SELECT first,last
FROM Actor
WHERE id IN 
(
	SELECT aid FROM MovieActor WHERE mid = 
	(SELECT id FROM Movie WHERE title = 'Die Another Day')
);

SELECT COUNT(A.aid)
FROM MovieActor A, MovieActor B
WHERE A.aid<B.aid AND A.mid=B.mid;