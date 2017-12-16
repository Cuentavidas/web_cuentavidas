<?php

require('./controller/EmailController.php');

$errores = array();

if (count($_POST) > 0) {
    if (isset($_POST["form-contacto-submit"])) { // Formulario de contacto
        if (!isset($_POST["form-contacto-nombre"]) || strlen(trim($_POST["form-contacto-nombre"])) <= 0)
            $errores[] = "form-contacto-nombre";
        if (!isset($_POST["form-contacto-email"]) || preg_match("/^([a-zA-Z0-9\._]+)\@([a-zA-Z0-9\.-]+)\.([a-zA-Z]{2,4})$/", $_POST["form-contacto-email"]) != 1)
            $errores[] = "form-contacto-email";
        if (isset($_POST["form-contacto-telefono"]) && preg_match("/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/", $_POST["form-contacto-telefono"]) != 1)
            $errores[] = "form-contacto-telefono";
        if (!isset($_POST["form-contacto-comentarios"]) || strlen(trim($_POST["form-contacto-comentarios"])) <= 0)
            $errores[] = "form-contacto-comentarios";
        if (!isset($_POST["form-contacto-acepto-condiciones"]))
            $errores[] = "form-contacto-acepto-condiciones";

        if (count($errores) == 0) {

            $mensaje	= "<table border='0'>
				<tr><td width='90'><strong>Nombre</strong>:</td><td>" . $_POST["form-contacto-nombre"] . "</td></tr>
				<tr><td><strong>Email</strong>:</td><td>" . $_POST["form-contacto-email"] . "</td></tr>
				<tr><td><strong>Tel&eacute;fono</strong>:</td><td>" . $_POST["form-contacto-telefono"] . "</td></tr>
				<tr><td valign='top'><strong>Comentarios</strong>:</td><td>" . nl2br(htmlspecialchars($_POST["form-contacto-comentarios"])) . "</td></tr>
			</table>";

            $remitente= $_POST["form-contacto-email"];
            $emailEnviado = sendEmail("", "", "", $mensaje);

            if($emailEnviado)
                $emailRecibido = sendEmailRemitente($remitente);

            if ($emailEnviado && $emailRecibido)
                unset($_POST);
        } else {
            $emailEnviado = false;
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

    <?php $selectedMenuItem = "contacto"; require('template/nav.php'); ?>

    <div class="container section" id="contacto">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                <h1 class="recuerdos_h1">Contacta con nosotros</h1>
               <!-- <?php		if (isset($emailEnviado) && $emailEnviado == true) { ?>
                    <div class="alert alert-success">Su mensaje se ha enviado correctamente. En breves contactaremos con usted. Muchas gracias.</div>
                <?php		} else if (isset($emailEnviado) && $emailEnviado == false && count($errores) == 0) {

                    echo("Isset " . isset($emailEnviado) . "\n");
                    echo $emailEnviado ? 'true' : 'false';
                    echo("Num errores: " . count($errores));
                    ?>
                    <div class="alert alert-danger">Hubo un problema al procesar el mensaje. Int&eacute;ntelo m&aacute;s tarde.</div>
                <?php		} else if (isset($emailEnviado) && $emailEnviado == false && count($errores) > 0) { ?>
                    <div class="alert alert-warning">Debe completar el formulario correctamente para poder enviarlo.</div>
                <?php		} ?>
                <form role="form" method="post" action="<?php print($_SERVER["REQUEST_URI"]); ?>" enctype="application/x-www-form-urlencoded">
                    <div class="form-group<?php print(in_array("form-contacto-nombre", $errores) ? " has-error" : ""); ?>">
                        <label for="form-contacto-nombre" class="control-label">Nombre *</label>
                        <input type="text" class="form-control" id="form-contacto-nombre" name="form-contacto-nombre" placeholder="Nombre" required value="<?php if(isset($_POST["form-contacto-nombre"])){ print($_POST["form-contacto-nombre"]); } ?>">
                    </div>
                    <div class="form-group<?php print(in_array("form-contacto-email", $errores) ? " has-error" : ""); ?>">
                        <label for="form-contacto-email" class="control-label">Email *</label>
                        <input type="email" class="form-control" id="form-contacto-email" name="form-contacto-email" placeholder="Email" required value="<?php if(isset($_POST["form-contacto-email"])){ print($_POST["form-contacto-email"]); } ?>">
                    </div>
                    <div class="form-group<?php print(in_array("form-contacto-telefono", $errores) ? " has-error" : ""); ?>">
                        <label for="form-contacto-telefono" class="control-label">Tel&eacute;fono</label>
                        <input type="tel" class="form-control" id="form-contacto-telefono" name="form-contacto-telefono" placeholder="Tel&eacute;fono" value="<?php if(isset($_POST["form-contacto-telefono"])){ print($_POST["form-contacto-telefono"]); } ?>">
                    </div>
                    <div class="form-group<?php print(in_array("form-contacto-comentarios", $errores) ? " has-error" : ""); ?>">
                        <label for="form-contacto-comentarios" class="control-label">Comentarios *</label>
                        <textarea class="form-control" id="form-contacto-comentarios" name="form-contacto-comentarios" rows="5" placeholder="Comentarios" required><?php if(isset($_POST["form-contacto-comentarios"])){ print($_POST["form-contacto-comentarios"]); } ?></textarea>
                    </div>
                    <div class="checkbox<?php print(in_array("form-contacto-acepto-condiciones", $errores) ? " has-error" : ""); ?>">
                        <label class="control-label">
                            <input type="checkbox" name="form-contacto-acepto-condiciones" required> Acepto las <a href="politica-privacidad.php" target="_blank">Condiciones de uso y la Política de privacidad</a>.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary center-block" name="form-contacto-submit"><i class="fa fa-send"></i>Enviar</button>
                </form> -->
                <p>Si quieres ponerte en contacto con nosotros envia un correo electrónico a <a href="mailto:cuentavidas@gmail.com">cuentavidas@gmail.com</a>.</p>
            </div>
        </div>
    </div>

    <?php require('template/footer.php'); ?>

    <?php require('template/scripts.php'); ?>

    <!-- Aquí irán los scripts específicos de la página -->

</body>
</html>