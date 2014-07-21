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
        <li><a href="../operadorDoc/accessRequest">Solicitud de Acceso</a></li>
    </ul>
</nav>
<section id="visits">
    <h3>Lista de Visitas Realizadas</h3>
    <table id="datosVisitas">
        <tr id="titleTable">
            <th>Rut</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Empresa</th>
        </tr>
        <?php for($i=0; $i<count($listVisits); $i++):  ?>
            <tr>
                <td><?= $listVisits[$i]['rutUsuario']; ?></td>
                <td><?= $listVisits[$i]['nombre']; ?></td>
                <td><?= $listVisits[$i]['apellido']; ?></td>
                <td><?= $listVisits[$i]['nombreEmpresa']; ?></td>
            </tr>
        <?php endfor; ?>
    </table>

</section>