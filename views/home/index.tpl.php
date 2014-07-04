<h1 >DC Access Control</h1>
<div class="content">
    <form class="form" action="AccessControll" method="get">

        <div class="form_input">
            <input type="text" class="input" name="usu" placeholder="Usuario..."required/>
            <input type="password" class="input" name="pass" placeholder="Contraseña..." required/>
        </div>
        <div class="remember item_form">
            <p><a href="#">Recordar contraseña</a></p>
        </div>
        <input type="submit" class="item_form" value="Login"/>

        <br/><br/>
        <ul>
            <li><a href="administrador">Administrador</a></li>
            <li><a href="operadorDoc">Operador Doc</a></li>
            <li><a href="tecnico">Tecnico</a></li>
            <li><a href="guardia">Guardia</a></li>
        </ul>
    </form>