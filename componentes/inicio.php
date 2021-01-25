<?php


?>
<div class="main-content"">
<div class=" ml-4 mr-4 mb-4">
  <div class="d-flex justify-content-start mt-2">
    <h1 style="font-family: 'Lexend Deca', sans-serif;font-size:27px;">Inmuebles Revisados</h1>
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
      success: function(response) {
        $('#tablaInmueble').html(response);
        console.log("DATA" + response);
      }
    });
  }
</script>