<?php 
include 'layouts/head.php'; 

?>

<body id="page-top">
  <!-- Navigation-->
  <?php include 'layouts/nav.php'; ?>
  <!-- Masthead-->
  <header class="" style="position: relative;">
    <div class="row">
      <img src="assets/img/banner/solicitud.png" alt="">
    </div>
  </header>
  <hr class="hr-orange">
  <!-- Contenido -->
  <section class="page-section bg-light" id="team" style="padding: 50px;">
    <div class="container">
      <div class="text-center">
        <h4>Postulación Consultores Externos</h4>
        <h5 class="section-heading text-uppercase">Registrar Solicitud</h5>
        <h5 class="section-subheading text-muted">Debe llenar todos los campos para poder enviar su solicitud</h5>
      </div>
      <div class="card col-8" style="padding: 2em; margin: auto;">
        <form id="frmAction" action="function/rconsultorInsertAjax.php" method="POST" data-form="insert" enctype="multipart/form-data" autocomplete="off">
          <div id="campos" class="mb-3">
            <div class="mb-3">
              <label id="etiqueta" class="form-label h6"></label>
            </div>
            <div class="mb-3">
              <label for="nombres" class="form-label">Apellidos y Nombres</label>
              <input type="text" id="nombres" name="nombres" class="form-control" maxlength="50" required></input>
            </div>
            <div class="mb-3">
              <label for="especializacion" class="form-label">Especializaci&oacute;n M&eacute;dica</label>
              <input type="text" id="especializacion" name="especializacion" class="form-control" maxlength="50" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Correo Electr&eacute;nico</label>
              <input type="email" id="email" name="email" class="form-control" maxlength="50" required>
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Tel&eacute;fono</label>
              <input type="text" id="telefono" name="telefono" class="form-control" maxlength="10" required>
            </div>
            <div class="mb-3">
              <label for="hojavida" class="form-label">Hoja de Vida (Formato PDF)</label>
              <input type="file" id="hojavida" name="hojavida" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-3">
              <label for="cartainteres" class="form-label">Carta de Conflicto de Intereses (<a href="assets/anexos/Anexo39.docx">Anexo 39</a>)</label>
              <input type="file" id="cartainteres" name="cartainteres" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Foto actualizada (Formato PNG, JPG, JPEG M&aacute;x. 2MB)</label>
              <input type="file" id="foto" name="foto" class="form-control" accept=".png, .jpg, .jpeg" required>
            </div>
            <button type="submit" class="btn btn-success boton-slider">Enviar Solicitud</button>
          </div>
        </form>
        <div id="RespuestaForm" class=""></div>
      </div>
    </div>
  </section>
  <!-- Footer-->
  <?php include 'layouts/footer.php' ?>
  <script src="function/rconsultor-externo.js?v=1.0.2"></script>
  <script type="text/javascript">
    
  </script>
  <?php 

?>
</body>

</html>