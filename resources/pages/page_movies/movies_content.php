<?php
/** @var array $movie_details */
/** @var int $movie_id */
/** @var array $movies */


if (!$movie_details)
{
	echo '404 такова фильма нет';
	exit();
}

$rating = floor($movie_details['rating'])
?>


<div>
	<div class="personal-page">
		<div class="personal-page--header">
			<div class="personal-page--header--title">
				<h2>
					<?= $movie_details['title']; ?>
				</h2>
				<h5>
					<?= $movie_details['original-title'] ?>
					<span class="age-restriction"><?= $movie_details['age-restriction'] ?>+</span>
				</h5>
			</div>
			<div class="personal-page--header--favorites-icon" style="background-image: url(../../../resources/img/WzOrhL58_ls.jpg)">
				<div class="like-icon--hover" style="background-image: url(../../../resources/img/9K7B7hhXVvg.jpg)"></div>
			</div>
		</div>
		<hr class="personal-page--header--hr">
		<div class="personal-page-main">
			<div class="personal-page-main--poster " style="background-image: url(<?= "./resources/movie-images/"
			. $movie_details['id']
			. ".jpg" ?> )"></div>
			<div class="personal-page-main--about">
				<div class="personal-page-main--rating-block">
					<!--			рейтинг фильма-->
					<div class="rating-area">
						<?php
						foreach (array_reverse(range(1, 10)) as $number)
						{
							echo "<input type=\"radio\" id=\"star-"
								. $number
								. "\" name=\"rating\" value=\""
								. $number
								. "\" disabled "
								. ($rating == $number ? "checked>" : ">");
							echo sprintf("<label for=\"star-%s\" title=\"Оценка «%s»\"></label>", $number, $number);
						}
						?>
					</div>
					<!--			рейтинг фильма конец-->
					<div class="movie-rating"><?= $movie_details['rating'] ?></div>
				</div>
				<h3>О фильме</h3>
				<div class="personal-page-main--about--table">
					<div class="personal-page-main--about--table-left">
						<span>Год производства:</span>
						<span>Режиссер:</span>
						<span>Жанры:</span>
						<span>В главных ролях:</span>
					</div>
					<div class="personal-page-main--about--table-right">
						<span><?= $movie_details['release-date'] ?></span>
						<span><?= $movie_details['director'] ?></span>
						<span><?= implode(", ", $movie_details['genres']) ?></span>
						<span><?= implode(", ", $movie_details['cast']) ?></span>
					</div>
				</div>
				<h3>Описание</h3>
				<div class="personal-page-main--about--description">
					<?= $movie_details['description'] ?>
				</div>
			</div>
		</div>
	</div>
</div>
