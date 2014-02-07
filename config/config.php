<?php
/**
 * Views - сортировка топиков по числу просмотров
 *
 * Версия:	1.0.0
 * Автор:	Александр Вереник
 * Профиль:	http://livestreet.ru/profile/Wasja/
 * GitHub:	https://github.com/wasja1982/livestreet_views
 *
 **/

$config = array();

// Отображаются только топики, которые просматривались в выбранный период, независимо от времени их создания.
// Использует данные плагина Viewstat (должен быть установлен). По умолчанию отключено (false).
$config['stat_date_filter'] = false;

return $config;
?>