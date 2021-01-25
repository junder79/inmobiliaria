<?php
  if ($_SESSION['tipo_usuario'] !== "1") {
    echo  '<script>
            window.location="inicio"
          </script>';
  } else {
    require_once('APP/funciones.php');
    $ObjetoFunciones = new Funciones();
    $getAllUsers = $ObjetoFunciones->getAllUsuarios();
  }
?>
<div class="main-content">
  <div class="container">
  <div id="mensaje"></div>
    <center>
      <h1 style="font-family: 'Lexend Deca', sans-serif;">Usuarios</h1>
    </center>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#btnAgregarUsuario">
      Agregar Usuario<i class="ml-2 fas fa-plus-circle"></i>
    </button>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead style="background-color: #62757f;color:white;font-size: 13px;">
          <tr>
            <th scope="col">ID Usuario</th>
            <th scope="col">Tipo Usuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo Usuario</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($filas = mysqli_fetch_array($getAllUsers)) { ?>
            <tr>
              <th><?php echo $filas['idUsuario'] ?></th>
              <td><?php echo $filas['idTipoUsuario'] == 1 ? 'Administrador' : '-' ?></td>
              <td><?php echo $filas['nombre'] ?></td>
              <td><?php echo $filas['correo'] ?></td>
              <td class="text-center"><button type="button" class="btn btn-danger" id="<?php echo $filas['idUsuario'] ?>" onclick="eliminarUsuario(this);"><i class="fas fa-trash"></i></button></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>
    <!-- Modal Agregar Usuario -->
    <?php include_once('modalAgregarUsuario.php'); ?>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {

    $('#btn-agregar-usuario').click(function() {
      document.getElementById("mensaje").innerHTML = "";
      document.getElementById("mensaje_correo").innerHTML = "";
      document.getElementById("mensaje_password").innerHTML = "";
      document.getElementById("mensaje_nombre").innerHTML = "";
      document.getElementById("mensaje_idTipoUsuario").innerHTML = "";

      var datos = $('#form-agregar-usuario').serialize();

      $.ajax({
        type: "POST",
        url: "APP/insertarUsuario.php",
        data: datos,
        success: function(data) {
          $("#mensaje").html(data);
        }
      });
      return false;
    });
  });
</script>
<script type="text/javascript">
  function eliminarUsuario(button) {
    var id_usuario = button.id;
    Swal.fire({
      title: "¿Deseas eliminar el Usuario?",
      text: '',
      type: 'warning',
    }).then(function (result) {
      if (true) {
        $.ajax({
          url: "APP/eliminarUsuario.php",
          method: "GET",
          data: {
            "id_usuario": id_usuario
          },
          success: function(response) {
            $('#mensaje').html(response);
          }
        });
        window.location = 'usuarios';
      }
    });
  }
</script>