    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sistema control de acceso</title>
        <link rel="stylesheet" href="views/css/normalize.css">
        <link rel="stylesheet" href="views/css/stylePerfil.css">
        <link rel="stylesheet" href="views/css/styleModules.css.css">
        <link rel="stylesheet" href="views/css/jquery-ui-1.10.4.custom.css">
    </head>
    <body>
    <div class="content">
        <header>
            <h1>Sistema control de acceso</h1>
            <div class="logout_button">
                <a href="#"><p>Logout</p></a>
            </div>
        </header>

            <?= $tpl_content; ?>

    <footer>
        <p>Powered by @jm & @da</p>
    </footer>
    </div>

    <!-- 	Script   -->

    <script type="text/javascript" src="views/js/jquery.js"></script>
    <script type="text/javascript" src="views/js/script.js"></script>
    <script type="text/javascript" src="views/js/jquery.validator.Rut.js"></script>
    <script type="text/javascript" src="views/js/jquery-ui-datepicker.js"></script>

    </body>
    </html>
