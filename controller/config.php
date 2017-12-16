<?php

// BASE DE DATOS
define("DB_HOST", "localhost");
define("DB_USER", "cuentavidas");
define("DB_PASS", "cuenta123vidad");
define("DB_NAME", "cuentavidas");
//define("DB_PREF", "dev_");

// RUTAS BASE
define("BASE_URL", "http://www.cuentavidas.dev/");
//define("BASE_URL_VIDEO", "/media/video/");
define("BASE_URL_POSTER", "../media/poster/");
/*define("BASE_PATH_DOMAIN", "/homez.644/cuentavi/www/");
define("BASE_PATH", BASE_PATH_DOMAIN . "");
define("BASE_PATH_TMP", BASE_PATH_DOMAIN . "/media/tmp/");*/

define("MODEL_UTF8", true);

//

// Incluir todos los ficheros necesarios
/*$cwd = getcwd();
chdir(BASE_PATH);
$files = array_merge(array_diff(glob('inc/*.php'), glob('inc/*config.php')), glob('model/*.php'), glob('controller/*.php'));
foreach ($files as $file)
    require_once($file);
chdir($cwd);

if (isset($_SESSION["usuario"]))
	$USUARIO = unserialize($_SESSION["usuario"]);
?>
*/