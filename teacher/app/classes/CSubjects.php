<?php
namespace app\classes;


class CSubjects extends MSubjects
{
    public final function addSubjects($post)
    {
        parent::addSubjects($post);
    }

    public final function getSubjects($subject_id)
    {
        $response = parent::getSubjects($subject_id);

        while ($row = mysqli_fetch_assoc($response))
        {
            $result = explode(", ", $row['subjects']);
        }

        return $result;
    }

    public final function editSubjects($post)
    {
        unset($post['editSubjects']);

        foreach ($post as $item)
        {
            parent::editSubjects($item);
        }
    }

    public final function deleteSubjects($post)
    {
        unset($post['deleteSubjects']);

        foreach ($post as $subject)
        {
            parent::deleteSubjects($subject);
        }
    }
}