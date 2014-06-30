
    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li>
                <a href="#">Usuarios</a>
                <ul>
                    <li><a href="operadorDoc/modifyUser">Modificar</a></li>
                    <li><a href="operadorDoc/addUser">Agregar</a></li>
                </ul>
            </li>
            <li><a href="operadorDoc/visits">Visitas</a></li>
            <li><a href="operadorDoc/reports">Reportes</a></li>
            <li><a href="operadorDoc/accessRequest">Solicitud de Acceso</a></li>
        </ul>
    </nav>
    <section>
        <div class="item_inicio">
            <hgroup>
                <h3>Bienvenido</h3>
                <!--<h2>Nombre Operador Doc</h2>-->
                <h2><?= $nombre; ?></h2>

            </hgroup>
        </div>
        <div class="personal_data">
            <h3>Datos Personales</h3>
            <div class="data_person">
                <p class="data_item"><strong>Correo :</strong></p>
                <!--<p class="data_item">Correo Usuario</p>-->
                <p class="data_item"><?= $correo; ?></p>
            </div>
    </section>

