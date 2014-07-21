
<h1>PAGINA REPORTE</h1>

<table>
    <tr>
        <th colspan="6">Datos Solicitante</th>
    </tr>
    <tr>

        <th>Numero</th>
        <th>Rut Solicitante</th>
        <th>Motivo</th>
        <th>fecha</th>
        <th>Hora Solicitud</th>
        <th>Estado Visita</th>
    </tr>
    <?php for($i=0;$i<count($listaDatosSolicitante);$i++){?>
        <tr>
            <td><?= $listaDatosSolicitante[$i]['num']?></td>
            <td><?= $listaDatosSolicitante[$i]['rut_Solicitante']?></td>
            <td><?= $listaDatosSolicitante[$i]['motivo']?></td>
            <td><?= $listaDatosSolicitante[$i]['fecha']?></td>
            <td><?= $listaDatosSolicitante[$i]['hora']?> hrs.</td>
            <td><?= $listaDatosSolicitante[$i]['estado_Visita']?></td>
        </tr>
    <?php }?>

</table>
<br/>

<table>
    <tr>
        <th colspan="6">Datos de Visitantes</th>
    </tr>
    <tr>
        <th>Numero</th>
        <th>Rut Usuario</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Estado Visita</th>
    </tr>
    <?php for($i=0;$i<count($listaDatosVisitantes);$i++){?>
        <tr>
            <td><?= $listaDatosVisitantes[$i]['numero']?></td>
            <td><?= $listaDatosVisitantes[$i]['Rut_Usuario']?></td>
            <td><?= $listaDatosVisitantes[$i]['nombre']?></td>
            <td><?= $listaDatosVisitantes[$i]['apellido']?></td>
            <td><?= $listaDatosVisitantes[$i]['estado_Visita']?></td>
        </tr>
    <?php }?>

</table>


