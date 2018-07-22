<?php
namespace app\classes;


class CStudents extends MStudents
{
    public final function addStudents($post)
    {
        $crud = new CRUD_class();

        $sql = $crud->getQueryForAdd($post, 'students');

        parent::addStudents($sql);
    }

    public final function getStudents($student_id = null)
    {
        echo "ok";
        $response = parent::getStudents($student_id);

        if ($student_id === null)
        {
            $result = mysqli_fetch_assoc($response);
        }
        else
        {
            while ($row = mysqli_fetch_assoc($response))
            {
                $result[$row['id']] = $row;
            }
        }

        return $result;
    }
}