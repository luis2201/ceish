<?php if (!isset($_GET['solicitud'])) header('Location: 404_error'); ?>
<!-- header import -->
<?php 

   ob_start();     
   session_start(['name' => 'COM']); 
   
   if(!isset($_SESSION['usuario_com'])){
    header('Location: login.php');
   } else{
    switch($_SESSION['tipo_com']){     
        case 'REVISOR':
          echo '<script>window.location = "../revisor";</script>';
          break;
    }

   }

   include 'layouts/header.php'; 

?>
<body class="inner_page project_page">
  <div class="full_container">
    <div class="inner_container">
      <!-- Sidebar  -->
      <?php include 'layouts/sidebar.php'; ?>
      <!-- end sidebar -->
      <!-- right content -->
      <div id="content">
        <!-- topbar -->
        <?php include 'layouts/topbar.php'; ?>
        <!-- end topbar -->
        <!-- dashboard inner -->
        <div class="midde_cont">
          <div class="container-fluid">
            <div class="row column_title">
              <div class="col-md-12">
                <div class="page_title">
                  <h2>Calificar Solicitud</h2>
                </div>
              </div>
            </div>
            <!-- row -->
            <div class="row column1">
              <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                  <div class="full graph_head">
                    <div class="heading1 margin_0">
                      <h2>Detalle de la Investigaci&oacute;n <small>( Actualizar estado )</small></h2>
                    </div>
                  </div>
                  <div class="full price_table padding_infor_info">
                    <div class="row">
                      <div class="col-lg-8" style="margin:auto">
                        <div class="table-responsive-sm">
                          <?php
                            $result = $solicitud->select_solicitud_view_negocio();
                            if(count($result)){
                              foreach ($result as $row) {
                          ?>
                          <form class="frmAction" action="../function/solicitudActualizarAjax.php" method="POST" data-form="insert" enctype="multipart/form-data" autocomplete="off">
                            <input type="hidden" id="idsolicitud" name="idsolicitud" value="<?php echo $solicitud->encryption($row['idsolicitud']); ?>">
                            <div class="mb-3">
                              <label for="tipoinvestigacion" class="form-label">Tipo de Investigaci&oacute;n</label>
                              <input type="text" id="tipoinvestigacion" name="tipoinvestigacion" class="form-control" value="<?php echo $row['tipoinvestigacion']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                              <label for="titulo" class="form-label">T&iacute;tulo de la Investigaci&oacute;n</label>
                              <textarea id="titulo" name="titulo" class="form-control" rows="3" cols="60" readonly><?php echo $row['titulo']; ?></textarea>
                            </div>
                            <div class="mb-3">
                              <label for="investigador" class="form-label">Investigador Principal</label>
                              <input type="text" id="investigador" name="investigador" class="form-control" value="<?php echo $row['investigador']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                              <label for="estado" class="form-label">Estado</label>
                              <select id="estado" name="estado" class="form-control" required>
                                <option value="">-- Seleccione una opci&oacute;n --</option>
                                <option value="APROBADO">APROBADO</option>
                                <option value="APROBADO CON CONDICIONES">APROBADO CON CONDICIONES</option>
                                <option value="NO APROBADO">NO APROBADO</option>
                                <option value="EXCENTOS DE APROBACION">EXCENTOS DE APROBACION</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="observaciones" class="form-label">Observaciones</label>
                              <textarea id="observaciones" name="observaciones" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success boton-slider"><i class="fa fa-check-circle"></i> Calificar Solicitud</button>
                            <a href="proyectos.php" class="btn btn-warning boton-slider"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
                          </form>
                          <div id="RespuestaForm" class=""></div>
                          <?php } }else { ?>
                            <h1>No existe resultado para la consulta realizada</h1>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end row -->
            </div>
            <!-- footer -->
            <?php include 'layouts/footer.php'; ?>
          </div>
          <!-- end dashboard inner -->
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  <?php include 'layouts/jquerys.php'; ?>
</body>

</html>
<?php 

  ob_end_flush();
  
?>