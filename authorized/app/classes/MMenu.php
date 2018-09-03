<?php
namespace authorized\app\classes;


class MMenu
{
    protected function getMenu($user_type)
    {
        $sql = /** @lang MySQL */"SELECT view_names, link_names FROM journal.views WHERE `for` = '{$user_type}'";

        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}