<?php
namespace app\classes;
use app\interfaces\IRouter;


class Router implements IRouter
{
    /**
     * Объект для получения контента
     * @var CContent $content_object
     */
    private $content_object;

    /**
     * Контент страницы
     * @var array $page_content
     */
    private $page_content;


    public function __construct(CContent $content_object)
    {
        $this->content_object = $content_object;
        $this->router();
    }

    public function router()
    {
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

    /**
     * @param string $key
     */
    public function printContent($key)
    {
        // Выводим элемент массива с указанным ключом
        echo $this->page_content[$key];

        // и если запрашивается контент, и эта страница - главная, то
        if ((!$_GET) AND ($key == 'content'))
        {
            // Подключаем поле для входа
            require_once "views/VSignIn.php";
        }
    }
}