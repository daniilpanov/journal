<?php
namespace app\classes;


class MJournalList
{
    /**
     * This method use for get all information
     * from table `journal_list`
     * @param $sql string
     * @return mixed|\mysqli_result
     */
    protected function receiveJournalList($sql)
    {
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