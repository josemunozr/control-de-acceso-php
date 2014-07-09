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
            <div class="dateDesde inlineBlock">
                <label for="dateDesde" class="block">Desde</label>
                <input type="text" id="dateDesde" class="calendar" required/>
            </div>
            <div class="dateHasta inlineBlock">
                <label for="fechaHasta" class="block">Hasta</label>
                <input type="text" id="fechaHasta" class="calendar" required/>
            </div>
        </div>
        <div class="buttonSubmit">
            <input type="submit"  value="Generar">
        </div>
    </form>
</section>