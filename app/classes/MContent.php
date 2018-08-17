<?php
namespace app\classes;


class MContent
{
    protected function getContent($page_id)
    {
        if ($page_id == 'main')
        {
            $sql = "SELECT content, title, description, keywords FROM journal.info_pages WHERE `value` = 'main'";
        }
        else
        {
            $sql = "SELECT content, title, description, keywords FROM journal.info_pages WHERE id = '{$page_id}'";
        }

        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}