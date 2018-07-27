<table class="list">
    <tr>
        <td>
            <form method="post">
                <table class="form_body">
                    <thead class="list_header">
                    <tr><th></th><th>Предмет</th></tr>
                    </thead>
                    <tbody>
                    <?php
                    $all_subjects = $subjects->getSubjects();
                    $counter = 1;

                    foreach ($all_subjects as $one_subject)
                    {
                        echo "<tr class='row'>
                            <td>{$counter}.&emsp;</td>
                            <td>
                                <input type='text' name='{$counter}[subject]' value='{$one_subject['subject']}'>
                            </td>
                        </tr>";
                        $counter++;
                    }
                    ?>
                    <tr><td></td><td><input type="submit" name="editSubjects"></td></tr>
                    </tbody>
                </table>
            </form>
        </td>
        <th>
            <a href="?page=addSubjects" title="Создать ">&emsp;&plus;&emsp;</a>
            <a href="?page=deleteSubjects" title="Удалить ">&emsp;&minus;&emsp;</a>
        </th>
    </tr>
</table>