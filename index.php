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
$currentPage=$_SERVER['REQUEST_URI'];

if (isset($_GET['genre']))
{
	$movies = filterMovies($movies, $_GET['genre'],$genres);
	$genre = $_GET['genre'];
}
else
{
	$genre = '';
}

if (isset($_GET['search']))
{
	if (strlen($_GET['search']) > 0)
	{
		$movies = movieSearch($movies, $_GET['search']);
	}
}

$contentPage = renderTemplate("./resources/pages/index/content.php", [
	"movies" => $movies,
]);


renderLayout($contentPage, [
	"genres" => $genres,
	"current_page" => $genre,
	"config" => $config,
	"currentPage" => $currentPage,
]);





