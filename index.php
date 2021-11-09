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
	$movies = filter_movies($movies, $_GET['genre'],$genres);
	$genre = $_GET['genre'];
}
else
{
	$genre = '';
}

// if ($_GET['genre'])
// {
// 	$new_movies = [];
// 	foreach ($movies as $key => $item)
// 	{
// 		$genre_key = $genres[$_GET['genre']];
// 		if (in_array($genre_key, $item['genres']))
// 		{
// 			$new_movies[] = $item;
// 		}
// 		$movies = $new_movies;
// 	}
// }



// if	($_GET['search'])
// {
// 	$new_movies = [];
// 	foreach ($movies as $item)
// 	{
// 		echo $item['title'];
// 		if ( stristr($item['title'], $_GET['search'])!== false)       я не понимаю почему поиск не работает!!!
// 		{
// 			array_push($new_movies,$item);
// 		}
// 		$movies = $new_movies;
// 	}
// }


$contentPage = renderTemplate("./resources/pages/index/content.php", [
	"movies" => $movies,
]);



renderLayout($contentPage, [
	"genres" => $genres,
	"current_page" => $genre,
	"config" => $config,
	"currentPage" => $currentPage,
]);





