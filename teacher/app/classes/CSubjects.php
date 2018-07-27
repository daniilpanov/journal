<?php
namespace app\classes;


class CSubjects extends MSubjects
{
    public final function addSubjects($post)
    {
        parent::addSubjects($post);
    }

    public final function getSubjects($subject = null)
    {
        $response = parent::getSubjects($subject);

        if ($subject === null)
        {
            while ($row = mysqli_fetch_assoc($response))
            {
                $result[] = $row;
            }
        }
        else
        {
            $result = mysqli_fetch_assoc($response);
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