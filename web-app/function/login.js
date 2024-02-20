$(function () {
  $(".frmAction").on("submit", function (e) {
    e.preventDefault();

    var form = $(this);
    var tipo = form.attr('data-form');
    var accion = form.attr('action');
    var metodo = form.attr('method');
    //var respuesta = form.children('#RespuestaForm');
    var msjError = "<script>alert('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
    var formdata = new FormData(this);

    var contentAlert;
    if (tipo == "login") {
      contentAlert = "Se procederá a validar la información del usuario en el sistema";
    } else if (tipo == "insert") {
      contentAlert = "Se procederá a guardar la información del registro en el sistema";
    } else if (tipo == "delete") {
      contentAlert = "Desea eliminar del sistema el registro seleccionado?";
    } else if (tipo == "update") {
      contentAlert = "Se procederá a actualizar la información del registro en el sistema";
    } else if (tipo == "estado") {
      contentAlert = "Desea cambiar el estado del registro seleccionado?";
    } else {
      contentAlert = "Quieres realizar la operación solicitada";
    }

    $.confirm({
      title: 'Información del Sistema',
      icon: 'fa  fa-info-circle',
      content: contentAlert,
      type: 'blue',
      theme: 'modern',
      buttons: {
        confirm: {
          text: 'Continuar',
          action: function () {
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
          }
        },
        cancel: {
          text: 'Cancelar',
          action: function () {

          }
        }
      }
    });
  });
});
