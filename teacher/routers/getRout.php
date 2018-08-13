<div id="content">
    <?php
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
</div>
