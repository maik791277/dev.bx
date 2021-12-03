<?php
/** @var array $genres */
/** @var string $currentPage */
/** @var string $current_page */
/** @var array $movies */
/** @var string $content */
/** @var array $config */
/** @var $getGenres */

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BITFLIX</title>

	<link rel="stylesheet" type="text/css" href="resources/css/Reset.css">
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<link rel="stylesheet" type="text/css" href="resources/css/personal-pages-style.css">
</head>
<body>
<div class="wrapper">
	<div class="sidebar">
		<img class="logo" src="resources/img/Group3.png" alt="Group3">
		<ul class="menu">
			<li class="menu-item">
				<a class="<?php if ($currentPage === $config['menu']['Главная']){echo 'active_zone';} ?>" href="<?= $config['menu']['Главная'] ?>">Главная</a>
			</li>
			<li class="menu-item">
				<input type="checkbox" class="expand-genres-button" id="expand-genres-button">
				<label for="expand-genres-button" class="expand-genres-label">...</label>
				<ul class="expandable-list">
					<?php
					foreach ($genres as $key => $genre):?>
						<li class="menu-item">
							<a class="<?php if ($getGenres === $genre["CODE"]){echo 'active_zone';} ?>" href="/?genre=<?= $key ?>"><?php echo $genre["NAME"]?></a>
						</li>
					<?php
					endforeach; ?>
				</ul>
			</li>
			<li class="menu-item">
				<a class="<?php if ($currentPage === $config['menu']['Избранные']){echo 'active_zone';} ?>" href="<?= $config['menu']['Избранные'] ?>">Избраное</a>
			</li>
		</ul>
	</div>
	<div class="container">
		<div class="header">
			<form class="search" action="http://dev.bx" method="get">
				<img src="resources/img/search1.png" alt="search1">
				<label><input class="search-field" type="search" name="search" placeholder="Поиск по каталогу..."></label>
				<input class="search-submit-find" type="submit" value="ИСКАТЬ">
				<a class="search-submit-add" href="<?= $config['menu']['Добавить-фильм'] ?>">Добавить фильм</a>
			</form>
		</div>
		<div class="content">




			<?= $content ?>


		</div>
	</div>
</div>
</body>
</html>