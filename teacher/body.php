<body>
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
            case 'addStudents':
                require_once "views/VAddStudents.php";
                break;
        }
    }
}
?>
</body>
