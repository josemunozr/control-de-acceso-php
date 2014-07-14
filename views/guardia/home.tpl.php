<nav class="nav_guardia">
    <ul>
        <li><a href="#">Inicio</a></li>
        <form id="calendarGuardia" action="guardia/viewVisits" method="post">
            <div id="calendarVisits" title="Lista de visitantes por día">
                <label for="date" class="block"	>Visita</label>
                <input type="text" id="date" class="calendar"  required/>
            </div>
            <input type="submit" value="Consutar"/>
        </form>
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