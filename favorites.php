<?php
declare(strict_types = 1);
/** @var array $genres */
/** @var array $movies */
/** @var array $config */
/** @var array $config */
require_once "./data/configuration.php";
require_once "./lib/connecting-database.php";
require_once "./lib/processing-function.php";

require_once "./lib/helper-functions.php";
require_once "./lib/template-functions.php";
$currentPage=$_SERVER['REQUEST_URI'];

$contentPage = renderTemplate("", [
	"movies" => $movies,
]);

renderLayout($contentPage, [
	"genres" => $genres,
	"config" => $config,
	"currentPage" => $currentPage,
]);