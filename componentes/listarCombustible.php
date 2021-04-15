<?php

include_once('../APP/funciones.php');
$ObjetoFunciones = new Funciones();

$getCombustible = $ObjetoFunciones->getCombustible();

// include_once('modalMantenedorRevisado.php');

?>


<div class=" font-weight-light">
    <div class="table-responsive">
        <table class="table table-hover table-condensed" id="listaCombustibles">
            <thead style="background-color:#37474f; color:white;font-size: 13px;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fecha Carga</th>
                    <th scope="col">Obra</th>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Conductor</th>
                    <th scope="col">KM/HO</th>
                    <th scope="col">Litros</th>
                    <th width="5%" scope="col">Acción</th>
                    <th width="5%" scope="col">Acción</th>

                </tr>
            </thead>
            <tbody style="background-color:#f5f5f5">
                <?php

                while ($filas = mysqli_fetch_array($getCombustible)) {  ?>
                    <tr class="shadow-sm bg-white rounded">
                        <td><?php echo $filas['id_combustible']; ?></td>
                        <td><?php echo $filas['fecha_carga']; ?></td>
                        <td><?php echo $filas['nombre_obra']; ?></td>
                        <td><?php echo $filas['vehiculo']; ?></td>
                        <td><?php echo $filas['nombreConductor']; ?></td>
                        <td><?php echo $filas['kilometraje']; ?></td>
                        <td><?php echo $filas['cantidad_litros']; ?></td>
                        <td><button type="button" data-inmueble="<?php echo $filas['nombre'] ?>" data-tipo="<?php echo $filas['tipo'] ?>" data-fecha="<?php echo $filas['fecha'] ?>" class="btn-warning btn btn-sm" data-toggle="modal" data-target="#modalMantenedorRevisado" id="<?php echo $filas['idInmueble'] ?>" onclick="modificarInmueble(this);"><i class="fas fa-edit"></i></button></td>
                        <td><button type="button" class="btn-dark btn btn-sm" id="<?php echo $filas['idInmueble'] ?>" onclick="eliminarRevisado(this);"><i style="color:white" class="fas fa-trash-alt"></i></button></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $("#listaCombustibles").dataTable({
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
        "order": [[ 1, "desc" ]]
    });

    // function modificarInmueble(button) {
    //     var nombre = button.getAttribute('data-inmueble');
    //     var tipo = button.getAttribute('data-tipo');
    //     var fecha = button.getAttribute('data-fecha');
    //     var idInmueble = button.getAttribute('id');
    //     console.log("ID " + idInmueble);
    //     $('#nombreInmueble').val(nombre);
    //     $('#tipoInmueble').val(tipo);
    //     $('#fechaCreacion').val(fecha);
    //     $('#idInmueble').val(idInmueble);
    // }

    // function eliminarRevisado(button) {
    //     Swal.fire({
    //         title: '¿Deseas eliminar el revizado de este inmueble?',
    //         text: "",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Eliminar'
    //     }).then((result) => {
    //         if (result.isConfirmed) {

    //             var idInmueble = button.getAttribute('id');
    //             var opcion = "eliminar";

    //             console.log("Eliminar" + idInmueble);
    //             $.ajax({
    //                 url: "APP/mantenedorInmuebles.php",
    //                 method: "POST",
    //                 data: {
    //                     "idInmueble": idInmueble,
    //                     "opcion": opcion
    //                 },
    //                 success: function(response) {
    //                     $('#mensajeRevisado').html(response);
    //                     console.log(response);
    //                 }
    //             });
    //         }
    //     })


    // }
</script>