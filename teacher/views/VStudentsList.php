
<table id="editCreate">
    <tr>
        <td>
            <form method="post">
                <table id="studentsList">
                    <thead>
                    <tr><th></th><th>Имя</th><th>Фамилия</th></tr>
                    </thead>
                    <tbody>
                    <?php
                    $all_students = $students->getStudents();
                    $counter = 1;

                    foreach ($all_students as $one_student)
                    {
                        echo "<tr class='row'>";
                        echo "<td>{$counter}.&emsp;</td>
                    <td>
                        <input type='text' name='{$counter}[name]' value='{$one_student['name']}'>
                    </td>
                    <td>
                        <input type='text' name='{$counter}[surname]' value='{$one_student['surname']}'>
                    </td>";
                        echo "</tr>";
                        $counter++;
                    }
                    ?>
                    <tr><td></td><td></td><td><input type="submit" name="edit"></td></tr>
                    </tbody>
                </table>
            </form>
        </td>
        <th>
            <?php
            if (!$_GET['subPage'])
            {
                ?>
                <a href="?page=studentsList&subPage=createStudents" title="Создать ">&plus;</a>
                <a href="?page=studentsList&subPage=deleteStudents" title="Удалить ">&minus;</a>
                <?php
            }
            elseif ($_GET['subPage'])
            {
                ?>
                <a href="?page=studentsList" title="Назад ">Назад</a><br>
                <?php
                switch ($_GET['subPage'])
                {
                    case "createStudents":
                        require_once "views/subPages/VAddStudents.php";
                        break;

                    case "deleteStudents":
                        require_once "views/subPages/VDeleteStudents.php";
                        break;
                }
            }
            ?>
        </th>
    </tr>
</table>