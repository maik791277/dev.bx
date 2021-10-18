<?php

/**@var array $movies */
require 'movies.php';

$i=1;

echo "Ведите ваш возраст: ";
$age=readline();

if (is_numeric($age)) {
	echo "Ваш возраст: $age+ " . "\n"."Вам доступны следующие фильмы c возрастным рейтингом $age+ и ниже:" . "\n";
}else{
	echo "Ведите только ваш возраст (цаифрами)"; exit();
}

function FormFilling (array $movies): string
{
	return ". {$movies['title']} ({$movies['release_year']}), {$movies['age_restriction']}+. Rating - {$movies['rating']} \n";
}

foreach($movies as $Films)
{
	if($Films["age_restriction"] <= $age)

		echo $i++.FormFilling($Films);
}