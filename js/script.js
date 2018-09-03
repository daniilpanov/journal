'use strict';

let opener_focus = false;

function nav_opener_onclick()
{
    var nav_opener = document.getElementById("nav_opener");

    nav_opener.onfocus = function () {
        opener_focus = true;
    };
    nav_opener.onblur = function () {
        opener_focus = false;
    };

    nav_opener.onclick = function () {
        // получаем элемент, текст которого будем изменять
        var nav_opener_text = document.getElementById("nav_opener_text");
        // получаем элемент, который будем поворачивать
        var for_rotate = document.getElementById("for_rotate");
        // получаем боковое меню для его открытия/закрытия
        var nav_sidebar = document.getElementById('sidebar-nav');
        // получаем позицию меню для понятия, открыто оно или нет
        var nav_pos = window.getComputedStyle(nav_sidebar, null).left;
        // ЕСЛИ МЕНЮ ЗАКРЫТО:
        if ( nav_pos !== '0px')
        {
            // 1.  Открываем его
            nav_sidebar.style.left = '0px';
            // 2.  Поворачиваем кнопку на 90 градусов по часовой стрелке
            for_rotate.className = 'icon-align-justify afterClick';
            // 3.  И меняем текст
            nav_opener_text.innerHTML = "Свернуть";
        }
        // ЕСЛИ МЕНЮ ОТКРЫТО:
        else
        {
            // 1.  Закрываем его
            nav_sidebar.style.left = '-25em';
            // 2.  Поворачиваем кнопку на 90 градусов против часовой стрелки
            for_rotate.className = 'icon-align-justify';
            // 3.  И меняем текст
            nav_opener_text.innerHTML = "МЕНЮ";
        }
    };
}

function body_onclick()
{
    window.onclick = function () {
        if ( !opener_focus )
        {
            // получаем элемент, текст которого будем изменять
            var nav_opener_text = document.getElementById('nav_opener_text');
            // получаем элемент, который будем поворачивать
            var for_rotate = document.getElementById('for_rotate');
            // получаем боковое меню для его открытия/закрытия
            var nav_sidebar = document.getElementById('sidebar-nav');
            // получаем позицию меню для понятия, открыто оно или нет
            var nav_pos = window.getComputedStyle(nav_sidebar, null).left;
            //
            if (nav_pos === '0px')
            {
                // 1.  Закрываем его
                nav_sidebar.style.left = '-25em';
                // 2.  Поворачиваем кнопку на 90 градусов по часовой стрелке
                for_rotate.className = 'icon-align-justify';
                // 3.  И меняем текст
                nav_opener_text.innerHTML = 'МЕНЮ';
            }
        }
    };
}