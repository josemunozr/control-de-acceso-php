<hgroup>
    <h1>DC Access Control</h1>
</hgroup>
<div id="content">
    <form id="form" action="Control" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" placeholder="12.345.678-9" required/>
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" required/>
        <input type="submit" value="Login" />
    </form>
    <form id="formRememberPass" action="rememberPassword" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" placeholder="12.345.678-9" required/>
        <label for="pass">Correo</label>
        <input type="email" name="correo" required/>
        <input type="submit" value="Enviar" />
    </form>
    <figure id="img">
        <img src="<?= BASE_URL?>views/layout/css/images/banner.png" alt="DC Access Control">
    </figure>
    <p id="remember_pass"><a href="#">Recordar Password</a></p>
    <p id="atras"><a href="#">Atras</a></p>
</div>