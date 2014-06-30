<nav class="nav_guardia">
    <ul>
        <li><a href="#">Inicio</a></li>
        <li>
            <a href="#">Visita</a>
            <input type="text" name="fecha" class="calendar">
            <input type="button" value="Solicitar" />
        </li>
    </ul>
</nav>
<section>
    <div class="item_inicio">
        <hgroup>
            <h3>Bienvenido</h3>
            <h2><?= $nombre; ?></h2>
        </hgroup>
    </div>
    <div class="personal_data">
        <h3>Datos Personales</h3>
        <div class="data_person">
            <p class="data_item"><strong>Correo :</strong></p>
            <p class="data_item"><?= $correo; ?></p>
        </div>
</section>