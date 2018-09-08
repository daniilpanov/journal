<?php
/*
 * 'session_start()' для дальнейшего использования
 * суперглобального массива $_SESSION
 */
session_start();

/* Если кто-то случайно (или намеренно) открыл эту папку
 * (если нет ни $_POST, ни $_SESSION['authorized']), то
 * переадресовываем его на главную страницу
 */
if (!$_SESSION['authorized'])
{
    if (!$_POST)
    {
        header("Location: ../index.php");
    }
}

// Если же пользователь попытался войти (или уже вошел), то делаем следующее:

// cache control
header("Cache-Control: no-cache, must-revalidate");

// делаем автозагрузку классов ('spl_autoload_register' - новая версия 'function __autoload')
spl_autoload_register(function ($namespace)
{
    // делаем из пространства имён путь к файлам с классами:
    $path = str_replace("\\", "/", $namespace);
    $path = str_replace("authorized/", "", $path);
    //echo $path."<br>"; // для отладки

    // подключаем их:
    require_once ($path . ".php");
});

//
require_once "lib/functions.php";
// CONTROLLERS' OBJECTS:
switch ($_SESSION['authorized']['authorized_as'])
{
    case "director":
        /** @var $who \authorized\app\classes\CDirector */
        $who = new \authorized\app\classes\CDirector();
        break;
    case "teacher":
        /** @var $who \authorized\app\classes\CTeacher */
        $who = new \authorized\app\classes\CTeacher();
        break;
    case "student":
        /** @var $who \authorized\app\classes\CStudent */
        $who = new \authorized\app\classes\CStudent();
        break;
}

//ROUTER'S OBJECT:
    /** @var $Router \authorized\app\classes\Router */
    $Router = new \authorized\app\classes\Router();