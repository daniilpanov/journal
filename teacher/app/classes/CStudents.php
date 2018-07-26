<?php
namespace app\classes;


class CStudents extends MStudents
{
    public final function addStudents($post)
    {
        parent::addStudents($post);
    }

    public final function getStudents($student_id = null)
    {
        $response = parent::getStudents($student_id);

        if ($student_id === null)
        {
            while ($row = mysqli_fetch_assoc($response))
            {
                $result[$row['id']] = $row;
            }
        }
        else
        {
            $result = mysqli_fetch_assoc($response);
        }

        return $result;
    }
}