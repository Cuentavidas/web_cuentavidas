<?php

require_once('./controller/config.php');
require('./controller/database/DB.php');
require('./controller/database/RecuerdoController.php');
require('./model/Recuerdo.php');
require('./controller/aux/Tools.php');
require('./controller/database/ProvinciaController.php');
require('./model/Provincia.php');

if (count($_POST) > 0) {

    if(is_numeric($_POST['form-suberecuerdo-provincia'])) {
        header('Location: ' . BASE_URL . '/recuerdos.php?provincia=' . $_POST['form-suberecuerdo-provincia'], true, 303);
        exit();
    }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <?php require('template/head.php'); ?>

    <script>

        function goToProvincia(){
            prov = $('#form-provincia').val();
            window.location = "http://www.cuentavidas.dev/recuerdos.php?provincia=" + prov;
        }

    </script>

</head>
<body>

    <?php require('template/header.php'); ?>

    <?php $selectedMenuItem = "inicio"; require('template/nav.php'); ?>

    <!-- CARRUSEL DE VIDEOS -->

    <?php
        $recuerdoCarouselArray = RecuerdoController::selectVisiblePortada();
        shuffle($recuerdoCarouselArray);
        $maxCarouselItems = min(array(count($recuerdoCarouselArray), 12));
        $index = 0;
        $steps = 4;
    ?>

    <div class="container section" id="carousel">
        <div id="carousel-recuerdos" class="carousel slide" data-ride="carousel">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="carousel-inner">
                        <?php
                        while($index < $maxCarouselItems) {
                        ?>
                            <div class="item<?php if ($index == 0) { print(" active"); } ?>">
                                <div class="row">
                                    <?php

                                    $newLimit = $index + $steps;
                                    for(; $index < $newLimit && $index < count($recuerdoCarouselArray); $index++) {

                                        $recuerdoCarouselItem = $recuerdoCarouselArray[$index];
                                    ?>

                                        <div class="col-md-<?php print(12/$steps); ?> col-sm-<?php print(12/($steps - 1)); ?> col-xs-<?php print(12/($steps - 2)); ?><?php print(($index % $steps >= $steps - 1 ? " hidden-sm" : "") . ($index % $steps >= $steps - 2 ? " hidden-xs" : "")); ?>">
                                            <a class="img-thumbnail" href="recuerdo.php?linkname=<?php print(Tools::string2link($recuerdoCarouselItem->TITULO));?>&idrecuerdo=<?php print(Tools::string2link($recuerdoCarouselItem->ID_RECUERDO)); ?>" >
                                                <img class="img-responsive" src="<?php print(BASE_URL_POSTER . $recuerdoCarouselItem->URL_POSTER); ?>" alt="<?php print($recuerdoCarouselItem->TITULO); ?>">
                                            </a>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <a class="left carousel-control" href="#carousel-recuerdos" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carousel-recuerdos" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>

        </div>
    </div>

    <!-- ./CARRUSEL DE VIDEOS -->

    <div class="container section" id="texto-mapas">
        <div class="row">
            <div class="col-sm-7 col-xs-12">

                <p align="justify">
                    <em>Cuentavidas</em> es una web de pequeños recuerdos.
                </p>

                <p align="justify">
                    <em></em>Si en algo está cifrada nuestra vida son en esas mínimas historias cuyo recuerdo ha sobrevivido al paso del tiempo y que ahora conforman una parte fundamental de lo que somos. Todos tenemos algo que contar y que compartir. Esas historias, encuentros y desencuentros, derrotas y conquistas, descubrimientos, pérdidas…que siguen siendo tan reales como el día que sucedieron porque al contarlas cobran aún más verdad: el paso del tiempo les ha enriquecido con más comprensión y sentido. La memoria conoce lo que la vida no percibe, decía el poeta Luis Cernuda.
                </p>

                <p align="justify">
                    <em></em>Puedes participar grabando un vídeo que no supere los cinco minutos de duración o atreviéndote a  escribir un relato, un pequeño cuento, basado en las historias de los otros. Ficcionalizar fragmentos de sus vidas, cabalgar en sus historias es incorporar a mi mundo el mundo de los demás, vivir en la vida de los otros y descubrir también en mí la emoción que ellos sintieron.
                </p>

                <p align="justify">
                    <em>Cuentavidas</em> también pretende ser un espacio para el encuentro entre generaciones, en el que todos, desde la escritura o desde el testimonio den cuenta de que la vida también se construye.
                </p>

            </div>
            <div class="col-sm-5 col-xs-12">
                <div style="border:3px double #8C1010; padding:5px; height: 100%">
                    <h4>Mira los recuerdos de una provincia</h4>
                    <br>
                        <select class="form-control" id="form-provincia" name="form-provincia">
                            <option>Seleccione una provincia...</option>
                            <?php

                            $provinciaArray = ProvinciaController::selectAll();

                            foreach($provinciaArray as $provinciaItem) {
                                if(strcmp($provinciaItem->NOMBRE,'Desconocido') !== 0) {
                                ?>
                                <option value="<?php print($provinciaItem->ID_PROVINCIA); ?>"<?php if (isset($_POST["form-suberecuerdo-provincia"]) && $_POST["form-suberecuerdo-provincia"] == $provinciaItem->ID_PROVINCIA) { ?> selected<?php } ?>><?php print($provinciaItem->NOMBRE); ?></option>

                            <?php }
                            } ?>
                        </select>
                        <br><br>
                        <button class="btn btn-primary center-block" name="form-suberecuerdo-submit" onclick="goToProvincia()">Buscar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container section" id="partners">
        <div class="row">
            <div class="col-xs-4">
                <a href="http://www.red-solidaria.org/" target="_blank" title="Red Solidaria Intergeneracional">
                    <img src="img/red-solidaria-intergeneracional.png" class="img-responsive center-block" alt="Red Solidaria Intergeneracional">
                </a>
            </div>
            <div class="col-xs-4">
                <a href="https://www.ucm.es/mayores/" target="_blank" title="Universidad para los Mayores UCM">
                    <img src="img/universidad-para-los-mayores-ucm-2.png" class="img-responsive center-block" alt="Universidad para los Mayores UCM" style="padding:0px 16px;">
                </a>
            </div>
            <div class="col-xs-4">
                <a href="https://www.ucm.es/" target="_blank" title="Universidad Complutense de Madrid">
                    <img src="img/universidad-complutense-de-madrid.png" class="img-responsive center-block" alt="Universidad Complutense de Madrid">
                </a>
            </div>
        </div>
    </div>

    <?php require('template/footer.php'); ?>

    <?php require('template/scripts.php'); ?>

    <!-- Aquí irá los scripts específicos de la página -->

</body>
</html>