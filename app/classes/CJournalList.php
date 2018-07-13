<?php
namespace app\classes;


class CJournalList extends MJournalList
{
    public function getJournalList()
    {
        $response = $this->receiveJournalList();

        while ($row = mysqli_fetch_assoc($response))
        {
            $list[] = $row;
        }

        return $list;
    }
}