<?php

function getMenuType($obj)
{
    if($obj instanceof \authorized\app\classes\CDirector)
    {
        require_once "views/VDirector.php";
    }
    elseif($obj instanceof \authorized\app\classes\CTeacher)
    {
        require_once "views/VTeacher.php";
    }
    elseif($obj instanceof \authorized\app\classes\CStudent)
    {
        require_once "views/VStudent.php";
    }
}