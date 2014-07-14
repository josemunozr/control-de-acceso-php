
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
        <div id="modified_type">
            <select name="modificacion" id="select_modifiedType">
                <option value="">Seleccione modo de modificación</option>
                <option value="Rut">Por Rut</option>
                <option value="NomApe">Por Nombre y Apellido</option>
            </select>
        </div>

        <div class="modified_rutUsuario">
            <label for="rutUsuario" class="block">Rut de Usuario</label>
            <input type="text" id="rutUsuario" placeholder="12.345.678-9" />
        </div>
        <div class="item_NomAppe">
            <label for="nombreUsuario" >Nombre</label>
            <input type="text" id="nombreUsuario" />
            <label for="apellidoUsuario" >Apellido</label>
            <input type="text" id="apellidoUsuario" />
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
            <div class="dateInicio inlineBlock" title="Inicio vigencia Perfil">
                <label for="calendar"  class="block">Inicio</label>
                <input type="text" title="Inicio vigencia Perfil" class="calendar" placeholder="Inicio vigencia Perfil" required/>
            </div>
            <div class="dateFin inlineBlock" title="Fin vigencia Perfil" >
                <label for="calendar" class="block">Fin</label>
                <input type="text" title="Fin vigencia Perfil" class="calendar" placeholder="Fin vigencia Perfil" required/>
            </div>
        </div>

            <input type="submit" value="Enviar" />

    </form>
</section>