<?php
// 'spl_autoload_register' - новая версия 'function __autoload'
spl_autoload_register(function ($namespace)
{
    // делаем из пространства имён путь к файлам с классами:
    $path = str_replace("\\", "/", $namespace);

    echo $path."<br>"; // для отладки

    // подключаем их:
    require_once ($path . ".php");
});

// CONTROLLERS' OBJECTS:
    $journal_list = new \authorised\student\app\classes\CJournalList();