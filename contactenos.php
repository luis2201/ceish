<?php include 'layouts/head.php'; ?>

<body id="page-top">
  <!-- Navigation-->
  <?php include 'layouts/nav.php'; ?>
  <!-- Masthead-->
  <header class="" style="position: relative;">
    <div class="row">
      <img src="assets/img/banner/contactenos.png" alt="">
    </div>
  </header>
  <hr class="hr-orange">
  <!-- Contenido -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="col-6" style="margin: auto;">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Cont&aacute;ctenos</h2>
          <h3 class="section-subheading text-muted">Complete el formulario con la informaci&oacute;n requerida</h3>
        </div>
        <form id="frmAction" action="function/mensajeInsertAjax.php" method="POST" data-form="insert" enctype="multipart/form-data" autocomplete="off">
          <div class="mb-3">
            <label for="titulo" class="form-label text-light">T&iacute;tulo del mensaje</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="nombres" class="form-label text-light">Nombres</label>
            <input type="text" id="nombres" name="nombres" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label text-light">Correo</label>
            <input type="email" id="correo" name="correo" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label text-light">Tel&eacute;fono</label>
            <input type="text" id="telefono" name="telefono" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="mensaje" class="form-label text-light">Mensaje</label>
            <textarea id="mensaje" name="mensaje" class="form-control" rows="3" cols="60" required></textarea>
          </div>
          <button type="submit" class="btn btn-success boton-slider">Enviar Solicitud</button>
        </form>
        <div id="RespuestaForm" class="text-light"></div>
      </div>
    </div>
  </section>


  <!-- Footer-->
  <?php include 'layouts/footer.php'; ?>
  <script src="function/solicitudSelect.js"></script>
</body>

</html>