<?php
/** @var array $movies */
/** @var array $genres */
/** @var array $filteredMovies */
require_once "./lib/helper-functions.php";


?>

<?php foreach ($movies as $movie): ?>

	<div class="card">
		<div class="card-constructions">
			<div class="img-card" style="background-image: url(<?= "./resources/movie-images/" . $movie['ID'] . ".jpg" ?> )"></div>
			<div class="container-card">
				<h4><?= $movie['TITLE'] ?> (<?= $movie['RELEASE_DATE'] ?>)</h4>
				<p class="sub-title"><?= $movie['ORIGINAL_TITLE'] ?></p>
				<p class="ggg"></p>
				<div class="al1">
					<p class="description"><?= $movie['DESCRIPTION'] ?></p>
					<div class="movie-time-genres">
						<img class="movie-time-icon" src="resources/img/clock1.png" alt="clock1">
						<p class="time"><?= $movie['DURATION'] ?> мин. / <?= convertToHoursMins($movie['DURATION']) ?></p>
						<p class="genres"><?= implode(", ", array_slice($movie['id_genres'],0,2)) ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay">
			<a class="card-button1" href="/movies.php?id=<?= $movie['ID'] ?>">Подробнее</a>
		</div>
	</div>

<?php endforeach; ?>





