<?php
// 'spl_autoload_register' - новая версия 'function __autoload'
spl_autoload_register(function ($namespace)
{
    // делаем из пространства имён путь к файлам с классами:
    $path = str_replace("\\", "/", $namespace);

    // подключаем их:
    require_once ($path . ".php");
});

$host = \app\classes\Config::DB_HOST;
$pass = \app\classes\Config::DB_PASS;
$user = \app\classes\Config::DB_USER;
$db_name = \app\classes\Config::DB_NAME;

try
{
    $DBH = new PDO("mysql:host={$host};dbname={$db_name};charset=UTF8", $user, $pass);
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Подключение к БД прошло успешно!";
}
catch (PDOException $e)
{
    echo "Извините, операция не может быть выполнена";
    file_put_contents("log.txt", $e->getMessage()."\n", FILE_APPEND);
}

