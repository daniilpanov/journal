<?php
namespace app\classes;


class MMenu
{
    protected function getTopInfoPages()
    {
        $sql = "SELECT
            `id`, `name`, `icon`, `title`
             FROM journal.info_pages WHERE (type = 'top' OR type = 'all') AND (visible = '1') AND (`value` != 'main')
             ORDER BY position ASC";

        $result = Db::getInstance()->sql($sql);
        return $result;
    }

    protected function getSidebarInfoPages()
    {
        $sql = "SELECT
            `id`, `name`, `icon`, `title`, `value`
             FROM journal.info_pages WHERE (type = 'sidebar' OR type = 'all') AND (visible = '1') AND (`value` != 'main')
             ORDER BY position ASC";

        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}