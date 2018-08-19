<!-- TAG "<BODY>" -->
<body>
<?php
// Верхнее меню:
require_once "views/VTopMenu.php";
// Боковое меню:
require_once "views/VSidebarMenu.php";
?>
<!-- TAG "<MAIN>" -->
<main>
    <?php
    // Выводим контент
    $Router->printContent('content');