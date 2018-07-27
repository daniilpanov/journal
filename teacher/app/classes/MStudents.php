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

        $sql = $CRUD->getQueryForAdd('students', $post, 'addStudents');

        Db::getInstance()->sql($sql);
    }

    protected function editStudents($post)
    {
        $CRUD = new CRUD_class();

        $sql = $CRUD->getQueryForEdit('students', $post);

        Db::getInstance()->sql($sql);
    }

    protected function deleteStudents($student)
    {
        $CRUD = new CRUD_class();

        $sql = $CRUD->getQueryForDelete('students', $student);

        Db::getInstance()->sql($sql);
    }
}