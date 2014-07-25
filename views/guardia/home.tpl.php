<nav class="nav_guardia">
    <ul>
        <li><a href="#">Inicio</a></li>
        <form id="calendarGuardia" action="guardia/viewVisits" method="post">

            <select name="listaEmpresas" id="listaEmpresas">
                <option SELECTED>Seleccione Empresa</option>
                <?php foreach ($listEmpresa as $valor) { ?>
                    <option value="<?= $valor['cod_emp']?>"><?= $valor['nombre']?></option>
                <?php } ?>
            </select>

            <div id="calendarVisits" title="Lista de visitantes por día">
                <label for="date" class="block"	>Visita</label>
                <input type="text" id="date" class="calendar" name="fechaVisits" required/>
            </div>
            <input type="submit" value="Consutar"/>
        </form>
    </ul>
    <div id="msgGuardia"
    <?php if($_GET["estado"] == "false"){?>
    <span style="display: block">No existen visitas para la Empresa o dia Consultada</span>
    <?php  }?>

    </div>
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
        <div class="data_company">
            <p class="data_item"><strong>Empresa :</strong></p>
            <p class="data_item"><?= $empresa; ?></p>
        </div>
        <div class="data_person">
            <p class="data_item"><strong>Correo :</strong></p>
            <p class="data_item"><?= $correo; ?></p>
        </div>
</section>