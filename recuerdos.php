<?php

require_once('./controller/web_config.php');
require_once('./controller/config.php');
require('./controller/database/DB.php');
require('./controller/database/RecuerdoController.php');
require('./model/Recuerdo.php');
require('./controller/aux/Tools.php');

if (isset($_GET["provincia"])){
    $totalPaginas = ceil(RecuerdoController::getVisibleCountByProvincia($_GET["provincia"]) / MAX_VIDEOS_PER_PAGE);
    $currentPage = 1;

    if (isset($_GET["page"])) {
        if (is_numeric($_GET["page"]) && intval($_GET["page"]) <= $totalPaginas)
            $currentPage = intval($_GET["page"]);
        else {
            header("Location: " . BASE_URL . "recuerdos");
            exit();
        }
    }
} else {
    $totalPaginas = ceil(RecuerdoController::getVisibleCount() / MAX_VIDEOS_PER_PAGE);
    $currentPage = 1;

    if (isset($_GET["page"])) {
        if (is_numeric($_GET["page"]) && intval($_GET["page"]) <= $totalPaginas)
            $currentPage = intval($_GET["page"]);
        else {
            header("Location: " . BASE_URL . "recuerdos");
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <?php require('template/head.php'); ?>

</head>
<body>

    <?php require('template/header.php'); ?>

    <?php $selectedMenuItem = "recuerdos"; require('template/nav.php'); ?>

    <div class="container section" id="recuerdos">
        <h1 class="recuerdos_h1">Recuerdos</h1>
        <?php

        $recuerdoArray = RecuerdoController::selectVisible($currentPage - 1);
        if(isset($_GET["provincia"]))
            $recuerdoArray = RecuerdoController::selectByProvincia($_GET["provincia"], $currentPage - 1);

        foreach($recuerdoArray as $recuerdoItem) {
            ?>
            <div class="media">
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-6" style="padding-left:0px;">
                    <a href="recuerdo.php?linkname=<?php print(Tools::string2link($recuerdoItem->TITULO));?>&idrecuerdo=<?php print(Tools::string2link($recuerdoItem->ID_RECUERDO)); ?>"><img src="<?php print(BASE_URL_POSTER . $recuerdoItem->URL_POSTER); ?>" class="img-responsive" alt="<?php print($recuerdoItem->TITULO); ?>"></a>
                </div>
                <div class="media-body">
                    <h2 class="media-heading"><a href="recuerdo.php?linkname=<?php print(Tools::string2link($recuerdoItem->TITULO));?>&idrecuerdo=<?php print(Tools::string2link($recuerdoItem->ID_RECUERDO));?>"><?php print($recuerdoItem->TITULO);?></a></h2>
                    <?php print(nl2br($recuerdoItem->DESCRIPCION)); ?>
                </div>
            </div>
        <?php } ?>
        <?php if ($totalPaginas > 1) {
            ?>
            <div class="text-center">
                <ul class="pagination">
                    <li<?php print($currentPage == 1 ? " class=\"disabled\"" : ""); ?>>
                        <a
                            <?php
                            if(!isset($_GET["provincia"]))
                                print($currentPage > 1 ? (" href=\"recuerdos.php?page=" . ($currentPage - 1) . "\"") : "");
                            else
                                print($currentPage > 1 ? (" href=\"recuerdos.php?page=" . ($currentPage - 1) . "&provincia=" . $_GET["provincia"] ."\"") : "");
                            ?>>&laquo;</a></li>
                    <?php for($contadorPagina = 1; $contadorPagina <= $totalPaginas; $contadorPagina++) {
                        ?>
                        <li<?php print($currentPage == $contadorPagina ? " class=\"active\"" : ""); ?>><a href="recuerdos.php?page=<?php print($contadorPagina);
                            if(isset($_GET["provincia"])){
                                print("&provincia=" . $_GET["provincia"]);
                            } ?>"><?php print($contadorPagina); ?><?php print($currentPage == $contadorPagina ? "<span class=\"sr-only\">(actual)</span>" : ""); ?></a></li>
                    <?php } ?>
                    <li<?php print($currentPage == $totalPaginas ? " class=\"disabled\"" : ""); ?>>
                        <a
                            <?php
                            if(!isset($_GET["provincia"]))
                                print($currentPage < $totalPaginas ? (" href=\"recuerdos.php?page=" . ($currentPage + 1) . "\"") : "");
                            else
                                print($currentPage < $totalPaginas ? (" href=\"recuerdos.php?page=" . ($currentPage + 1) . "&provincia=" . $_GET["provincia"] ."\"") : "");
                            ?>>&raquo;</a></li>
                </ul>
            </div>
        <?php } ?>
    </div>

    <?php require('template/footer.php'); ?>

    <?php require('template/scripts.php'); ?>

    <!-- Aquí irán los scripts específicos de la página -->

</body>
</html>