<?php
namespace app\classes;


class CSearch extends MSearch
{
    public function seek($seek)
    {
        $response = parent::seek($seek);

        while ($row = mysqli_fetch_assoc($response))
        {
            $result[$row['id']] = $row;
        }
        
        return $result;
    }
}