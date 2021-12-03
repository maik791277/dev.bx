<?php
/** @var array $personalDataMovie */
/** @var $rating  */
/** @var int $movie_id */
/** @var array $movies */
require_once "./lib/helper-functions.php";
?>
<div>
	<div class="personal-page">
		<div class="personal-page--header">
			<div class="personal-page--header--title">
				<h2>
					<?= $personalDataMovie['TITLE']; ?>
				</h2>
				<h5>
					<?= $personalDataMovie['ORIGINAL_TITLE'] ?>
					<span class="age-restriction"><?= $personalDataMovie['AGE_RESTRICTION'] ?>+</span>
				</h5>
			</div>
			<div class="personal-page--header--favorites-icon" style="background-image: url(../../../resources/img/WzOrhL58_ls.jpg)">
				<div class="like-icon--hover" style="background-image: url(../../../resources/img/9K7B7hhXVvg.jpg)"></div>
			</div>
		</div>
		<hr class="personal-page--header--hr">
		<div class="personal-page-main">
			<div class="personal-page-main--poster " style="background-image: url(<?= "./resources/movie-images/"
			. $personalDataMovie['ID']
			. ".jpg" ?> )"></div>
			<div class="personal-page-main--about">
				<div class="personal-page-main--rating-block">
					<div class="rating-area">
						<?php
						foreach (array_reverse(range(1, 10)) as $number)
						{
							echo "<input type=\"radio\" id=\"star-" . $number . "\" name=\"rating\" value=\"" . $number . "\" disabled " . ($rating == $number ? "checked>" : ">");
							echo sprintf("<label for=\"star-%s\" title=\"Оценка «%s»\"></label>", $number, $number);
						}
						?>
					</div>
					<div class="movie-rating"><?= $personalDataMovie['RATING'] ?></div>
				</div>
				<h3>О фильме</h3>
				<div class="personal-page-main--about--table">
					<div class="personal-page-main--about--table-left">
						<span>Год производства:</span>
						<span>Режиссер:</span>
						<span>В главных ролях:</span>
					</div>
					<div class="personal-page-main--about--table-right">
						<span><?= $personalDataMovie['RELEASE_DATE'] ?></span>
						<span><?= $personalDataMovie['NAME'] ?></span>
						<span><?= implode($personalDataMovie['id_actor']) ?></span>
					</div>
				</div>
				<h3>Описание</h3>
				<div class="personal-page-main--about--description">
					<?= $personalDataMovie['DESCRIPTION'] ?>
				</div>
			</div>
		</div>
	</div>
</div>
