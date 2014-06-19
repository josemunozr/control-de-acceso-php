
<nav>
    <ul>
        <li><a href="home.html">Inicio</a></li>
        <li>
            <a href="#">Usuarios</a>
            <ul>
                <li><a href="modifyUser.html">Modificar</a></li>
                <li><a href="addUser.html">Agregar</a></li>
            </ul>
        </li>
        <li><a href="visits.html">Visitas</a></li>
        <li><a href="reports.html">Reportes</a></li>
        <li><a href="accessRequest.html">Solicitud de Acceso</a></li>
    </ul>
</nav>
<section>
    <h3 class="title">Modificación de Usuario</h3>
    <form id="formModifyUser" action="#" method="post">
        <div class="item_rutUsuario">
            <label for="rutUsuario" class="block">Rut de Usuario</label>
            <input type="text" id="rutUsuario" required/>
        </div>
        <div class="typePerfil">
            <label for="tipoPerfil" class="block ">Tipo de Perfil</label>
            <select name="tipoPerfil" id="tipoPerfil">
                <option value="">Seleccione un perfil</option>
                <option value="Administrador">Administrador</option>
                <option value="Administrador">Operador Doc</option>
                <option value="Administrador">Técnico</option>
            </select>
        </div>
        <div class="inicioFin">
            <div class="dateInicio inlineBlock">
                <label for="fechaInicio" class="block">Incio</label>
                <input type="text" id="fechaInicio" class="calendar" required/>
            </div>
            <div class="dateFin inlineBlock">
                <label for="fechaTermino" class="block">Fin</label>
                <input type="text" id="fechaTermino" class="calendar" required/>
            </div>
        </div>
    </form>
</section>