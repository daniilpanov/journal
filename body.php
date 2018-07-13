<body>
<header>
    <!--Здесь должны быть эмблема и поиск на сайте-->
</header>
<?php
require_once "views/VMenu.php";

/**
 * @todo МАРШРУТИЗАТОР
 * проверка $_GET с помощью switch
 */
if ($_GET)
{
    if (isset($_GET['page']))
    {
        switch ($_GET['page'])
        {
            case 'journal_list':
                require_once "views/VJournalList.php";
                break;
        }
    }
}
?>