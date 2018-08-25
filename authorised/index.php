<?php
// Если кто-то случайно (или намеренно) открыл эту папку
// (если нет $_POST),
// переадресовываем его на главную страницу
if (!$_POST)
{
    //header("Location: ../index.php");
}
// Если же пользователь вошёл (попытался войти), то

$link = $_POST['sign_in_as'];
$link .= "/config/ini.php";


require_once "{$link}";


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
        var_export(\student\app\classes\Router::$authorised);
        break;
}
