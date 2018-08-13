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
     * @return array|\mysqli_result
     */
    protected function getAllSubjects()
    {
        $sql = "SELECT subjects FROM journal.teachers_and_director WHERE `id` = '{$_SESSION['authorised']}'";

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