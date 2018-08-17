<?php
namespace app\classes;


class CMenu extends MMenu
{
    public function getTopInfoPages()
    {
        $response = parent::getTopInfoPages();

        while($row = mysqli_fetch_assoc($response))
        {
            $top_pages[$row['id']] = $row;
        }

        return $top_pages;
    }

    public function getSidebarInfoPages()
    {
        $response = parent::getSidebarInfoPages();

        while ($row = mysqli_fetch_assoc($response)) {
            $sidebar_pages[$row['id']] = $row;
        }

        return $sidebar_pages;
    }
}