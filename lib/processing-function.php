<?php



function DataFromDb(): string
{
	return 'SELECT movie.ID,
       movie.TITLE,
       movie.ORIGINAL_TITLE,
       movie.DESCRIPTION,
       movie.DURATION,
       movie.AGE_RESTRICTION,
       movie.RELEASE_DATE,
       RATING,
       d.NAME,
       (SELECT GROUP_CONCAT(mg.GENRE_ID)
        FROM movie_genre AS mg
        WHERE mg.MOVIE_ID = movie.ID) AS id_genres,
       (SELECT GROUP_CONCAT(ma.ACTOR_ID)
        FROM movie_actor AS ma
        WHERE ma.MOVIE_ID = movie.ID) AS id_actor
FROM movie
	     INNER JOIN director d on movie.DIRECTOR_ID = d.ID';
}

function MovieFromDbById($db_res, $id): array
{
	$result = [];
	$query = DataFromDb() . "\n" . 'WHERE ' . $id . ' = movie.ID;';
	$mysqli_result = mysqli_query($db_res, $query);
	if ($mysqli_result === false)
	{
		trigger_error();
	}
	while ($row = $mysqli_result->fetch_assoc())
	{
		$row["id_actor"] = NamesById($db_res, $row["id_actor"], ",");
		$result[$row["ID"]] = $row;
	}
	return call_user_func_array('array_merge', $result);
}
function MovieFromDB($db_res, array $genres, $genre): array
{
	$result = [];
	$notFilteredGenre = DataFromDb();
	$filteredGenre = DataFromDb() . "\n" . 'WHERE ' . $genre . ' IN (SELECT mg.GENRE_ID
           FROM movie_genre AS mg
           WHERE mg.MOVIE_ID = movie.ID);';
	$query = $genre === "" ? $notFilteredGenre : $filteredGenre;

	$mysqli_result = mysqli_query($db_res, $query);
	if ($mysqli_result === false)
	{
		trigger_error();
	}
	while ($row = $mysqli_result->fetch_assoc())
	{
		$row["id_genres"] = NamesByGenres($genres, $row["id_genres"], ",");
		$result[$row["ID"]] = $row;
	}
	return $result;
}
function NamesById($db_res, string $id, string $separator): array
{
	$explodeArray = explode($separator, $id);
	$query = 'SELECT * from actor;';
	$mysqli_result = mysqli_query($db_res, $query);
	if ($mysqli_result === false){
		trigger_error();}
	while ($actor = $mysqli_result->fetch_assoc()){
		$a[] = $actor;}
	foreach ($explodeArray as &$value){
		$value = $a[$value]['NAME'];}

	return $explodeArray;
}

function GenresFromDB($db_res): array
{
	$query = "SELECT * FROM GENRE;";
	$mysqli_result = mysqli_query($db_res, $query);
	if ($mysqli_result === false)
	{
		trigger_error();
	}
	$result = [];
	while ($row = $mysqli_result->fetch_assoc())
	{
		$result[$row["ID"]] = ["CODE" => $row["CODE"], "NAME" => $row["NAME"]];
	}
	return $result;
}


function NamesByGenres($gen, string $id, string $separator): array
{
	$explodeArray = explode($separator, $id);
	foreach ($explodeArray as &$value)
	{
		$value = $gen[$value]['NAME'];
	}
	return $explodeArray;
}




