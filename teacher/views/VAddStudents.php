<table>
    <tr>
        <td>
            <table>
                <thead>
                <tr><th></th><th>Имя</th><th>Фамилия</th></tr>
                </thead>
                <?php
                $all_students = $students->getStudents();
                $counter = 1;
                foreach ($all_students as $one_student)
                {
                    echo "<tr>";
                    echo "<td>{$counter}.&emsp;</td><td>{$one_student['name']}</td><td>{$one_student['surname']}</td>";
                    echo "</tr>";
                    $counter++;
                }
                ?>
            </table>
        </td>

        <th>
            <!--TODO: кнопки для добавления и удаления учеников-->
        </th>
    </tr>
</table>