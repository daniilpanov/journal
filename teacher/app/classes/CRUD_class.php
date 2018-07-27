<?php
namespace app\classes;


class CRUD_class
{
    /**
     * @param $table string
     * @param $post array
     * @param string $button_key Default = "" (null)
     * @return string
     */
    public function getQueryForAdd($table, $post, $button_key = "")
    {
        unset($post[$button_key]);

        $sql = "INSERT INTO {$table}(";

        $cols = "";
        $values = "";

        foreach ($post as $col => $value)
        {
            if (empty($value) OR $value == '')
            {
                unset($post[$col]);
            }
            else
            {
                $cols .= "`{$col}`, ";
                $values .= "'{$value}', ";
            }
        }

        $cols = substr($cols, 0, -2);
        $values = substr($values, 0, -2);

        $sql .= $cols.") VALUES(".$values.")";

        return $sql;
    }

    /**
     * @param $table string
     * @param $select string Default = " * "(all columns)
     * @param $where string Default = "`id`"
     * @param $cols string
     * @return string
     */
    public function getValues($table, $select = "*", $where = null, $cols = null)
    {
        $sql = "SELECT {$select} FROM {$table}";


        if ($where !== null AND $cols !== null)
        {
            $sql .= " WHERE {$where} = {$cols}";
        }

        return $sql;
    }

    /**
     * @param $table string
     * @param $post array
     * @param string $primary_key Default = 'id'
     * @return string
     */
    public function getQueryForEdit($table, $post, $primary_key = 'id')
    {
        $primary_value = $post[$primary_key];

        $sql = "UPDATE {$table} SET ";

        foreach ($post as $col => $value)
        {
            $sql .= "`{$col}` = '{$value}', ";
        }

        $sql = substr($sql, 0, -2);

        $sql .= " WHERE `{$primary_key}` = '{$primary_value}'";

        return $sql;
    }

    /**
     * @param $table string
     * @param $post array
     * @return string
     */
    public function getQueryForDelete($table, $post)
    {
        $sql = "DELETE FROM {$table} ";

        $sql .= "WHERE ";

        foreach ($post as $col => $value)
        {
            $sql .= "`{$col}` = '{$value}'";
        }

        return $sql;
    }
}