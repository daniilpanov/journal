<?php
var_export($unique = $journal_list->getValuesForSelect());

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
            foreach ($unique as $val)
            {
                foreach ($val as $col_name => $un)
                {
                    echo "<th>";
                        echo "<select name='{$col_name}'>";
                        echo "<option value='{$un}'>{$un}</option>";
                        echo "</select>";
                    echo "</th>";
                }
            }
            ?>
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