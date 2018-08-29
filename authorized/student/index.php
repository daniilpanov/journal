<?php

// CONFIG OF THIS PROJECT:
/*
 * 1.  header("Cache-Control: no-cache, must-revalidate")
 * 2.  Session_start()
 * 3.  Check: whether the user is authorized
 * 4.  Classes autoload
 * 5.  Objects of controllers
 */
require_once "config/ini.php";

// HEAD OF THIS PROJECT:
/*
 * 1.  <!DOCTYPE html>
 * 2.  <html>
 * 3.  <head>...</head>
 */
require_once "header.php";

// BODY OF THIS PROJECT:
/*
 * 1.  Top&Sidebar menus
 * 2.  <main>
 * 3.  Main Router
 */
require_once "body.php";

// FOOT OF THIS PROJECT:
/*
 * 1.  </main>
 * 2.  <footer>...</footer>
 * 3.  </body>&</html>
 */
require_once "footer.php";