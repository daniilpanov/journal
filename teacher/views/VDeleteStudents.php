<form method="post" action="?page=studentsList">
    <table>
        <thead>
        <tr><th></th><th>Имя</th><th>Фамилия</th></tr>
        </thead>
        <tbody>
        <?php
        $all_students = $students->getStudents();

        foreach ($all_students as $one_student)
        {
            echo "<tr>";
            echo "<td><input type='checkbox' id='{$one_student['id']}' name='delete[]' value='{$one_student['id']}'></td>
            <td><label for='{$one_student['id']}'>{$one_student['name']}</label></td>
            <td><label for='{$one_student['id']}'>{$one_student['surname']}</label></td>";
            echo "</tr>";
        }
        ?>
        <td></td><td></td><td><input type="submit" name="deleteStudents" value="Удалить" title="Удалить "></td>
        </tbody>
    </table>
</form>