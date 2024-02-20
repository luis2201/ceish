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
        <h2 class="section-heading text-uppercase">ANONIMIZACION DE DATOS</h2>
        <h3 class="section-subheading text-muted"> </h3>
      </div>
      <div class="card col-12" style="padding: 2em; margin: auto;">
      <div class="container">
        <iframe src="anonimizacion.php" style="width:100%; height:700px;" frameborder="0" ></iframe>      
    </div>
      </div>
    </div>
  </section>
  <!-- Footer-->
  <?php include 'layouts/footer.php' ?>
  <script src="function/solicitudInsert.js"></script>
  
  <?php 

?>
</body>

</html>