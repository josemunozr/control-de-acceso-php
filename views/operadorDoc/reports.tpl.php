<nav>
    <ul>
        <li><a href="../operadorDoc">Inicio</a></li>
        <li>
            <a href="#">Usuarios</a>
            <ul>
                <li><a href="../operadorDoc/modifyUser">Modificar</a></li>
                <li><a href="../operadorDoc/addUser">Agregar</a></li>
            </ul>
        </li>
        <li><a href="../operadorDoc/visits">Visitas</a></li>
        <li><a href="#">Reportes</a></li>
        <li><a href="../operadorDoc/accessRequest">Solicitud de Acceso</a></li>
    </ul>
</nav>
<section>
    <h3 class="title">Reportes</h3>
    <form id="formReports" action="#" method="post">
        <div class="listaEmpresas">
            <label for="listaEmpresas" class="block">Empresa</label>
            <select name="listaEmpresas" id="listaEmpresas">
                <option value="">Seleccione Empresa</option>
                <option value="">Empresa 1...</option>
                <option value="">Empresa 2...</option>
            </select>
        </div>
        <div class="desde_hasta">
            <div id="reportDesde" title="Reporte Desde: " >
                <label for="fechaInicio" class="block">Desde</label>
                <input type="text" id="fechaInicio" class="calendar" title="Inicio vigencia perfil" required/>
            </div>
            <div id="reportHasta" title="Reporte Hasta: ">
                <label for="fechaInicio" class="block">Hasta</label>
                <input type="text" id="fechaInicio" class="calendar" title="Inicio vigencia perfil" required/>
            </div>
        </div>

            <input type="submit"  value="Generar">

    </form>
</section>