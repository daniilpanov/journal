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
                        </td><input type='hidden' name='{$counter}[id]' value='{$one_student['id']}'>";
                        echo "</tr>";
                        $counter++;
                    }
                    ?>
                    <tr><td></td><td></td><td><input type="submit" name="editStudents"></td></tr>
                    </tbody>
                </table>
            </form>
        </td>
        <th>
            <a href="?page=addStudents" title="Создать ">&emsp;&plus;&emsp;</a>
            <a href="?page=deleteStudents" title="Удалить ">&emsp;&minus;&emsp;</a>
        </th>
    </tr>
</table>