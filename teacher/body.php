<body>
<?php
require_once "views/VMenu.php";

if ($_POST)
{
    foreach ($_POST as $key => $value)
    {
        switch ($key)
        {
            case "addStudent":
                $students->addStudents($_POST);
                break;

            case "addSubject":

                break;

            case "addMark":

                break;
        }
    }
}
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
            case 'studentsList':
                require_once "views/VStudentsList.php";
                break;
        }
    }
}
?>
</body>
