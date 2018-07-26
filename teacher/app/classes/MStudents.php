<?php
namespace app\classes;


class MStudents
{
    protected function getStudents($student_id)
    {
        $CRUD = new CRUD_class();

        $sql = $CRUD->getValues("students", "*", "`id`", $student_id);

        $result = Db::getInstance()->sql($sql);
        return $result;
    }

    protected function addStudents($post)
    {
        $CRUD = new CRUD_class();

        $sql = $CRUD->getQueryForAdd('students', $post, 'addStudent');

        $result = Db::getInstance()->sql($sql);

        return $result;
    }

    protected function editStudents($sql)
    {
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}