<?php
echo "ok";
function __autoload($name)
{
    // конвертируем полный путь в пространстве имён с \ в /
    $name = str_replace('\\', '/', $name);
    require_once($name.'.php');
}
echo "ok";
// СОЗДАЁМ ОБЪЕКТЫ КОНТРОЛЛЕРОВ
$students = new \app\classes\CStudents();