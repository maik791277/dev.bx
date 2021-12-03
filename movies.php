<?php
declare(strict_types = 1);
/** @var array $genres */
/** @var array $movies */
/** @var array $config */
require_once "./lib/helper-functions.php";
require_once "./lib/template-functions.php";
require_once "./lib/processing-function.php";
require_once "./lib/connecting-database.php";
require_once "./data/configuration.php";
error_reporting(-1);

$connecting_database = dbConnect($config);
$movieId = (int)$_GET['id'];
$personalDataMovie = getMovieFromDbById($connecting_database, $movieId);
$genres = getGenresFromDB($connecting_database);

if (!$personalDataMovie)
{
	echo '404 страница не найдена';
	exit();
}

if (isset($_GET['id']))
{
	$movieId = (int)$_GET['id'];
	$personalDataMovie = getMovieFromDbById($connecting_database, $movieId);
	$rating = floor($personalDataMovie['RATING']);
}
else
{
	$movieId ='1';
	exit();
}

$rating = floor($personalDataMovie['RATING']);
$personalPageMovie = renderTemplate("./resources/pages/page_movies/movies_content.php", [
	"movieId" => $movieId,
	"personalDataMovie" => $personalDataMovie,
	"rating" => $rating,
]);

renderLayout($personalPageMovie, [
	"genres" => $genres,
	"config" => $config,
]);













