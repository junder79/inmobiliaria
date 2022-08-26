<?php


?>
<div class="main-content"">
<div class=" ml-4 mr-4 mb-4">
  <div class="d-flex justify-content-start mt-2">
    <h1 style="font-family: 'Lexend Deca', sans-serif;font-size:27px;">Inmuebles Revisados</h1>
  </div>

  <div class="d-flex justify-content-center">
    <div style="display: none;" id="spinner_inmuebles" class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</div>
<div class=" container">

  <div id="tablaInmueble"></div>

</div>
</div>

<script>
  $(document).ready(function() {
    getInmuebles();
    console.log("Listo");
  });

  function getInmuebles() {
    $.ajax({
      type: "POST",
      url: "componentes/listarInmuebles.php",
      beforeSend: function(){
        $('#spinner_inmuebles').show();
      },
      success: function(response) {
        $('#spinner_inmuebles').hide();
        $('#tablaInmueble').html(response);
        // console.log("DATA" + response);
      }
    });
  }
</script>