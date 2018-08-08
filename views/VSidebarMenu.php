<!-- Боковое меню -->
<nav id="menu-sidebar">
    <?php
    // Если пользователь вошел на сайт,
    // то даём ему возможность выйти
    if ($_SESSION['authorised'])
    {
        echo "<p><a href='?exit=true'>Выйти</a></p>";
    }
    // Если пользователь прошел по какой-либо ссылке,
    // то даём ему возможность вернуться на главную страницу сайта
    if ($_GET)
    {
        ?><p><a href='index.php'>На главную страницу</a></p><?php
    }
    ?>

    <!-- ИНФОРМАЦИЯ ДЛЯ РОДИТЕЛЕЙ И ПЕДАГОГОВ -->
    <p>
        <a href="?page=forParents"><img src="img/menu-parents-icon.png">Родителям</a>
        <a href="?page=forTeachers"><img src="img/menu-teachers-icon.png">Педагогам</a>
    </p>

    <!-- В отдельном блоке подключаем все страницы с БД -->
    <div>
        <?php
        require_once "views/VPages.php";
        ?>
    </div>
</nav>

<!-- кнопка для открытия бокового меню -->
<!-- ( использую атрибут onklick, внутри него всё подробно расписано ) -->
<i
    id="nav_opener"
    class="i-jsButton"
    onclick="
    // получаем боковое меню для дальнейших манипуляций
    let nav_sidebar = document.getElementById('menu-sidebar');

    // получаем позицию меню для понятия, открыто оно или нет
    let nav_pos = getComputedStyle(nav_sidebar, null).left;

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
    }"
>
    <!-- ( использую (R)Font Awesome ) -->
    <i class="icon-align-justify"></i>
</i>