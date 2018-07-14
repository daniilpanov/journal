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
                echo "<th><select name='{$select_name}'><option value='' selected>--все--</option>";
                foreach ($i as $val)
                {
                    foreach ($val as $one_select)
                    {
                        echo "<option value='{$one_select}'>{$one_select}</option>";
                    }
                }
                echo "</th></select>";
            }
            ?>
            <th>
                <select name="mark">
                    <option value="" selected>--все--</option>
                    <?php
                    for($i = 1; $i <= 5; $i++)
                    {
                        echo "<option value='{$i}'>{$i}</option>";
                    }
                    ?>
                </select>
            </th>
            <th><input type="date" name="date"></th>
            <th><button type="submit">Выбрать</button></th>
            <th><button type="button" onclick="document.location.href = 'http://localhost/journal/?page=journal_list'">Очистить</button></th>
        </tr>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Предмет</th>
            <th>Оценка</th>
            <th>Дата</th>
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