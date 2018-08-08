<!-- TAG " BODY " -->
<body>

<?php
// ALL MENUS
require_once "views/VTopMenu.php";
require_once "views/VSidebarMenu.php";
?>

<!-- ТЕГ " MAIN " ДЛЯ ОСНОВНОГО ТЕЛА САЙТА ( контента ) -->
<main>
    <?php
    // ROUTER
    require_once "routers/MAINRouter.php";
    ?>