<?php
DEFINE('ROOT_PATH', dirname(__FILE__));
require_once("sys/DB.php");
include_once('sys/Widgets.php');
include_once('sys/UrlManager.php');
include_once('sys/Controller.php');

DB::connectDB('root','','localhost','smarthouse');

/**
 *   Подключение контроллеров
 */
$dir = ROOT_PATH.'/controllers/';
$dh  = opendir($dir);
while ($filename = readdir($dh)) {
    if ($filename != "." && $filename != "..") {
        include_once($dir.$filename);
    }
}
closedir($dh);
/**
 *   Подключение контроллеров КОНЕЦ
 */
UrlManager::getRouteFromUrl();
?>

