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
// CONTROLLERS' OBJECTS:
    /** @var $menu \authorized\app\classes\CMenu */
    $authorized_menu = new \authorized\app\classes\CMenu();
//ROUTER'S OBJECT:
    /** @var $Router \authorized\app\classes\Router */
    $Router = new \authorized\app\classes\Router();