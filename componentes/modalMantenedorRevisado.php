<!-- Modal -->
<div id="mensajeRevisado"></div>
<div class="modal fade" id="modalMantenedorRevisado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Inmueble</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-revisado">
          <input type="text" hidden class="form-control" name="idInmueble" id="idInmueble">
          <input type="text" name="opcion" hidden value="modificar">
          <div class="form-group">
            <label for="nombreInmueble">Inmueble</label>
            <input type="text" class="form-control" name="inmueble" id="nombreInmueble">
          </div>
          <div class="form-group">
            <label for="tipoInmueble">Tipo</label>
            <input type="text" class="form-control" name="tipoInmueble" id="tipoInmueble">
          </div>
          <div class="form-group">
            <label for="fechaCreacion">Fecha</label>
            <input type="date" class="form-control" name="fechaCreacion" id="fechaCreacion">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="btn-guardar" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#btn-guardar').click(function(e) {

    var form = $('#form-revisado').serialize();
    console.log(form);
    $.ajax({
      type: "POST",
      url: "APP/mantenedorInmuebles.php",
      data: form,
      success: function(response) {
        $('#mensajeRevisado').html(response);
        console.log(response);
      }
    });
  });
</script>