<?php include 'layouts/head.php'; ?>
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
        <h2 class="section-heading text-uppercase">Registrar Solicitud</h2>
        <h3 class="section-subheading text-muted">Debe llenar todos los campos para poder enviar su solicitud.</h3>
      </div>
      <div class="card col-8" style="padding: 2em; margin: auto;">
        <form id="frmAction" action="function/solicitudInsertAjax.php" method="POST" data-form="insert" enctype="multipart/form-data" autocomplete="off">
          <div class="mb-3">
            <label for="tipoinvestigacion" class="form-label">Tipo de Investigaci&oacute;n</label>
            <select id="tipoinvestigacion" name="tipoinvestigacion" class="form-select" required>
              <option value="">-- Seleccione el tipo de investigaci&oacute;n --</option>
              <option value="ENSAYO CLINICO">Ensayo Cl&iacute;nico</option>
              <option value="ESTUDIOS OBERSERVACIONALES">Estudios Observacionales</option>
              <option value="INVESTIGACIONES DE RIESGO MINIMO">Investigaciones de Riesgo M&iacute;nimo</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="titulo" class="form-label">T&iacute;tulo de la Investigaci&oacute;n</label>
            <textarea id="titulo" name="titulo" class="form-control" rows="3" cols="60" required></textarea>
          </div>
          <div class="mb-3">
            <label for="investigador" class="form-label">Investigador Principal</label>
            <input type="text" id="investigador" name="investigador" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Tel&eacute;fono</label>
            <input type="text" id="telefono" name="telefono" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="documentos" class="form-label">Documentos</label>
            <input type="file" id="documentos" name="documentos" class="form-control" accept=".zip,.rar,.7zip" required>
          </div>
          <div class="mb-3">
            <label for="formapago" class="form-label">Forma de Pago</label>
            <select id="formapago" name="formapago" class="form-select" required>
              <option value="">-- Seleccione Forma de Pago --</option>
              <option value="TRANSFERENCIA">Transferencia</option>
              <option value="PAYPAL">PayPal</option>
              <option value="FORMA PARTE DEL ITSUP">Forma parte del ITSUP</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success boton-slider">Enviar Solicitud</button>
        </form>
        <div id="RespuestaForm" class=""></div>
      </div>
    </div>
  </section>
  <!-- Footer-->
  <?php include 'layouts/footer.php' ?>
  <script src="function/solicitudInsert.js"></script>
</body>

</html>