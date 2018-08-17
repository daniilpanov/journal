<?php
namespace app\classes;


class CContent extends MContent
{
    public function getContent($page_id)
    {
        $response = parent::getContent($page_id);

        $result = mysqli_fetch_assoc($response);

        return $result;
    }
}