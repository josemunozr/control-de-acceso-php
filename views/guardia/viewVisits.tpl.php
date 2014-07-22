<nav class="nav_guardia">
    <ul>
        <li><a href="../guardia">Inicio</a></li>
     </ul>
</nav>
<section id="visitasDelDia">
    <h3>Lista de Visitas del día</h3>

    <form id="formViewVisits" action="EstadoVisita" method="post">
        <table id="datosVisitas">
            <tr id="titleTable">
                <th>Rut</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Empresa</th>
                <th>Estado</th>
            </tr>
            <?php for($i=0; $i<count($listVisits); $i++):  ?>
                <tr>
                    <td><?= $listVisits[$i]['rutUsuario']; ?></td>
                    <td><?= $listVisits[$i]['nombre']; ?></td>
                    <td><?= $listVisits[$i]['apellido']; ?></td>
                    <td><?= $listVisits[$i]['nombreEmpresa']; ?></td>
                    <td ><input type="checkbox" name="rutUsuario[]" class="check" value="<?= $listVisits[$i]['rutUsuario']; ?>"/></td>
                </tr>
            <?php endfor; ?>

        </table>

            <input type="submit" value="Enviar" />

    </form>

</section>