<!-- НАВИГАЦИЯ ПО САЙТУ -->
<nav id="S_top-nav">
    <!--  -->
    <div>
        <form method="post" action="exit.php">
            <button type="submit" class="btn" name="exit">
                Выйти
            </button>
        </form><?php
        // Если пользователь перешёл по какой-либо ссылке,
        if ($_GET)
        {
            // выводим ссылку на главную страницу.
            echo "<a href='index.php' class='btn btn-default' id='go_to_index'>Обратно на главную страницу</a>";
        }
        ?>
    </div>
    <?php
    /*
     * Это меню открывает папку с видами и выводит на них ссылки
     */

    // Открываем папку с видами
    $all_views = opendir("views");

    // и в цикле while(пока можно читать папку) перебираем все элементы папки.
    while ($one_dir = readdir($all_views))
    {
        // Если элемент папки - тоже папка и в ней есть файл info.txt, то делаем следующее:
        if ($views_dir_info = file("views/" . $one_dir . "/info.txt"))
        {
            // переменной $name будет храниться имя группы видов.
            $name = $views_dir_info[0];
            // Далее - выводим кнопку, открывающую/закрывающую выпадающее меню
            ?>
            <div class='btn-group'>
                <!-- кнопка, открывающая/закрывающая выпадающее меню -->
                <button
                        type='button' data-toggle='dropdown'
                        class='btn dropdown-toggle dropdown-toggle'
                        aria-haspopup='true' aria-expanded='false'
                >
                    <!-- выводим имя группы ссылок -->
                    <?=$name ?><span class="caret"></span>
                </button><?php
                // Если на второй строчке есть символ "{", то
                if ($views_dir_info[1] = "{")
                {
                    // удаляем из массива две первых строчки
                    // для того, чтобы их не перебирал цикл foreach.
                    unset($views_dir_info[0], $views_dir_info[1]);
                    // Выводим выпадающий список.
                    echo
                    "
                    <div class='dropdown-menu'>\n\n";

                    // Теперь перебираем массив с информацией о группе видов;
                    foreach ($views_dir_info as $item)
                    {
                        // и если очередная строка равна символу "}", то
                        if ($item == "}") break(1); // выходим из цикла.

                        // Далее - записываем в данные переменные имя ссылки и её адрес.
                        list($link_name, $link_url) = explode(" : ", $item);

                        // И, наконец, выводим эту ссылку.
                        echo "<a href='?{$one_dir}={$link_url}' class='dropdown-item'>{$link_name}</a>";
                    }
                    // Выводим закрывающий тег выпадающего списка
                    echo "\n\t\t\t\t</div> <!--div.dropdown-menu--> \n";
                }
                ?>
            </div> <!--div.btn-group--><?php
        }
    }
    // и закрываем папку.
    closedir($all_views);
    ?>
</nav> <!--nav#S_top-nav-->
<!-- END  НАВИГАЦИЯ ПО САЙТУ -->