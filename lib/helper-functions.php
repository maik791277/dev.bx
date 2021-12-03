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


function movieSearch( array $movies , string $searcher)
{
	$new_movies = [];
	foreach ($movies as $item)
	{
		if ( mb_stristr($item['TITLE'], $searcher)!== false)
		{
			$new_movies[] = $item;
		}
		$movies = $new_movies;
	}
	return $movies;
}


