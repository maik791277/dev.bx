<?php
declare(strict_types = 1);
/** @var array $config */

require_once "./data/configuration.php";
require_once "./lib/connecting-database.php";
require_once "./lib/processing-function.php";

require_once "./lib/helper-functions.php";
require_once "./lib/template-functions.php";
error_reporting(-1);
$connecting_database = dbConnect($config);
$genres = GenresFromDB($connecting_database);
$currentPage=$_SERVER['REQUEST_URI'];

if (isset($_GET['genre']))
{
	$getGenres = $_GET['genre'];
	$movies = MovieFromDB($connecting_database,$genres,$getGenres);
}
else
{
	$getGenres = '';
	$movies = MovieFromDB($connecting_database, $genres, $getGenres);
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
	"getGenres" => $getGenres,
	"config" => $config,
	"currentPage" => $currentPage,
]);





