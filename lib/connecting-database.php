<?php

function dbConnect(array $config)
{
	$charset = "utf8";
	$db_init = mysqli_init();
	$db_connect = mysqli_real_connect
	(
		$db_init, $config['basedInfo']['host'], $config['basedInfo']['userName'],
		$config['basedInfo']['password'], $config['basedInfo']['basedName']
	);

	$db_charset = mysqli_set_charset($db_init, $charset);
	if ($db_connect === false || $db_charset === false)
	{
		trigger_error('Ошибка подключения к БД', $error_level = E_USER_ERROR);
	}
	return $db_init;



}
