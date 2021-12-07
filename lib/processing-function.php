<?php




function dataFromDb(): string
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
         INNER JOIN movie_genre m on movie.ID = m.MOVIE_ID
         INNER JOIN director d on movie.DIRECTOR_ID = d.ID';
}

function movieFromDBById($db_res, $id): array
{
	$result = [];
	$query = dataFromDb() . "\n" . 'WHERE ' . $id . ' = movie.ID;';
	$mysqli_result = mysqli_query($db_res, $query);
	if ($mysqli_result === false)
	{
		trigger_error('Ошибка запроса на получение фильма по id.', $error_level = E_USER_ERROR);
	}
	while ($row = $mysqli_result->fetch_assoc())
	{
		$row["id_actor"] = namesById($db_res, $row["id_actor"], ",");
		$result[$row["ID"]] = $row;
	}
	return call_user_func_array('array_merge', $result);
}
function movieFromDB($db_res, array $genres, $genre, $db_connect): array
{
	$result = [];
	if ($genre==='' or $genre == NULL)
	{
		$stmt = $db_connect->prepare(dataFromDb().';');
	}
	else
	{
		if (is_numeric($genre))
		{
			$filteredGenre = dataFromDb() . ' WHERE m.GENRE_ID=?;';
		}
		else
		{
			$filteredGenre = dataFromDb() . ' WHERE m.GENRE_CODE=?;';
		}
		$stmt = $db_connect->prepare($filteredGenre);
		$stmt->bind_param('s', $genre); // 's' specifies the variable type => 'string'
	}
	$stmt->execute();
	$mysqli_result = $stmt->get_result();
	if ($mysqli_result === false)
	{
		trigger_error("Список фильмов по выбранному жанру не доступен", E_USER_ERROR);
	}
	while ($row = $mysqli_result->fetch_assoc())
	{
		$row["id_genres"] = namesByGenres($genres, $row["id_genres"], ",");
		$result[$row["ID"]] = $row;
	}
	return $result;
}
function searchMovieInDB($db_res, $genres, $search_name, $db_connect): array {
	$result = [];
	$likeString = '%' . $search_name . '%';
	$stmt = $db_connect->prepare(dataFromDb()." WHERE movie.TITLE LIKE ?;");
	$stmt->bind_param("s", $likeString);
	$stmt->execute();
	$mysqli_result = $stmt->get_result();
	if ($mysqli_result === false)
	{
		trigger_error("Список фильмов по имени не доступен", E_USER_ERROR);
	}
	while ($row = $mysqli_result->fetch_assoc())
	{
		$row["id_genres"] = namesByGenres($genres, $row["id_genres"], ",");
		$result[$row["ID"]] = $row;
	}
	return $result;
}
function namesById($db_res, string $id, string $separator): array
{
	$explodeArray = explode($separator, $id);
	$query = 'SELECT * from actor;';
	$mysqli_result = mysqli_query($db_res, $query);
	if ($mysqli_result === false){
		trigger_error('Ошибка запроса на получение имени актёра id.', $error_level = E_USER_ERROR);}
	while ($actor = $mysqli_result->fetch_assoc()){
		$a[] = $actor;}
	foreach ($explodeArray as &$value){
		$value = $a[$value]['NAME'];}

	return $explodeArray;
}

function genresFromDB($db_res): array
{
	$query = "SELECT * FROM GENRE;";
	$mysqli_result = mysqli_query($db_res, $query);
	if ($mysqli_result === false)
	{
		trigger_error('Ошибка запроса на получение жанра.', $error_level = E_USER_ERROR);;
	}
	$result = [];
	while ($row = $mysqli_result->fetch_assoc())
	{
		$result[$row["ID"]] = ["CODE" => $row["CODE"], "NAME" => $row["NAME"]];
	}
	return $result;
}


function namesByGenres($gen, string $id, string $separator): array
{
	$explodeArray = explode($separator, $id);
	foreach ($explodeArray as &$value)
	{
		$value = $gen[$value]['NAME'];
	}
	return $explodeArray;
}




