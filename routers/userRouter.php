<?php
require_once "views/VMenu.php";
?>
<div id="content">
    <?php

    /**
     * @todo МАРШРУТИЗАТОР
     * проверка $_GET с помощью switch
     */
    if ($_GET)
    {
        foreach ($_GET as $page => $value)
        {
            switch ($page)
            {
                case "exit":
                    unset($_SESSION['authorised']);
                    header("Location: index.php");
                    break;
                case "page":
                    switch ($value)
                    {
                        case 'journal_list':
                            require_once "views/VJournalList.php";
                            break;
                    }
                    break;
            }
        }
    }
    ?>
</div>