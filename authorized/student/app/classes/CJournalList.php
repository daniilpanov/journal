<?php
namespace student\app\classes;


class CJournalList extends MJournalList
{
    /**
     * @param int $student_id
     * @param int|null $begin_mark
     * @param int|null $end_mark
     * @param string|null $begin_date
     * @param string|null $end_date
     * @return array|\mysqli_result
     */
    public function getJournalList($student_id, $begin_mark = null, $end_mark = null, $begin_date = null, $end_date = null)
    {
        //
        $sql = $this->queryConstructor($begin_mark, $end_mark, $begin_date, $end_date);
        //
        $response = parent::getJournalList($student_id, $sql);
        //
        while ($row = mysqli_fetch_assoc($response))
        {
            //
            $row['date'] = implode("-", array( $row['year'], $row['month'], $row['day'] ));
            //
            unset($row['year'], $row['month'], $row['day']);
            //
            $result[] = $row;
        }

        /**
         * @var array $result
         */
        return $result;
    }
    /**
     * @param int|null $begin_mark
     * @param int|null $end_mark
     * @param string|null $begin_date
     * @param string|null $end_date
     * @return string
     */
    private function queryConstructor($begin_mark = null, $end_mark = null, $begin_date = null, $end_date = null)
    {
        /** @var $sql string */
        $sql = "";

        //
        if ($begin_mark !== null AND $end_mark !== null)
        {
            for ($i = $begin_mark; $i <= $end_mark; $i++)
            {
                $sql .= " OR mark LIKE '{$i}%'";
            }
        }
        elseif ($begin_mark === null AND $end_mark !== null)
        {
            for ($i = 1; $i <= $end_mark; $i++)
            {
                $sql .= " OR mark LIKE '{$i}%'";
            }
        }
        elseif ($begin_mark !== null AND $end_mark === null)
        {
            for ($i = $begin_mark; $i <= 5; $i++)
            {
                $sql .= " OR mark LIKE '{$i}%'";
            }
        }

        //
        if ($begin_date !== null)
        {
            list($begin_year, $begin_month, $begin_day) = explode("-", $begin_date);
            $sql .= " OR year <= '{$begin_year}' OR month <= '{$begin_month}' OR day <= '{$begin_day}'";
        }
        if ( $end_date !== null)
        {
            list($end_year, $end_month, $end_day) = explode("-", $end_date);
            $sql .= " OR year >= '{$end_year}' OR month >= '{$end_month}' OR day >= '{$end_day}'";
        }

        return $sql;
    }
}