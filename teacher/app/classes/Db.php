<?php
namespace app\classes;

/**
 * @filename DB.php
 * набор компонентов для работы с БД (Singleton)
 * @author Любомир Пона
 * @copyright 24.09.2013
 * @updated 25.12.2017
 */

class Db extends Config
{
    private static $instance = null; // объект для работы с БД
    private static $handler; // идентефикатор соединения

    // закрываем возможность создания и дублирования объектов
    private function  __construct()
    {
        $this->open_connection();
    }
    private function __clone(){}
    private function __wakeup(){}

    // объект для бароты с БД
    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self;
        }

        return self::$instance;

    }

    // соединяемся с БД
    private function open_connection()
    {
        self::$handler = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME);

        // если соединение не открыто, выдаем сообщение об ошибке
        if (!self::$handler)
        {
            die("<h1>Ошибка соединения с базой данных</h1>");
        }


        // установка принудительной кодировки UTF-8
        mysqli_query(self::$handler, "set names utf8") or die ("set names utf8 failed");
    }

    // РЕАЛИЗАЦИЯ ЗАПРОСА К БД
    /**
     * @param string
     * @return bool|\mysqli_result
     */
    public function sql($query)
    {
        $result = mysqli_query(self::$handler, $query);

        // если запрос не удался, выдаем сообщение об ошибке
        if (!$result)
        {
            die ("<h1>Ошибка запроса к базе данных</h1>");
        }

        return $result;
    }

    /**
     * @param array
     * @return array|\mysqli_result
     */
    public function multiSql($queries)
    {
        foreach ($queries as $query)
        {
            $result[] = $this->sql($query);
        }

        return $result;
    }
}