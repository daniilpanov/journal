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
    echo $info_page['content'];

    /* Создаём объект класса 'Router'
     ** и соответственно, вызываем конструктор класса,
     *** который будет работать вечно
    */
    $router = new \app\classes\Router();