<?php

session_start();

function __autoload($namespace)
{
    // конвертируем полный путь в пространстве имён с \ в /
    $namespace = str_replace('\\', '/', $namespace);
    require_once($namespace.'.php');
}

// СОЗДАЁМ ОБЪЕКТЫ КОНТРОЛЛЕРОВ
$students = new \app\classes\CStudents(); // Ученики
$subjects = new \app\classes\CSubjects(); // Предметы