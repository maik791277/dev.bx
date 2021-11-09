<?php

function convertToHoursMins($time, $format = '%02d:%02d')
{
	if ($time < 1)
	{
		return;
	}
	$hours = floor($time / 60);
	$minutes = ($time % 60);

	return sprintf($format, $hours, $minutes);
}



function filter_movies( array $movies, string $genre, array $genres)
{
	$new_movies = [];
	foreach ($movies as $key => $item)
	{
		$genre_key = $genres[$genre];
		if (in_array($genre_key, $item['genres']))
		{
			$new_movies[] = $item;
		}
		$movies = $new_movies;
	}
	return $movies;
}




function get_movie(array $movies, $id)
{
	foreach ($movies as $movie)
	{
		if ($movie['id'] == $id)
		{
			return $movie;
		}
	}
}