<!--  TOP MENU  -->
<header>
    <nav id="top-nav" class="navbar navbar-default" role="navigation">
        <!-- Emblem and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""><img src="img/emblem.jpg" width="125" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav topPages">
                <li class="active"><a href="index.php">Главная страница</a></li>
                <?php
                $top_pages = $menu->getTopInfoPages();

                foreach ($top_pages as $top_page)
                {
                    echo "
                    <li>
                        <a class='top_pages' href='?info_page={$top_page['id']}' title='{$top_page['title']}'>
                            <i class='{$top_page['icon']}'></i>{$top_page['name']}
                        </a>
                    </li>";
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form navbar-left" role="search" method="get">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="Search" name="search">
                        </div>
                        <button type="submit" class="btn btn-default">Поиск</button>
                    </form>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</header>