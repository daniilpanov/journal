<?php
function __autoload($name)
{
    // конвертируем полный путь в пространстве имён с \ в /
    $name = str_replace('\\', '/', $name);
    require_once($name.'.php');
}
echo "ok";
require_once "config/ini.php";
echo "ok";
?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <!--Title-->
    <title></title>
    <!--End Title-->

    <!--Meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="">
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <meta name="Robots" content="all" />
    <meta name="Rating" content="General" />
    <meta name="Author" content="" />
    <!--End Meta-->

    <!--Style-->
    <link rel="stylesheet" media="all" href="styles/style.css" />
    <!--<link href="bootstrap" />-->
    <!--End Style-->
</head>