<?php
namespace app\classes;


class CJournalList extends MJournalList
{
    public function getJournalList($choose = null)
    {
        $response = $this->receiveJournalList($choose);

        while ($row = mysqli_fetch_assoc($response))
        {
            $list[] = $row;
        }

        return $list;
    }
}