<?php
namespace student\app\classes;


class MJournalList
{
    /**
     * @param int $student_id
     * @param string|null $second_part_of_query
     * @return array|\mysqli_result
     */
    protected function getJournalList($student_id, $second_part_of_query = null)
    {
        $sql = /** @lang MySQL */
            "SELECT subject, mark, year, month, day FROM journal.journal_list WHERE (student_id = '{$student_id}')";

        if ($second_part_of_query !== null AND $second_part_of_query != "")
        {
            $sql .= " AND (" . substr($second_part_of_query, 4) . ")";
        }

        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}