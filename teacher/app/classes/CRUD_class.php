<?php
namespace app\classes;


class CRUD_class
{
    public function getQueryForAdd($post, $table)
    {
        $sql = "INSERT INTO {$table}(";
        $cols = "";
        $values = " VALUES(";
        $queries = 1;
        foreach ($post as $col => $value)
        {
            if (empty($value) or $value == '')
            {
                unset($post[$col]);
            }
            else
            {
                $cols .= "`{$col}`, ";

                if (is_array($value))
                {
                    foreach ($value as $key => $item)
                    {
                        if (empty($item) or $item == '')
                        {
                            unset($post[$col][$key]);
                        }
                        else
                        {
                            $queries++;
                            $values .= "'{$value}', ";
                        }
                    }
                }
                else
                {
                    $values .= "'{$value}', ";
                }
            }
        }

        $cols = substr($cols, 0, -2);
        $values = substr($values, 0, -2);

        $sql .= $cols.")".$values.")";

        return $sql;
    }
}