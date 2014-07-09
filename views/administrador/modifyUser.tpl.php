<nav>
    <ul>
        <li><a href="../administrador">Inicio</a></li>
        <li>
            <a href="#">Usuarios</a>
            <ul>
                <li><a href="#">Modificar</a></li>
                <li><a href="../administrador/addUser">Agregar</a></li>
            </ul>
        </li>
        <li><a href="../administrador/reports">Reportes</a></li>
        <li><a href="../administrador/accessRequest">Solicitud de Acceso</a></li>
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
                <label for="calendar" class="block">Incio</label>
                <input type="text" title="Inicio vigencia Perfil" class="calendar" placeholder="Inicio vigencia Perfil" required/>
            </div>
            <div class="dateFin inlineBlock">
                <label for="calendar" class="block">Fin</label>
                <input type="text" title="Fin vigencia Perfil" class="calendar" placeholder="Fin vigencia Perfil" required/>
            </div>
        </div>


    </form>
</section>