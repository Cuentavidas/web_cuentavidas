<?php

    session_start();

    $cwd = getcwd();

    chdir(dirname(__FILE__));

    require_once("config.php");

    chdir($cwd);

    define("PROJECT_NAME", "Cuentavidas");
    header('X-UA-Compatible: IE=edge,chrome=1');

    define("MAX_VIDEOS_PER_PAGE", 10);

?>