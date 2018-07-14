<?php
namespace app\classes;


class MJournalList
{
    /**
     * This method use for get all information
     * from table `journal_list`
     * @param $choose array
     * @return mixed|\mysqli_result
     */
    protected function receiveJournalList($choose)
    {
        $sql = "SELECT `name`, `surname`, `subject`, `mark`, `date` FROM journal.journal_list";// Начальный sql-запрос

        // Если что-то выбрано пользователем, то
        if ($choose !== null)
        {
            // добавляем в переменную с запросом "WHERE".
            $sql .= " WHERE";

            // После этого - считаем кол-во элементов в массиве choose
            $count = count($choose);
            // и объявляем переменную для счёта.
            $counter = 1;

            // В цикле 'foreach' перебираем массив $choose как ключ и значение
            // (ключ - имя столбца, а значение - его значение).
            //    ДАЛЬШЕ - ВСЁ ЯСНО
            foreach ($choose as $col => $value)
            {
                $sql .= " `{$col}` = '{$value}'";
                if ($counter != $count)
                {
                    $sql .= " AND";// если дальше будет ещё что-нибудь - добавляем "AND"
                    $counter++;
                }
            }
        }

        $result = Db::getInstance()->sql($sql);
        return $result;
    }

    /**
     * This method use for get some or all
     * information from any tables
     * @param string $table
     * @param string $value Default = "*"(all)
     * @return string|array|mixed|\mysqli_result
     */
    protected function getValue($table, $value = "*")
    {
        // УНИВЕРСАЛЬНЫЙ МЕТОД ДЛЯ ЗАПРОСА К БД
        // без комментариев(всё итак понятно)
        $sql = "SELECT {$value} FROM journal.{$table}";

        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}