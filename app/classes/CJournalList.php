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

    public function getValuesForSelect()
    {
        $response = $this->receiveValuesForSelect();
        while($result[] = mysqli_fetch_assoc($response)){}
        return $result;
    }
}