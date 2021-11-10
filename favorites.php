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
$currentPage=$_SERVER['REQUEST_URI'];

if (isset($_GET['search']))
{
	if (strlen($_GET['search']) > 0)
	{
		$movies = movieSearch($movies, $_GET['search']);
	}
}

$contentPage = renderTemplate("", [
	"movies" => $movies,
]);

renderLayout($contentPage, [
	"genres" => $genres,
	"config" => $config,
	"currentPage" => $currentPage,
]);