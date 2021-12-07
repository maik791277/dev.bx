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
$genres = genresFromDB($connecting_database);
$currentPage=$_SERVER['REQUEST_URI'];

if (isset($_GET['genre']))
{
	$getGenres = $_GET['genre'];
	$movies = movieFromDB($connecting_database,$genres,$getGenres,$connecting_database);
}
elseif (isset($_GET['search']) and strlen($_GET['search']) > 0)
{
	$getGenres = '';
	$getSearch = $_GET['search'];
	$movies = searchMovieInDB($connecting_database, $genres, $getSearch, $connecting_database);
}
else
{
	$getGenres = '';
	$movies = movieFromDB($connecting_database, $genres, $getGenres,$connecting_database);
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





