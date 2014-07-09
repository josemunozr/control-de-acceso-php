<hgroup>
    <h1>DC Access Control</h1>
</hgroup>
<div id="content">
    <form id="form" action="Control" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" required/>
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" required/>
        <input type="submit" value="login" />
    </form>
    <figure id="img">
        <img src="<?= BASE_URL?>views/layout/css/images/banner.png" alt="DC Access Control">
    </figure>
    <p id="remember_pass"><a href="#">Recordar Password</a></p>
</div>