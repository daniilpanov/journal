<?php
// Если кто-то случайно (или намеренно) открыл эту папку
// (если нет $_POST),
// переадресовываем его на главную страницу
if (!$_POST)
{
    header("Location: ../index.php");
}
// Если же пользователь вошёл (попытался войти), то
//
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

// и вызываем статическкий метод роутера для авторизации
switch ($_POST['sign_in_as'])
{
    case "director":
        \director\app\classes\Router::authorisation($_POST['login'], $_POST['password'], $_POST['sign_in_as']);

        $_SESSION['authorized'] = \director\app\classes\Router::$authorized;
        break;
    case "teacher":
        \teacher\app\classes\Router::authorisation($_POST['login'], $_POST['password'], $_POST['sign_in_as']);

        $_SESSION['authorized'] = \teacher\app\classes\Router::$authorized;
        break;
    case "student":
        \student\app\classes\Router::authorisation($_POST['login'], $_POST['password'], $_POST['sign_in_as']);

        $_SESSION['authorized'] = \student\app\classes\Router::$authorized;
        break;
}

echo "<script>document.location.href = 'http://localhost/journal/authorized/{$_POST['sign_in_as']}/index.php'</script>";