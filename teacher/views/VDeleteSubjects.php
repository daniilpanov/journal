<form method="post" action="?page=subjectsList">
    <table>
        <thead>
        <tr>
            <th>
                <input
                    id="checkbox-switcher"
                    type="checkbox"
                    onclick="
                    let checkboxes = document.getElementsByClassName('checkbox');
                    if (document.getElementById('checkbox-switcher').checked === true)
                    {
                        for (let i = 0; i <= checkboxes.length; i++)
                        {
                            checkboxes[i].checked = true;
                        }
                    }
                    else
                    {
                        for (let i = 0; i <= checkboxes.length; i++)
                        {
                            checkboxes[i].checked = false;
                        }
                    }
                ">
            </th>
            <th>Предмет</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $all_subjects = $subjects->getSubjects();

        $counter = 1;

        foreach ($all_subjects as $one_subject)
        {
            echo "<tr>
                <td><input type='checkbox' class='checkbox' id='{$one_subject['subject']}' name='{$counter}[subject]' value='{$one_subject['subject']}'></td>
                <td><label for='{$one_subject['subject']}'>{$one_subject['subject']}</label></td>
            </tr>";
            $counter++;
        }
        ?>
        <td></td><td><input type="submit" name="deleteSubjects" value="Удалить" title="Удалить "></td>
        </tbody>
    </table>
</form>