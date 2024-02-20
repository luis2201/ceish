$(function () {
  $("#frmAction").on("submit", function (e) {
    e.preventDefault();

    var fileInput = document.getElementById('doc1');
    var filePath = fileInput.value;

    // Allowing file type
    //var allowedExtensions = /(\.docx|\.doc|\.pdf)$/i;
    var allowedExtensions = /(\.pdf)$/i;

    if (!allowedExtensions.exec(filePath)) {
      $.alert({
        title   : 'Alerta del Sistema', 
        icon    : 'fas fa-exclamation-circle',
        content : 'El archivo seleccionado no es válido. Debe seleccionar un archivo PDF.',
        type    : 'orange',
        theme   : 'modern'
      });
      fileInput.value = '';
      return false;
    } else if (fileInput.size > 25) { // 2 MiB for bytes.
      $.alert({
        title   : 'Alerta del Sistema', 
        icon    : 'fas fa-exclamation-circle',
        content : 'Seleccione un archivo con un máximo de 25MB',
        type    : 'orange',
        theme   : 'modern'
      });
      fileInput.value = '';
      return;
    }
    else {    	
      var form = $(this);
      var tipo = form.attr('data-form');
      var accion = form.attr('action');
      var metodo = form.attr('method');
      var respuesta = form.children('.RespuestaForm');
      var msjError="<script>alert('Ocurrió un error inesperado. Por favor recargue la página','error');</script>";
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
        error: function() {
          $('#RespuestaForm').html(msjError);
        }
      });
    }
  });
});


function showInput()
{
  let tipoinvestigacion = $('input[name="tipoinvestigacion"]:checked').val();
  document.getElementById("etiqueta").innerHTML = tipoinvestigacion;

  var campos = document.getElementById("campos");
  campos.classList.remove("d-none");

  var opciones = document.getElementById("opciones");
  opciones.classList.add("d-none");
}