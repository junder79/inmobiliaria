<?php


?>
<div class="main-content"">
<div class=" ml-4 mr-4 mb-4">
  <div class="d-flex justify-content-start mt-2">
    <h1 style="font-family: 'Lexend Deca', sans-serif;font-size:27px;">Combustible</h1>
  </div>
</div>
<div class=" container">

  <div id="listaCombustible"></div>

</div>
</div>

<script>
  $(document).ready(function() {
    getCombustible();
   
  });

  function getCombustible() {
    $.ajax({
      type: "POST",
      url: "componentes/listarCombustible.php",
      success: function(response) {
        $('#listaCombustible').html(response);
      
      }
    });
  }
</script>