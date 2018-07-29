<table>
    <tr>
        <td>
            <form method="post">
                <table class="list">
                    <thead class="list_header">
                    <tr><th class="empty-col"></th><th>Имя</th><th>Фамилия</th></tr>
                    </thead>
                    <tbody class="list_body">
                    <?php
                    $all_students = $students->getStudents();

                    $counter = 1;

                    foreach ($all_students as $one_student)
                    {
                        echo "<tr class='row'>
                            <td>{$counter}.&emsp;</td>
                            <td>
                                <input type='text' name='{$counter}[name]' value='{$one_student['name']}'>
                            </td>
                            <td>
                                <input type='text' name='{$counter}[surname]' value='{$one_student['surname']}'>
                            </td>
                            <input type='hidden' name='{$counter}[id]' value='{$one_student['id']}'>
                        </tr>";
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
            <br />
            <a href="?page=deleteStudents" title="Удалить ">&emsp;&minus;&emsp;</a>
        </th>
    </tr>
</table>