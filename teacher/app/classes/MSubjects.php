<?php
namespace app\classes;


class MSubjects
{
    protected function getSubjects($subject)
    {
        $CRUD = new CRUD_class();

        $sql = $CRUD->getValues("subjects", "*", "`name`", $subject);

        $result = Db::getInstance()->sql($sql);

        return $result;
    }

    protected function addSubjects($post)
    {
        $CRUD = new CRUD_class();

        $sql = $CRUD->getQueryForAdd('subjects', $post, 'addSubjects');

        Db::getInstance()->sql($sql);
    }

    protected function editSubjects($post)
    {
        $CRUD = new CRUD_class();

        $sql = $CRUD->getQueryForEdit('subjects', $post, 'subject');

        Db::getInstance()->sql($sql);
    }

    protected function deleteSubjects($subject)
    {
        $CRUD = new CRUD_class();

        $sql = $CRUD->getQueryForDelete('subjects', $subject);

        Db::getInstance()->sql($sql);
    }
}