<?php

function __autoload($name)
{
    // конвертируем полный путь в пространстве имён с \ в /
    $name = str_replace('\\', '/', $name);
    require_once($name.'.php');
}

// СОЗДАЁМ ОБЪЕКТЫ КОНТРОЛЛЕРОВ
$journal_list = new \app\classes\CJournalList(); // для работы с журналом
