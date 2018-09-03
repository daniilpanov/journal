<?php
namespace authorized\app\classes;


class CMenu extends MMenu
{
    public function getMenu($user_type)
    {
        $response = parent::getMenu($user_type);

        for ($i = 0; $menu_info = mysqli_fetch_assoc($response); $i++)
        {
            foreach ($menu_info as $col => $item)
            {
                list($dir, $items) = explode(": ", $item);
                $prepared_menu[$i][$col]['dir'] = $dir;
                $prepared_menu[$i][$col]['items'] = explode(", ", $items);
            }
        }

        return $prepared_menu;
    }
}