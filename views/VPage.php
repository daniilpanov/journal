<?php
if ($_GET)
{
    foreach ($_GET as $index => $value)
    {
        switch ($index)
        {
            case 'info_page':
                $info_page = $content->getContent($value);
                break;
        }
    }
}
else
{
    $info_page = $content->getContent('main');
}