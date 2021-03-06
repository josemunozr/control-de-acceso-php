<?php
require 'models/app/seguridadAcceso.php';
?>
<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sistema control de acceso</title>
        <link rel="stylesheet" href='<?= BASE_URL?>views/layout/css/normalize.css'>
        <link rel="stylesheet" href='<?= BASE_URL?>views/layout/css/stylePerfil.css' id="linkStylePerfil">
        <link rel="stylesheet" href='<?= BASE_URL?>views/layout/css/jquery-ui.css'>
        <link rel="stylesheet" href='<?= BASE_URL?>views/layout/css/styleModules.css'>


    </head>
    <body>
    <div class="content">
        <header>
            <h1>Sistema control de acceso</h1>
            <div class="logout_button">
                <a href="<?= BASE_URL?>models/app/logout.php"><p>Logout</p></a>
                <!-- <a href="Control/logout"><p>Logout</p></a> -->
            </div>
        </header>

            <?= $tpl_content; ?>

        <footer>
            <p>Powered by @jm & @da</p>
        </footer>

    </div>


    <!-- 	Script   -->

    <script type="text/javascript" src="<?= BASE_URL?>views/layout/js/jquery.js"></script>
    <script type="text/javascript" src="<?= BASE_URL?>views/layout/js/script.js"></script>
    <script type="text/javascript" src="<?= BASE_URL?>views/layout/js/jquery.validator.Rut.js"></script>
    <script type="text/javascript" src="<?= BASE_URL?>views/layout/js/jquery-ui.js"></script>

    </body>
    </html>
