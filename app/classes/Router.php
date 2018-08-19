<?php
namespace app\classes;


class Router
{
    /**
     * Объект для получения контента
     * @var CContent $content_object
     */
    private $content_object;

    /**
     * Контент страницы
     * @var string $page_content
     */
    private $page_content;


    public function __construct($content_object)
    {
        $this->content_object = $content_object;

        if ($_GET)
        {
            foreach ($_GET as $index => $value)
            {
                switch ($index)
                {
                    case 'info_page':
                        $this->page_content = $this->content_object->getContent($value);
                        break;
                }
            }
        }
        else
        {
            $this->page_content = $this->content_object->getContent('main');
        }
    }

    public function printContent($key)
    {
        echo $this->page_content[$key];

        if (!isset($_GET['info_page']) AND $key == 'content')
        {
            require_once "views/VSignIn.php";
        }
    }
}