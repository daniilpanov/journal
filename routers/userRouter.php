<?php
require_once "views/VMenu.php";

/**
 * @todo МАРШРУТИЗАТОР
 * проверка $_GET с помощью switch
 */
if ($_GET)
{
    if ($_GET['exit'] == 'true')
    {
        unset($_SESSION['authorized']);
        header("Location: index.php");
    }
    elseif (isset($_GET['page']))
    {
        switch ($_GET['page'])
        {
            case 'journal_list':
                require_once "views/VJournalList.php";
                break;
        }
    }
}