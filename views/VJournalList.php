<?php
$for_select = $journal_list->getValuesForSelect();

if(!$_POST)
{

    $list = $journal_list->getJournalList();
}
elseif ($_POST)
{
    $list = $journal_list->getJournalList($_POST);
}
?>
<form method="post">
    <table>
        <thead>
        <tr>
            <?php
            foreach ($for_select as $select_name => $i)
            {
                echo "<th><select name='{$select_name}[]' multiple>";

                if (!$_POST || $_POST[$select_name] == '')
                {
                    echo "<option value='' selected>--все--</option>";
                }
                else
                {
                    echo "<option value=''>--все--</option>";
                }
                foreach ($i as $val)
                {
                    foreach ($val as $one_select)
                    {
                        if ($_POST[$select_name] == $one_select)
                        {
                            echo "<option value='{$one_select}' selected>{$one_select}</option>";
                        }
                        else
                        {
                            echo "<option value='{$one_select}'>{$one_select}</option>";
                        }
                    }
                }
                echo "</th></select>";
            }
            ?>
            <th>
                <select name="mark[]" multiple>
                    <?php
                    if (!$_POST || $_POST["mark"] == '')
                    {
                        echo "<option value='' selected>--все--</option>";
                    }
                    else
                    {
                        echo "<option value=''>--все--</option>";
                    }
                    for($i = 1; $i <= 5; $i++)
                    {
                        if ($_POST["mark"] == $i)
                        {
                            echo "<option value='{$i}' selected>{$i}</option>";
                        }
                        else
                        {
                            echo "<option value='{$i}'>{$i}</option>";
                        }
                    }
                    ?>
                </select>
            </th>
            <th>
                <?php

                if ($_POST["date"])
                {
                    echo "<input type='date' name='date' value='{$_POST['date']}'>";
                }
                else
                {
                    echo "<input type=\"date\" name=\"date\">";
                }?>
            </th>
            <th><button type="submit">Выбрать</button></th>
            <th><button type="reset" onclick="document.location.href = 'http://localhost/journal/?page=journal_list'">Очистить</button></th>
        </tr>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Предмет</th>
            <th>Оценка</th>
            <th>Дата(гггг.мм.дд)</th>
        </tr>
        </thead>
        <?php
        foreach ($list as $value)
        {
            echo "<tr>";
            foreach ($value as $key => $item)
            {
                echo "<td>{$item}</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</form>