<?php
namespace app\classes;


class CRUD_class
{
    /**
     * @param $table string
     * @param $post array|mixed
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

        echo $sql;
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
}