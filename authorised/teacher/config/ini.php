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

    //echo $path."<br>"; // для отладки

    // подключаем их:
    require_once ($path . ".php");
});
// ROUTER'S OBJECT:
    $D_Router = new \teacher\app\classes\Router();

// CONTROLLERS' OBJECTS:
    $journal_list = new \teacher\app\classes\CJournalList();