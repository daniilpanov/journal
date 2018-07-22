<?php
namespace app\classes;


class MStudents
{
    protected function getStudents($student_id)
    {
        $sql = "SELECT * FROM journal.students";
        if ($student_id !== null)
        {
            $sql .= " WHERE `id` = '{$student_id}'";
        }
        $result = Db::getInstance()->sql($sql);
        return $result;
    }

    protected function addStudents($sql)
    {
        $result = Db::getInstance()->sql($sql);
        return $result;
    }

    protected function editStudents($sql)
    {
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}