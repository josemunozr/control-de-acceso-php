<nav>
    <ul>
        <li><a href="../administrador">Inicio</a></li>
        <li>
            <a href="#">Usuarios</a>
            <ul>
                <li><a href="../administrador/modifyUser">Modificar</a></li>
                <li><a href="#">Agregar</a></li>
            </ul>
        </li>
        <li><a href="../administrador/reports">Reportes</a></li>
        <li><a href="../administrador/accessRequest">Solicitud de Acceso</a></li>
    </ul>
</nav>
<section>
    <h3 class="title">Agregar Usuario</h3>
    <form id="formAddUser" action="#" method="post">
        <div class="datosUser">
            <div class="item_rutUsuario inlineBlock">
                <label for="rutUsuario" class="block">Rut Usuario</label>
                <input type="text" id="rutUsuario"placeholder="12.345.678-9" required/>
            </div>
            <div class="item_nomUsuario inlineBlock">
                <label for="nombreUsuario" class="block">Nombre</label>
                <input type="text" id="nombreUsuario" required/>
            </div>
            <div class="item_apellidoUsuario inlineBlock">
                <label for="apellidoUsuario" class="block">Apellido</label>
                <input type="text" class="apellidoUsuario" required/>
            </div>
        </div>
        <div class="datosEmpresa">
            <div class="typePerfil">
                <label for="tipoPerfil" class="block ">Tipo de Perfil</label>
                <select name="tipoPerfil" id="tipoPerfil">
                    <option value="">Seleccione un perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Administrador">Operador Doc</option>
                    <option value="Administrador">Técnico</option>
                </select>
            </div>
            <div class="item_nomEmpresa inlineBlock">
                <label for="empresa" class="block">Empresa</label>
                <input type="text" id="empresa" required/>
            </div>
            <div class="passUser inlineBlock">
                <label for="passUser" class="block">Contraseña</label>
                <input type="text" id="passUser" required/>
            </div>
        </div>
        <div class="inicioFin">
            <div class="dateInicio inlineBlock">
                <label for="fechaInicio" class="block">Incio</label>
                <input type="text" id="fechaInicio" class="calendar" title="Inicio vigencia perfil" placeholder="Inicio vigencia perfil" required/>
            </div>
            <div class="dateFin inlineBlock">
                <label for="fechaTermino" class="block">Fin</label>
                <input type="text" id="fechaTermino" class="calendar" title="Fin vigencia perfil" placeholder="Fin vigencia perfil" required/>
            </div>
        </div>
        <div class="buttonSubmit">
            <input type="submit" value="Enviar" />
        </div>
    </form>
</section>