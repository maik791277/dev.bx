<?php

/**@var array $movies */
require 'movies.php';

$i=1;

echo "Ведите ваш возраст: ";
$age = readline();

if (is_numeric($age)) {
	echo "Ваш возраст: $age+ " . "\n"."Вам доступны следующие фильмы c возрастным рейтингом $age+ и ниже:" . "\n";
} else {
	echo "Ведите только ваш возраст (цаифрами)"; exit();
}

function formatMovie (array $movie): string {
	return ". {$movie['title']} ({$movie['release_year']}), {$movie['age_restriction']}+. Rating - {$movie['rating']} \n";
}

foreach($movies as $movie) {
	if($movie["age_restriction"] <= (int)$age) {
		echo $i++.formatMovie($movie);
	}
}

