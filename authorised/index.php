<?php
// Если кто-то случайно (или намеренно) открыл эту папку
// (если нет $_POST),
// переадресовываем его на главную страницу
if (!$_POST)
{
    //header("Location: ../index.php");
}
// Если же пользователь вошёл (попытался войти), то

// подключаем интерфейс для роутера,
//require_once "app/interfaces/IRouter.php";

// также подключаем классы для подключения к БД (тоже для роутера),
// но уже из соответствующей папки (не хотел лишний раз копировать файлы)
// (в $_POST['sign_in_as'] записана нужная информация),
require_once "{$_POST['sign_in_as']}/app/classes/Config.php";
require_once "{$_POST['sign_in_as']}/app/classes/Db.php";

// и, наконец, сам роутер
// (понятно, что это уже точно подключаем из соответствующей папки),
require_once ($_POST['sign_in_as'] . "/app/classes/Router.php");

// и вызываем статическкий метод роутера для авторизации
switch ($_POST['sign_in_as'])
{
    case "director":
        \director\app\classes\Router::authorisation($_POST['login'], $_POST['password'], $_POST['sign_in_as']);
        break;
    case "teacher":
        \teacher\app\classes\Router::authorisation($_POST['login'], $_POST['password'], $_POST['sign_in_as']);
        break;
    case "student":
        \student\app\classes\Router::authorisation($_POST['login'], $_POST['password'], $_POST['sign_in_as']);
        break;
}
