<nav>
    <ul>
        <li><a href="../administrador">Inicio</a></li>
        <li>
            <a href="#">Usuarios</a>
            <ul>
                <li><a href="../administrador/modifyUser">Modificar</a></li>
                <li><a href="../administrador/addUser">Agregar</a></li>
            </ul>
        </li>
        <li><a href="#">Reportes</a></li>
        <li><a href="../administrador/accessRequest">Solicitud de Acceso</a></li>
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
                <label for="dateDesde" class="block">Incio</label>
                <input type="text" id="dateDesde" class="calendar" required/>
            </div>
            <div class="dateHasta inlineBlock">
                <label for="fechaHasta" class="block">Fin</label>
                <input type="text" id="fechaHasta" class="calendar" required/>
            </div>
        </div>
        <div class="buttonSubmit">
            <input type="submit"  value="Generar">
        </div>
    </form>
</section>