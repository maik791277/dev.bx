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
if (isset($_GET['genre']))
{
	$genre = $_GET['genre'];
}
else
{
	$genre = '';
}

$contentPage = renderTemplate("", [
	"movies" => $movies,
]);

renderLayout($contentPage, [
	"genres" => $genres,
	"current_page" => $genre,
	"config" => $config,
]);
