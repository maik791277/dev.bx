<?php
/** @var array $movies */
/** @var array $genres */
require_once "./lib/helper-functions.php";
require './data/array-genres.php';


?>

<?php foreach ($movies as $movie): ?>

	<div class="card">
		<div class="card-constructions">
			<div class="img-card" style="background-image: url(<?= "./resources/movie-images/"
			. $movie['id']
			. ".jpg" ?> )"></div>
			<div class="container-card">
				<h4><?= $movie['title'] ?> (<?= $movie['release-date'] ?>)</h4>
				<p class="sub-title"><?= $movie['original-title'] ?></p>
				<p class="ggg"></p>
				<div class="al1">
					<p class="description"><?= $movie['description'] ?></p>
					<div class="movie-time-genres">
						<img class="movie-time-icon" src="resources/img/clock1.png" alt="clock1">
						<p class="time"><?= $movie['duration'] ?> мин. / <?= convertToHoursMins(
								$movie['duration']
							) ?></p>
						<p class="genres"><?= implode(", ", array_slice($movie['genres'], 0, 2)) ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay">
			<a class="card-button1" href="/movies.php?id=<?= $movie['id'] ?>">Подробнее</a>
			<!--			<input class="card-button1" type="submit" value="Подробнее">-->
		</div>
	</div>

<?php endforeach; ?>





