$(document).ready(function(){
    $('#btn-iniciar-sesion').click(function(){
        var datos= $('#inicio-sesion').serialize();

        $.ajax({
            type:"POST",
            url:"validaciones/validarLogin.php",
            data:datos,
            beforeSend: function() {
                $('#spinner-btn-iniciar-sesion').attr('style','display:block');
                $("#btn-iniciar-sesion").prop('disabled', true);
            },
            success:function(data){
                $('#spinner-btn-iniciar-sesion').attr('style','display:none');
                $("#btn-iniciar-sesion").prop('disabled', false);
                $("#mensaje").html(data); 
            }
        });
        return false;
    });
});