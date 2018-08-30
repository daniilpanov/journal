<?php
// cache controller
header("Cache-Control: no-cache, must-revalidate");

// 'session_start()' для дальнейшего использования
// суперглобального массива $_SESSION
session_start();

// Если пользователь случайно (или намеренно) зашел в эту папку, то
if ($_SESSION['authorized']['id'] === null)
{
    // Кидаем его на главную страницу
    header("Location: ../index.php");
}

// 'spl_autoload_register' - новая версия 'function __autoload'
spl_autoload_register(function ($namespace)
{
    // делаем из пространства имён путь к файлам с классами:
    $path = str_replace("student\\", "", $namespace);
    $path = str_replace("\\", "/", $path);

    //echo $path."<br>"; // для отладки

    // подключаем их:
    require_once ($path . ".php");
});
// ROUTER'S OBJECT:
    /** @var \student\app\classes\Router $S_Router */
    $S_Router = new \student\app\classes\Router();

// CONTROLLERS' OBJECTS:
    /** @var \student\app\classes\CJournalList $journal_list */
    $journal_list = new \student\app\classes\CJournalList();