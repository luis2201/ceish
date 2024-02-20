<?php include 'layouts/head.php'; ?>
<body id="page-top">
  <!-- Navigation-->
  <?php include 'layouts/nav.php'; ?>
  <!-- Masthead-->
  <header class="" style="position: relative;">
    <div class="row">
      <img src="assets/img/banner/teams.png" alt="">
    </div>
  </header>
  <hr class="hr-orange">
  <!-- Contenido -->
  <section class="page-section bg-light" id="team" style="padding: 50px;">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Consultar estado de Solicitud</h2>
        <h3 class="section-subheading text-muted">Ingrese el n&uacute;mero de su solicitud.</h3>
      </div>
      <div class="card col-8" style="padding: 2em; margin: auto;">
        <form id="frmAction" action="http://localhost/function/solicitudSelectAjax.php" method="POST" data-form="select" enctype="multipart/form-data" autocomplete="off">
          <div class="mb-3">
            <label for="numerosolicitud" class="form-label">N&uacute;mero de Solicitud</label>
            <input type="text" id="numerosolicitud" name="numerosolicitud" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-success boton-slider">Realizar consulta</button>
        </form>
        <div id="RespuestaForm" class=""></div>
      </div>
    </div>
  </section>
  <!-- Footer-->
  <?php include 'layouts/footer.php' ?>
  <script src="function/solicitudSelect.js"></script>
</body>

</html>