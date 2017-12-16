<?php
header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
header("Status: 404 Not Found");
$_SERVER['REDIRECT_STATUS'] = 404;
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <?php require('template/head.php'); ?>

</head>
<body>

    <?php require('template/header.php'); ?>

    <?php $selectedMenuItem = "inicio"; require('template/nav.php'); ?>

    <div class="container section" id="error-404">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                <h1>Página no encontrada</h1>
                <p>La página que está buscando no existe. Esto puede deberse a varios motivos, como por ejemplo:</p>
                <ul>
                    <li>Si accedió a través de un enlace en una página externa, tal vez el contenido esté obsoleto o el enlace sea incorrecto.</li>
                    <li>También puede ocurrir esto si utilizó un acceso desde su barra de marcadores o favoritos.</li>
                    <li>Como última opción, puede haber ocurrido un problema interno, pero es altamente improbable.</li>
                </ul>
                <p>En cualquier caso, puede volver a la:</p>
                <div class="text-center"><?php
                    if (isset($_SERVER['HTTP_REFERER']) && strlen($_SERVER['HTTP_REFERER']) > 0) { ?>
                    <a class="btn btn-default" href="<?php print($_SERVER['HTTP_REFERER']); ?>">
                            <i class="glyphicon glyphicon-chevron-left"></i>P&aacute;gina anterior
                        </a>
                    <?php
                    }
                    ?>
                    <a class="btn btn-primary" href="<?php print(BASE_URL); ?>">
                        <i class="glyphicon glyphicon-home"></i>P&aacute;gina principal
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php require('template/footer.php'); ?>

    <?php require('template/scripts.php'); ?>

    <!-- Aquí irán los scripts específicos de la página -->

</body>
</html>