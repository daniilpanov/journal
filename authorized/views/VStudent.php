<?php
//
print_r($subjects = $who->getSubjects($_SESSION['authorized']['id']));

if (!isset($_POST['choose']))
{
    //
    $school_journal = $who->getJournalList($_SESSION['authorized']['id']);
}
// А если же пользователь указал параметры, то
elseif (isset($_POST['choose']))
{
    //
    $school_journal = $who->getJournalList($_SESSION['authorized']['id']);
}
?>
<form method="post">
    <table id="journal_list">
        <thead>
        <tr>
            <th>
                <div class='btn-group'>
                    <button
                            type='button' data-toggle='dropdown'
                            class='btn btn-default dropdown-toggle dropdown-toggle'
                            aria-haspopup='true' aria-expanded='false'
                    >
                        Предметы
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Список:</li>
                        <?php
                        foreach ($subjects as $subject)
                        {
                            ?>
                            <li class="dropdown-item"><label><input type="checkbox" name="subject[]" value="<?=$subject['subject']?>"><?=$subject['subject']?></label></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div> <!-- div.btn-group -->
            </th>

            <th>
                <div class='btn-group'>
                    <!-- кнопка, открывающая/закрывающая выпадающее меню -->
                    <button
                        type='button' data-toggle='dropdown'
                        class='btn btn-default dropdown-toggle dropdown-toggle'
                        aria-haspopup='true' aria-expanded='false'
                    >
                        Оценки
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu">
                        <li class="dropdown-header">От:</li>
                        <?php
                        for ($i = 1; $i <= 5; $i++)
                        {
                            ?>
                            <li class="dropdown-item">
                                <label>
                                    <input type="radio" name="begin_mark" value="<?=$i ?>"
                                           <?php
                                           if ($_POST['begin_mark'] == $i)
                                           {
                                               echo " checked";
                                           }
                                           ?>
                                    >
                                    <?=$i ?>
                                </label>
                            </li>
                            <?php
                        }
                        ?>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">До:</li>
                        <?php
                        for ($i = 1; $i <= 5; $i++)
                        {
                            ?>
                            <li class="dropdown-item">
                                <label>
                                    <input type="radio" name="end_mark" value="<?=$i?>"
                                        <?php
                                        if ($_POST['end_mark'] == $i)
                                        {
                                            echo " checked";
                                        }
                                        ?>
                                    >
                                    <?=$i ?>
                                </label>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div> <!-- div.btn-group -->
            </th>

            <th>
                <span style="font-size: large">Дата</span>
                <div class="btn-group" role="group">
                    <div class="btn btn-default">
                        <label>От: &emsp;<input type="date" name="begin_date" value="<?=$_POST['date'] ?>"></label>
                    </div>

                    <div class="btn btn-default">
                        <label>До: &emsp;<input type="date" name="end_date" value="<?=$_POST['date'] ?>"></label>
                    </div>
                </div>

            </th>

            <td>
                <button type="submit" name="choose" class="btn btn-success">
                    Выбрать
                </button>
            </td>
            <td>
                <button type="reset" onclick=" document.location.href = 'http://localhost/journal/authorized/student/index.php?journal_list=list'; " class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove-circle"></span>
                    Сбросить
                </button>
            </td>
        </tr>

        <tr>
            <th>Предмет</th>
            <td>Оценка</td>
            <td>Дата</td>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($school_journal as $row)
        {
            ?>
            <tr>
                <th>
                    <?=$row['subject']?>
                </th>

                <td>
                    <?=$row['mark']?>
                </td>

                <td>
                    <?=$row['date']?>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</form>