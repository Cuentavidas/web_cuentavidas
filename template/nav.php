<div class="container">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Men&uacute; de navegaci&oacute;n</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs hidden-sm hidden-md hidden-lg" href="#">Men&uacute;</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav nav-justified">
                <li<?php if(strcmp($selectedMenuItem, "inicio") == 0) { print(' class="active"'); } ?>><a href="index.php">Inicio</a></li>
                <li<?php if(strcmp($selectedMenuItem, "quienes-somos") == 0) { print(' class="active"'); } ?>><a href="quienes-somos.php">Quienes somos</a></li>
                <li<?php if(strcmp($selectedMenuItem, "recuerdos") == 0) { print(' class="active"'); } ?>><a href="recuerdos.php">Recuerdos</a></li>
                <li<?php if(strcmp($selectedMenuItem, "sube-tu-recuerdo") == 0) { print(' class="active"'); } ?>><a href="sube-tu-recuerdo.php">Sube tu recuerdo</a></li>
                <li<?php if(strcmp($selectedMenuItem, "contacto") == 0) { print(' class="active"'); } ?>><a href="contacto.php">Contacto</a></li>
            </ul>
        </div>
    </nav>
</div>