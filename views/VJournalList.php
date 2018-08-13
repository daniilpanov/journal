<?php
$for_select = $journal_list->getAllSubjects();

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
            <th>
                <table class=\"dropdown-checkboxes\">
                    <?php
                    foreach ($for_select as $val)
                    {
                        foreach ($val as $key => $one_select)
                        {
                            echo "<tr><td><label><input type='checkbox' name='subject[]' value='{$one_select}'";

                            for ($i = 0; $i <= count($val)-1; $i++)
                            {
                                if ($_POST['subjects'][$i] == $one_select)
                                {
                                    echo " checked";
                                }
                            }

                            echo ">{$one_select}</label></td></tr>";
                        }
                    }
                    ?>
                </table>
            </th>
            <th>
                <table class="dropdown-checkboxes">
                    <?php
                    for($i = 1; $i <= 5; $i++)
                    {
                        echo "<tr><td><label><input type='checkbox' name='mark[]' value='{$i}'";

                        for ($c = 0; $c <=4; $c++)
                        {
                            if ($_POST['mark'][$c] == $i)
                            {
                                echo " checked";
                            }
                        }

                        echo ">{$i}</label></td></tr>";
                    }
                    ?>
                </table>
            </th>
            <th>
                <?php
                echo "<input type='date' name='date'";

                if ($_POST["date"])
                {
                    echo " value='{$_POST['date']}'";
                }

                echo ">";
                ?>
            </th>
            <th><button type="submit" name="choose">Выбрать</button></th>
            <th><button type="reset" onclick="document.location.href = 'http://localhost/journal/?page=journal_list'">Очистить</button></th>
        </tr>
        <tr>
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