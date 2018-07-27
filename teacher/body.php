<body>
<?php
require_once "views/VMenu.php";

if ($_POST)
{
    foreach ($_POST as $key => $value)
    {
        switch ($key)
        {
            // ADD
            case "addStudents":
                $students->addStudents($_POST);
                break;

            case "addSubjects":
                $subjects->addSubjects($_POST);
                break;

            case "addMarks":

                break;

            // DELETE
            case "deleteStudents":
                $students->deleteStudents($_POST);
                break;

            case "deleteSubjects":
                $subjects->deleteSubjects($_POST);
                break;

            case "deleteMarks":

                break;

            // EDIT
            case "editStudents":
                $students->editStudents($_POST);
                break;

            case "editSubjects":
                $subjects->editSubjects($_POST);
                break;

            case "editMarks":

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
            // STUDENTS
            case 'studentsList':
                require_once "views/VStudentsList.php";
                break;
            case "addStudents":
                require_once "views/VAddStudents.php";
                break;
            case "deleteStudents":
                require_once "views/VDeleteStudents.php";
                break;

            // SUBJECTS
            case 'subjectsList':
                require_once "views/VSubjectsList.php";
                break;
            case "addSubjects":
                require_once "views/VAddSubjects.php";
                break;
            case "deleteSubjects":
                require_once "views/VDeleteSubjects.php";
                break;
        }
    }
}
?>
</body>
