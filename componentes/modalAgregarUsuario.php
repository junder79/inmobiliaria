<div class="modal fade" id="btnAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="btnAgregarUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="btnAgregarUsuarioLabel">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="mensaje"></div>
        <form id="form-agregar-usuario">
          <form>
            <div class="form-row">
              <div class="col">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" class="form-control" name="correo" placeholder="Correo">
                <div id="mensaje_correo" style="color:red"></div>
              </div>
              <div class="col">
                <label for="password-generada">Contraseña:</label>
                <input type="" readonly class="form-control" id="password-generada" name="password" placeholder="Contraseña">
                <div id="mensaje_password" style="color:red"></div>
              </div>
            </div>
            <div class="form-row mt-2">
              <div class="col">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre">
                <div id="mensaje_nombre" style="color:red"></div>
              </div>
              <div class="col">
                <label for="idTipoUsuario">Tipo Usuario:</label>
                <input type="text" class="form-control" id="idTipoUsuario" name="idTipoUsuario" placeholder="Tipo Usuario">
                <div id="mensaje_idTipoUsuario" style="color:red"></div>
              </div>
            </div>
            <div class="row">
              <div class="col mt-2">
                <div class="text-center"> <button type="button" id="btn-agregar-usuario" class="btn btn-primary">Agregar</button></div>
              </div>
            </div>
          </form>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script>
  function generatePassword() {
    var length = 8,
      charset = "abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*",
      result = "";

      for (var i = 0, n = charset.length; i < length; ++i) {
        result += charset.charAt(Math.floor(Math.random() * n));
      }

    return result;
  }

  function getNewPassword() {
    $('#password-generada').val(generatePassword());
  }

  $(document).ready(function() {
    getNewPassword();

    $('#generar-password').click(function() {
      getNewPassword();
      $(this).val('#password-generada');
      return false;
    });
  });
</script>