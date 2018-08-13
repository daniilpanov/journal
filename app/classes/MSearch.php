<?php
namespace app\classes;


class MSearch
{
    protected function seek($seek)
    {
        $sql = "SELECT * FROM journal.info_pages WHERE keywords LIKE '%{$seek}%' OR content LIKE '%{$seek}%' OR description LIKE '%{$seek}%'";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}