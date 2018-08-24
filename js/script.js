'use strict';
function nav_opener_onclick()
{
    var nav_opener = document.getElementById("nav_opener");

    nav_opener.onclick = function () {
        // получаем боковое меню для дальнейших манипуляций
        var nav_sidebar = document.getElementById('sidebar-nav');
        // получаем позицию меню для понятия, открыто оно или нет
        var nav_pos = window.getComputedStyle(nav_sidebar, null).left;
        // ЕСЛИ МЕНЮ ОТКРЫТО:
        if ( nav_pos !== '0px')
        {
            // 1.  Закрываем его
            nav_sidebar.style.left = '0px';
            // 2.  И поворачиваем кнопку на 90 градусов по часовой стрелке
            this.style.transform = 'rotateZ(90deg)';
        }
        // ЕСЛИ МЕНЮ ЗАКРЫТО:
        else
        {
            // 1.  Открываем его
            nav_sidebar.style.left = '-25em';
            // 2.  И поворачиваем кнопку на 90 градусов против часовой стрелки
            this.style.transform = 'rotateZ(0deg)';
        }
    };
}