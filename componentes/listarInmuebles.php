<?php

include_once('../APP/funciones.php');
$ObjetoFunciones = new Funciones();

$getInmuebles = $ObjetoFunciones->getInmueblesRevisados();

include_once('modalMantenedorRevisado.php');

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
                    <th width="5%" scope="col">Informe</th>
                    <th width="5%" scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody style="background-color:#f5f5f5">
                <?php

                while ($filas = mysqli_fetch_array($getInmuebles)) {  ?>
                    <tr class="shadow-sm bg-white rounded">
                        <td><?php echo $filas['idInmueble']; ?></td>
                        <td><?php echo $filas['nombre']; ?></td>
                        <td><?php echo $filas['tipo']; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($filas['fecha'])); ?></td>
                        <td><?php echo $filas['hora']; ?></td>
                        <td>
                            <?php if ($filas['tienePdf']) { ?>

                                <!-- <a target="_blank" href="http://grupohexxa.cl/inmobiliariaAPP/tcpdf/examples/informe.php?idInmueble=<?php echo $filas['idInmueble'] ?>"> -->
                                <a target="_blank" href="http://grupohexxa.cl/inmobiliariaAPP/tcpdf/examples/output/<?php echo $filas['idInmueble'] . "_" . $filas['nombre'] . ".pdf" ?>">
                                    <button type="button" class="btn-danger btn btn-sm" id="<?php echo $filas['idInmueble'] ?>"><i class="fas fa-file-pdf"></i>
                                    </button>
                                </a>
                            <?php } else { ?>
                                <button type="button" class="btn-warning btn btn-sm generarPdf" id-inmueble="<?php echo $filas['idInmueble'] ?>"><i class="fas fa-file-upload"></i></button>
                            <?php } ?>
                        </td>
                        <td>
                            <button type="button" data-inmueble="<?php echo $filas['nombre'] ?>" data-tipo="<?php echo $filas['tipo'] ?>" data-fecha="<?php echo $filas['fecha'] ?>" class="btn-warning btn btn-sm" data-toggle="modal" data-target="#modalMantenedorRevisado" id="<?php echo $filas['idInmueble'] ?>" onclick="modificarInmueble(this);"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn-dark btn btn-sm" id="<?php echo $filas['idInmueble'] ?>" onclick="eliminarRevisado(this);"><i style="color:white" class="fas fa-trash-alt"></i></button>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.generarPdf').click(function() {

        const idInmueble = $(this).attr('id-inmueble');

        $.ajax({
            url: "https://grupohexxa.cl/inmobiliariaAPP/tcpdf/examples/generateImage.php",
            method: "POST",
            data: {
                "idInmueble": idInmueble
            },
            beforeSend: function() {
                $('.generarPdf').attr('disabled', true);
                Swal.fire({
                    title: 'Generando PDF',
                    html: 'Esto puede tardar unos minutos',
                    //allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                })
            },
            success: function(response) {
                $('.generarPdf').remove('disabled');
                $('#mensajeRevisado').html(response);

            }
        });

        // Swal.fire({
        //     title: 'Generando PDF',
        //     html: 'Esto puede tardar unos minutos',
        //     //allowOutsideClick: false,
        //     didOpen: () => {
        //         Swal.showLoading()
        //     }
        // }).then((result) => {
        /* Read more about handling dismissals below */
        // if (result.dismiss === Swal.DismissReason.timer) {
        //     console.log('I was closed by the timer')
        // }
        //     })
    })


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
        order: [
            [0, 'desc']
        ],
    });

    function modificarInmueble(button) {
        var nombre = button.getAttribute('data-inmueble');
        var tipo = button.getAttribute('data-tipo');
        var fecha = button.getAttribute('data-fecha');
        var idInmueble = button.getAttribute('id');
        console.log("ID " + idInmueble);
        $('#nombreInmueble').val(nombre);
        $('#tipoInmueble').val(tipo);
        $('#fechaCreacion').val(fecha);
        $('#idInmueble').val(idInmueble);
    }

    function eliminarRevisado(button) {
        Swal.fire({
            title: '¿Deseas eliminar el revizado de este inmueble?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar'
        }).then((result) => {
            if (result.isConfirmed) {

                var idInmueble = button.getAttribute('id');
                var opcion = "eliminar";

                console.log("Eliminar" + idInmueble);
                $.ajax({
                    url: "APP/mantenedorInmuebles.php",
                    method: "POST",
                    data: {
                        "idInmueble": idInmueble,
                        "opcion": opcion
                    },
                    success: function(response) {
                        $('#mensajeRevisado').html(response);
                        console.log(response);
                    }
                });
            }
        })


    }
</script>