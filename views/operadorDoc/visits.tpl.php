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
        <li><a href="#">Visitas</a></li>
        <li><a href="../operadorDoc/reports">Reportes</a></li>
        <li><a href="../operadorDoc/accessRequest">Solicitud de Acceso</a></li>
    </ul>
</nav>
<section>
    <h3 class="title">Visualización de Visitas por Día</h3>
    <form id="formVisits" action="viewVisits" method="post">
        <div class="listaEmpresas">
            <label for="listaEmpresas" class="block">Empresa</label>
            <select name="listaEmpresas" id="listaEmpresas">
                <option value="">Seleccione Empresa</option>
                <option value="">Empresa 1...</option>
                <option value="">Empresa 2...</option>
            </select>
        </div>
        <div class="diaVisita">
            <label for="diaVisits" class="block">Día</label>

        </div>
        <div class="buttonSubmit">
            <input type="submit"  id="buttonVisits" value="Visualizar">
        </div>
    </form>
</section>