$(document).ready(function () {
  $('#tbLista').DataTable({
    language: {
      processing: "Procesando informaci&oacute;n",
      search: "Buscar:",
      lengthMenu: "Mostrando _MENU_ elementos",
      info: "Mostrando _START_ a _END_ de _TOTAL_ elementos",
      infoEmpty: "Visualizaci&oacute;n del elemento 0 a 0 en 0 elementos",
      infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
      infoPostFix: "",
      loadingRecords: "Carga en curso...",
      zeroRecords: "No hay elementos para mostrar",
      emptyTable: "No existe informaci&oacute;n disponible para mostrar",
      paginate: {
        first: "Primero",
        previous: "Anterior",
        next: "Siguiente",
        last: "&Uacute;ltimo"
      },
    },
  });
});

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

function buscarSelect() {
  // creamos un variable que hace referencia al select
  var select = document.getElementById("idsolicitud");
  select.selectedIndex = 0;
  // obtenemos el valor a buscar
  var cadena = document.getElementById("buscar").value;
  if (cadena.length > 0) {
    var numero = cadena.split(" - ");
    var buscar = numero[0];

    // recorremos todos los valores del select
    for (var i = 0; i < select.length; i++) {
      cadena = select.options[i].text;
      numero = cadena.split(" - ");

      if (numero[0] == buscar) {
        // seleccionamos el valor que coincide
        select.selectedIndex = i;
      }
    }
    if (select.selectedIndex < 1) {
      $.alert({
        title: 'Información del sistema',
        icon: 'fa fa-information-circle',
        content: 'El número de solicitud no existe',
        type: 'orange',
        theme: 'modern',
      });
    }
  } else {
    $.alert({
      title: 'Información del sistema',
      icon: 'fa fa-information-circle',
      content: 'Debe ingresar un número de solicitud para realizar la búsqueda',
      type: 'orange',
      theme: 'modern',
    });
  }
}

function validarImagen() {
  var fileInput = document.getElementById('informe');
  var filePath = fileInput.value;

  // Allowing file type
  var allowedExtensions = /(\.pdf)$/i;

  if (allowedExtensions.exec(filePath)) {
    return true;
  } else {
    return false;
  }
}

function eliminar(numerosolicitud)
{    
  $.confirm({
    title: 'Información del Sistema',
    icon: 'fa  fa-info-circle',
    content: 'Está seguro de eliminar la solicitud? Si continúa no se podrán deshacer los cambios',
    type: 'blue',
    theme: 'modern',
    buttons: {
      confirm: {
        text: 'Continuar',
        action: function () {
          $.ajax({
            type: 'POST',
            url: '../function/solicitudDeleteAjax.php',
            data: { numerosolicitud : numerosolicitud },
            cache: false,            
            processData: true,
            success: function (data) {
              const filaAEliminar = document.getElementById(numerosolicitud);
              if (filaAEliminar) {
                filaAEliminar.remove(); // Eliminar la fila
              }

              $('#RespuestaForm').html(data);	
            },
            error: function (error) {
              console.log(error);
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
}