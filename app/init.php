<?php

session_start();
ob_start();

//otomatik olarak class ları yükle
function loadClasses($className)
{
    require __DIR__ ."/classes/" .strtolower($className) .".php";
}

spl_autoload_register("loadClasses");

//db bağlantısı
$config = require __DIR__ ."/config.php";

try
{
    $db = new PDO("mysql:host=".$config["db"]["host"].";dbname=" .$config["db"]["name"],$config["db"]["user"], $config["db"]["pass"]);
}
catch (PDOException $ex)
{
    die($ex->getMessage());
}

//settings sayfasını dahil et
require __DIR__ ."/settings.php";

//helper klasörünü yükle
foreach (glob( __DIR__ ."/helper/*.php") as $helperFile)
{
    require $helperFile;
}
