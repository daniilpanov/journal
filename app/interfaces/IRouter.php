<?php
namespace app\interfaces;
use app\classes\CContent;

interface IRouter
{
    /**
     * @param $content_object CContent
     * @return void
     */
    public function __construct(CContent $content_object);

    /**
     * @return void
     */
    public function router();

    /**
     * @param $key string
     * @return void
     */
    public function printContent($key);
}