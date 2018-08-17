<?php
// cache controller
header("Cache-Control: no-cache, must-revalidate");

// 'session_start()' для дальнейшего использования
// суперглобального массива $_SESSION
session_start();

// 'spl_autoload_register' - новая версия 'function __autoload'
spl_autoload_register(function ($namespace)
{
    // делаем из пространства имён путь к файлам с классами:
    $path = str_replace("\\", "/", $namespace);

    // подключаем их:
    require_once ($path . ".php");
});

// CONTROLLERS' INSTANCES:
    $menu = new \app\classes\CMenu();
    $content = new \app\classes\CContent();


// Получение информации о странице ( не могу подключить позже ):
require_once "views/VPage.php";