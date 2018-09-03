<?php
namespace including\student\app\classes;


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

    protected function getSubjects($form)
    {
        $sql = "SELECT subject FROM journal.subjects WHERE form = '{$form}'";

        $result = Db::getInstance()->sql($sql);
        return $result;
    }

    protected function getForm($student_id)
    {
        $sql = "SELECT form FROM journal.students WHERE id = '{$student_id}'";

        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}