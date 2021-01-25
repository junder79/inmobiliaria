<?php

include_once('../APP/funciones.php');
$ObjetoFunciones = new Funciones();

$getInmuebles = $ObjetoFunciones->getInmueblesRevisados();

?>


<div class=" font-weight-light">
    <div class="table-responsive">
        <table class="table table-hover table-condensed" id="tabla_inmuebles">
            <thead style="background-color:#37474f; color:white;font-size: 13px;">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Inmueble</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody style="background-color:#f5f5f5">
                <?php

                while ($filas = mysqli_fetch_array($getInmuebles)) {  ?>
                    <tr class="shadow-sm bg-white rounded">
                        <td><?php echo $filas['idInmueble']; ?></td>
                        <td><?php echo $filas['nombre']; ?></td>
                        <td><?php echo $filas['tipo']; ?></td>
                        <td><?php echo $filas['fecha']; ?></td>
                        <td><?php echo $filas['hora']; ?></td>
                        <td><button type="button" class="button-info-icon btn-info btn btn-sm" data-toggle="modal" data-target="#detalle_inmuebles" id="<?php echo $value['idInmueble'] ?>" onclick="detallesInmuebles(this);"><i class="fas fa-info-circle"></i></button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $("#tabla_inmuebles").dataTable({
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla =(",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad",
                "excel": "Excel",
                "print": "Imprimir"
            }
        },
    });
</script>