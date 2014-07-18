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
        <li><a href="../administrador/reports">Reportes</a></li>
        <li><a href="#">Solicitud de Acceso</a></li>
    </ul>
</nav>
<section>
    <h3 class="title">Visita Data Center</h3>
    <form id="formAccessRequest" action="#" method="post">

        <div class="item_rutEmpresa inlineBlock margin">
            <label for="rutEmpresa" class="block">Rut Empresa</label>
            <input type="text" id="rutEmpresa" required/>
        </div>
        <div class="item_calendar inlineBlock margin" title="Seleccione el dia de Visita">
            <label for="date" class="block"	>Día Visita</label>
            <input type="text" id="fechaInicio" class="calendar"  required/>

        </div>
        <div class="item_motivoVisita ">
            <label for="motivoVisita" class="block">Motivo Visita</label>

            <textarea name="motivoVisita" id="motivoVisita"></textarea>
        </div>
        <div class="item_horaVisita">
            <label for="time" class="block">Hora Visita</label>
            <input type="time" id="time" required/>
        </div>
        <div class="visitanes">
            <h4>Visitantes</h4>

            <div class="item_Visitantes">
                <label for="nombreUsuario">Nombre</label>
                <label for="apellidoUsuario">Apellido</label>
                <label for="rutUsuario">RUT</label>
            </div>
            <div class="item_inputVisitantes">
                <input type="text" id="nombreUsuario" required/>
                <input type="text" id="apellidoUsuario" required/>
                <input type="text" id="rutUsuario" placeholder="12.345.678-9" required/>

                <div class="item_addInput">
                    <input type="text" id="nombreUsuario" required/>
                    <input type="text" id="apellidoUsuario" required/>
                    <input type="text" id="rutUsuario" placeholder="12.345.678-9" required/>
                </div>

            </div>
        </div>
        <div class="bottomAdd">
            <a href="#">Agregar Visita</a>
        </div>
        <input type="submit" value="Enviar">
        <div class="clearForm">
            <a href="#">Limpiar</a>
        </div>

    </form>
</section>