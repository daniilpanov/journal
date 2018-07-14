<?php
namespace app\classes;


class CJournalList extends MJournalList
{
    /**
     * This method use for get all information
     * from table `journal_list`
     * @param $choose array Default = NULL
     * @return mixed
     */
    public function getJournalList($choose = null)
    {
        foreach ($choose as $key => $value)
        {
            if ($value == '')
            {
                unset($choose[$key]);
            }
        }
        if (count($choose) != 0)
        {
            $response = $this->receiveJournalList($choose);

            while ($row = mysqli_fetch_assoc($response))
            {
                $list[] = $row;
            }
        }
        else
        {
            $list = false;
        }

        return $list;
    }

    /**
     * This method use for get all information
     * from tables `subjects` and `students`
     * @return mixed
     */
    public function getValuesForSelect()
    {
        $response = $this->getValue("subjects");
        while ($row = mysqli_fetch_assoc($response))
        {
            if ($row != null)
            {
                $result[] = $row;
            }
        }
        $for_select['subject'] = $result;
        unset($result);

        $response = $this->getValue("students", 'name');
        while ($row = mysqli_fetch_assoc($response))
        {
            if ($row != null)
            {
                $result[] = $row;
            }
        }
        $for_select['name'] = $result;
        unset($result);

        $response = $this->getValue("students", 'surname');
        while ($row = mysqli_fetch_assoc($response))
        {
            if ($row != null)
            {
                $result[] = $row;
            }
        }
        $for_select['surname'] = $result;
        unset($result);

        return $for_select;
    }
}