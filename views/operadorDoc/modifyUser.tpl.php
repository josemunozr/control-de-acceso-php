
<nav>
    <ul>
        <li><a href="../operadorDoc">Inicio</a></li>
        <li>
            <a href="#">Usuarios</a>
            <ul>
                <li><a href="#">Modificar</a></li>
                <li><a href="../operadorDoc/addUser">Agregar</a></li>
            </ul>
        </li>
        <li><a href="../operadorDoc/visits">Visitas</a></li>
        <li><a href="../operadorDoc/reports">Reportes</a></li>
        <li><a href="../operadorDoc/accessRequest">Solicitud de Acceso</a></li>
    </ul>
</nav>
<section>
    <h3 class="title">Modificación de Usuario</h3>
    <form id="formModifyUser" action="#" method="post">
        <div class="item_rutUsuario">
            <label for="rutUsuario" class="block">Rut de Usuario</label>
            <input type="text" id="rutUsuario" placeholder="12.345.678-9" required/>
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
                <label for="fechaInicio" class="block">Inicio</label>

            </div>
            <div class="dateFin inlineBlock">
                <label for="fechaTermino" class="block">Fin</label>

            </div>
        </div>
    </form>
</section>