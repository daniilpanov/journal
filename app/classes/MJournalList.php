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
     * @param bool $unique Default = null
     * @return array|mixed|\mysqli_result
     */
    protected function getValue($table, $value = "*", $unique = false)
    {
        // УНИВЕРСАЛЬНЫЙ МЕТОД ДЛЯ ЗАПРОСА К БД
        // без комментариев(всё итак понятно)
        $sql = "SELECT ";
        if ($unique === true)
        {
            $sql .= "DISTINCT ";
        }
        $sql .= "{$value} FROM journal.{$table}";

        $result = Db::getInstance()->sql($sql);

        return $result;
    }

    protected function getStudent($id)
    {
        $sql = "SELECT * FROM journal.students WHERE `id` = '{$id}'";

        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}