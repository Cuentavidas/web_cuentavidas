<?php

require_once("controller/web_config.php");
require_once('./controller/config.php');
require('./controller/database/DB.php');
require('./controller/database/RecuerdoController.php');
require('./model/Recuerdo.php');
require('./controller/database/HistoriaController.php');
require('./model/Historia.php');
require('./controller/aux/Tools.php');

if (!isset($_GET["idrecuerdo"]) || !isset($_GET["linkname"])) {
    require('error404.php');
    exit();
}

$recuerdo = RecuerdoController::selectByIdRecuerdoAndVisible($_GET["idrecuerdo"]);
if ($recuerdo == NULL) {
    require('error404.php');
    exit();
}

if (strcmp($_GET["linkname"], Tools::string2link($recuerdo->TITULO)) != 0) {
    require('error404.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <?php require('template/head.php'); ?>
    <title><?php print($recuerdo->TITULO); ?></title>

</head>
<body>

    <?php require('template/header.php'); ?>

    <?php $selectedMenuItem = "recuerdos"; require('template/nav.php'); ?>

    <!-- Aquí irá el contenido de la página -->
    <div class="container section" id="recuerdo">
        <h1><?php print($recuerdo->TITULO); ?></h1>
        <div class="row">
            <div class="col-sm-7 col-xs-12">
                <div class="embed-responsive embed-responsive-16by9">
                <?php
                print($recuerdo->URL_VIDEO);
                ?>
                </div>
            </div>
            <div class="col-sm-5 col-xs-12">
                <?php print(nl2br($recuerdo->DESCRIPCION)); ?>
                <div class="text-center" style="margin-top:100px;">
                    <button class="btn btn-primary" style="margin:0px 50px; white-space:normal;" data-toggle="modal" data-target="#newStoryModal">Convierte el recuerdo de <?php print($recuerdo->TITULO); ?> en un cuento</button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="newStoryModal" tabindex="-1" role="dialog" aria-labelledby="newStoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" action="<?php print($_SERVER["REQUEST_URI"]); ?>" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                            <h4 class="modal-title" id="newStoryModalLabel">Convierte el recuerdo de <?php print($recuerdo->TITULO); ?> en un cuento</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="form-newstory-titulo">Título</label>
                                <input type="text" class="form-control" id="form-newstory-titulo" name="form-newstory-titulo" placeholder="Título del cuento" required>
                            </div>
                            <div class="form-group">
                                <label for="form-newstory-autor">Autor</label>
                                <input type="text" class="form-control" id="form-newstory-autor" name="form-newstory-autor" placeholder="Tu nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="form-newstory-texto">El cuento</label>
                                <textarea class="form-control" id="form-newstory-texto" name="form-newstory-texto" rows="6" required placeholder="Escribe aquí el cuento que quieres compartir"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                            <button type="submit" class="btn btn-primary" name="form-newstory-submit"><span class="glyphicon glyphicon-ok"></span>Enviar historia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php $historiaArray = HistoriaController::selectByRecuerdo($recuerdo, true);
        if (count($historiaArray) > 0) {
            ?>
            <h2>Historias que nacieron del recuerdo de <?php print($recuerdo->TITULO); ?></h2>
            <ul class="stories">
                <?php foreach($historiaArray as $historiaItem) { ?>
                    <li><em><?php print($historiaItem->TITULO); ?></em>, por <?php print($historiaItem->AUTOR); ?></li>
                    <p class="p-historia"><?php print($historiaItem->TEXTO); ?></p>


                <?php } ?>
            </ul>
        <?php } ?>
    </div>

    <?php require('template/footer.php'); ?>

    <?php require('template/scripts.php'); ?>

    <!-- Aquí irán los scripts específicos de la página -->

</body>
</html>