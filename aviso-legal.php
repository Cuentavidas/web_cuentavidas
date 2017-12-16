<?php
$emailWeb = "info@cuentavidas.com";
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <?php require('template/head.php'); ?>

</head>
<body>

    <?php require('template/header.php'); ?>

    <?php $selectedMenuItem = "inicio"; require('template/nav.php'); ?>

    <div class="container section" id="aviso-legal">
        <div class="row">
            <div class="col-xs-12">
                <h1>Aviso legal</h1>
                <p>CUENTAVIDAS con es titular de www.cuentavidas.com y de los espacios referenciados en el apartado: www.cuentavidas.com</p>

                <p>CUENTAVIDAS, por sí o como cesionaria, es la titular de los derechos de propiedad intelectual e industrial contenidas en todos sus espacios en la red pública denominada Internet, así como de todos los elementos contenidos en el mismo (a titulo enunciativo: imágenes, sonido, audio, vídeo, software, marcas o logotipos, programas de ordenador necesarios para su funcionamiento, etc.), titularidad de sus licenciantes.</p>

                <p>El visitante se compromete a respetar dichos derechos.<br>
                    La utilización o la publicación, parcial o total, con fines comerciales, de documentos, fotografías, películas, logotipos y elementos gráficos está estrictamente prohibida sin autorización previa. Ésta deberá pedirse a CUENTAVIDAS <a href="mailto:<?php print($emailWeb); ?>"><?php print($emailWeb); ?></a>. Está prohibido modificar el material cuyos derechos se reserva CUENTAVIDAS. Cabe señalar que se solicitará una muestra o un ejemplar de prueba antes de dar la aprobación final.</p>

                <p>Asimismo todas las fotografías cuya utilización se autorice deberán reproducirse incorporando el siguiente copyright: &copy; CUENTAVIDAS.<br>
                    Utilización personal y no comercial: se puede copiar los documentos, a condición de que se incluya también la mención de reserva de los derechos de autor y las indicaciones de las fuentes, de que no se efectúe modificación alguna y de que sean reproducidos íntegramente.</p>

                <p>En cualquier caso, las fotografías, películas, logotipos y elementos gráficos no pueden utilizarse ni copiarse sin previa autorización de CUENTAVIDAS.<br>
                    Los encargados de sitios web que creen enlaces con este sitio deben informar a CUENTAVIDAS por correo electrónico a la siguiente dirección: <a href="mailto:<?php print($emailWeb); ?>"><?php print($emailWeb); ?></a>.</p>


                <p>La inclusión de dichas conexiones no implicará ningún tipo de asociación o participación con las entidades conectadas. CUENTAVIDAS se reserva el derecho a denegar dicho acceso en cualquier momento.</p>

                <p>Aunque los enlaces son supervisados regularmente para evitar que pueda producirse alguna de las situaciones siguientes, en el caso de que cualquier usuario o visitante entendiese que el contenido o los servicios prestados por las páginas enlazadas son ilícitos, vulneran valores o principios constitucionales, o los principios de CUENTAVIDAS, o lesionan bienes o derechos del propio usuario o de un tercero, se ruega que lo comuniquen a la siguiente dirección: <a href="mailto:<?php print($emailWeb); ?>"><?php print($emailWeb); ?></a>.</p>

                <p>CUENTAVIDAS no será responsable, en caso alguno, por los daños y perjuicios de cualquier tipo derivados de la falta de lectura de este aviso, o del incumplimiento de las obligaciones específicas en las condiciones establecidas en el mismo.</p>

                <p>El visitante responderá de los daños y perjuicios que pudiera ocasionar a las páginas web de CUENTAVIDAS.</p>

                <p>Será de aplicación la normativa española vigente y cualquier controversia se someterá a los Juzgados y Tribunales de la ciudad de Madrid.</p>
            </div>
        </div>
    </div>

    <?php require('template/footer.php'); ?>

    <?php require('template/scripts.php'); ?>

    <!-- Aquí irán los scripts específicos de la página -->

</body>
</html>