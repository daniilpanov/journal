<?php
namespace app\classes;


class MJournalList
{
    protected function receiveJournalList()
    {
        $sql = "SELECT * FROM journal.journal_list";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}