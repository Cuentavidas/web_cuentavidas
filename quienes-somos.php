<!DOCTYPE html>
<html lang="es">
<head>

    <?php require('template/head.php'); ?>

</head>
<body>

    <?php require('template/header.php'); ?>

    <?php $selectedMenuItem = "quienes-somos"; require('template/nav.php'); ?>

    <div class="container section" id="quienes-somos">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                <h1>¿Quiénes somos?</h1>
                <p class="quien_somos"><em>Cuentavidas</em> es un proyecto impulsado desde la <a href="http://www.ucm.es/mayores" target="_blank" title="Universidad para los Mayores de la Universidad Complutense de Madrid">Universidad para los Mayores de la Universidad Complutense de Madrid</a> y la <a href="http://www.red-solidaria.org" target="_blank" title="Asociación Red Solidaria Intergeneracional">Asociación Red Solidaria Intergeneracional</a>.</p>
            </div>
        </div>
    </div>

    <?php require('template/footer.php'); ?>

    <?php require('template/scripts.php'); ?>

    <!-- Aquí irán los scripts específicos de la página -->

</body>
</html>