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
            <li><a href="../operadorDoc/reports">Reportes</a></li>
            <li><a href="#">Solicitud de Acceso</a></li>
        </ul>
    </nav>
    <section>
        <h3 class="title">Visita Data Center</h3>
        <form id="formAccessRequest" action="newVisits" method="post">

            <div class="item_rutEmpresa inlineBlock margin">
                <label for="rutEmpresa" class="block">Rut Empresa</label>
                <input type="text" id="rutEmpresa" name="rutEmpresa" required/>
            </div>
            <div class="item_calendar inlineBlock margin">
                <label for="date" class="block"	>Día Visita</label>
                <input type="text" id="fechaInicio" name="fechaVisita" class="calendar"  required/>

            </div>
            <div class="item_motivoVisita ">
                <label for="motivoVisita" class="block">Motivo Visita</label>
                <textarea name="motivoVisita" id="motivoVisita" ></textarea>
            </div>
            <div class="item_horaVisita">
                <label for="time" class="block">Hora Visita</label>
                <input type="time" id="time" name="horaVisita" required/>
            </div>
            <div class="visitanes">
                <h4>Visitantes</h4>

                <div class="item_Visitantes">
                    <label for="nombreUsuario">Nombre</label>
                    <label for="apellidoUsuario">Apellido</label>
                    <label for="rutUsuario">RUT</label>
                </div>
                <div class="item_inputVisitantes">
                    <input type="hidden" id="cantInput" value="2" name="cantInput"/>

                    <input type="text" class="nombreUsuario" name="nombreUsuario1" required/>
                    <input type="text" class="apellidoUsuario" name="apellidoUsuario1" required/>
                    <input type="text" class="rutUsuario" placeholder="12.345.678-9" name="rutUsuario1" required/>

                    <div class="item_addInput">
                        <input type="text" class="nombreUsuario" name="nombreUsuario2" required/>
                        <input type="text" class="apellidoUsuario" name="apellidoUsuario2" required/>
                        <input type="text" class="rutUsuario" placeholder="12.345.678-9" name="rutUsuario2" required/>
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
