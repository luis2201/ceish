$(function () {
  $("#frmAction").on("submit", function (e) {
    e.preventDefault();

    var form = $(this);
    var tipo = form.attr('data-form');
    var accion = form.attr('action');
    var metodo = form.attr('method');
    var respuesta = form.children('.RespuestaForm');
    var msjError = "<script>alert('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
    var formdata = new FormData(this);

    $.ajax({
      type: metodo,
      url: accion,
      data: formdata ? formdata : form.serialize(),
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $('#RespuestaForm').html(data);
      },
      error: function () {
        $('#RespuestaForm').html(msjError);
      }
    });
    
  });
});