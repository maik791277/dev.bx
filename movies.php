<?php
declare(strict_types = 1);
/** @var array $genres */
/** @var array $movies */
/** @var array $config */
require_once "./data/array-urls.php";
require_once './data/array-genres.php';
require_once "./data/array-movies.php";
require_once "./lib/helper-functions.php";
require_once "./lib/template-functions.php";
error_reporting(-1);


$movie_details = getMovie($movies, $_GET['id']);

$contentPage = renderTemplate("./resources/pages/page_movies/movies_content.php", [
	"movies" => $movies,
	"movie_details" => $movie_details,
]);

renderLayout($contentPage, [
	"genres" => $genres,
	"config" => $config,
]);












