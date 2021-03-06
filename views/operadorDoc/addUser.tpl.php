<nav>
    <ul>
        <li><a href="../operadorDoc">Inicio</a></li>
        <li>
            <a href="#">Usuarios</a>
            <ul>
                <li><a href="../operadorDoc/modifyUser">Modificar</a></li>
                <li><a href="#">Agregar</a></li>
            </ul>
        </li>
        <li><a href="../operadorDoc/visits">Visitas</a></li>
        <li><a href="../operadorDoc/reports">Reportes</a></li>
        <li><a href="../operadorDoc/accessRequest">Solicitud de Acceso</a></li>
    </ul>
</nav>
<section id="addUser">
    <h3 class="title">Agregar Usuario</h3>
    <form id="formAddUser" action="newUser" method="post">
        <div class="datosUser">
            <div class="item_rutUsuario inlineBlock">
                <label for="rutUsuario" class="block">Rut Usuario</label>
                <input type="text" id="rutUsuario" name="rutUsuario" placeholder="12.345.678-9" required/>
            </div>
            <div class="item_nomUsuario inlineBlock">
                <label for="nombreUsuario" class="block">Nombre</label>
                <input type="text" id="nombreUsuario" name="nombreUsuario" required/>
            </div>
            <div class="item_apellidoUsuario inlineBlock">
                <label for="apellidoUsuario" class="block">Apellido</label>
                <input type="text" class="apellidoUsuario" name="apellidoUsuario" required/>
            </div>
            <label for="correoUsuario" class="block">Correo</label>
            <input type="text" class="correoUsuario" name="correoUsuario" required/>
        </div>
        <div class="datosEmpresa">
            <div class="typePerfil">
                <label for="tipoPerfil" class="block ">Tipo de Perfil</label>
                <select name="tipoPerfil" id="tipoPerfil">
                    <option SELECTED>Seleccione un perfil</option>
                    <option value="2">Administrador</option>
                    <option value="1">Operador Doc</option>
                    <option value="3">Técnico</option>
                </select>
            </div>
            <div class="item_nomEmpresa inlineBlock">
                <label for="empresa" class="block">Empresa</label>
                <input type="text" id="empresa" name="nombreEmpresa" placeholder="Ingrese Rut Empresa" required/>
            </div>
            <div class="passUser inlineBlock">
                <label for="passUser" class="block">Contraseña</label>
                <input type="text" id="passUser"  name="passUsuario" required/>
            </div>
        </div>


      <div class="inicioFin">
            <div class="dateInicio inlineBlock" title="Inicio vigencia Perfil">
                <label for="calendar"  class="block">Inicio</label>
                <input type="text" title="Inicio vigencia Perfil" class="calendar" name="fechaInicio" placeholder="Inicio vigencia Perfil" required/>
            </div>
            <div class="dateFin inlineBlock" title="Fin vigencia Perfil" >
                <label for="calendar" class="block">Fin</label>
                <input type="text" title="Fin vigencia Perfil" class="calendar" name="fechaFin" placeholder="Fin vigencia Perfil" required/>
            </div>
        </div>

        <input type="submit" value="Enviar" />
        <div id="msg"
        <?php if($_GET["estado"] == "true"){?>
            <span style="display: block">Datos guardados correctamente</span>
        <?php }else{?>
            <span style="display: block">Rut ingresado ya se encuentra en sistema</span>

        <?php }?>

        </div>

    </form>
</section>