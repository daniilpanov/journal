<?php
namespace app\classes;


class MJournalList
{
    protected function receiveJournalList($choose)
    {
        $sql = "SELECT * FROM journal.journal_list";

        if (!empty($choose))
        {
            $sql .= " WHERE";

            $count = count($choose);

            $counter = 1;

            foreach ($choose as $col => $value)
            {
                $sql .= " `{$col}` = '{$value}'";
                if ($counter != $count)
                {
                    $sql .= " AND";
                    $counter++;
                }
            }
        }

        echo "<br>".$sql;
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}