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
                  <h2>Actualizar asignaci&oacute;n de Revisor</h2>
                </div>
              </div>
            </div>
            <!-- row -->
            <div class="row column1">
              <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                  <div class="full graph_head">
                    <div class="heading1 margin_0">
                      <h2>Datos de la asignaci&oacute;n <small>( Cambiar revisor )</small></h2>
                    </div>
                  </div>
                  <div class="full price_table padding_infor_info">
                    <div class="row">
                      <div class="col-lg-8" style="margin:auto">
                        <div class="table">
                          <?php
                            $result = $revisor->select_revisor_view_negocio();
                            if(count($result)){
                              foreach ($result as $rowr) {
                          ?>
                          <form class="frmAction" action="../function/revisorAsignarEditAjax.php" method="POST" data-form="update" enctype="multipart/form-data" autocomplete="off">
                            <input type="hidden" id="idrevisor" name="idrevisor" value="<?php echo $revisor->encryption($rowr['idrevisor']); ?>">
                            <div class="mb-3">
                              <label for="solicitud" class="form-label">N&uacute;mero de Solicitud</label>
                              <?php
                                $result = $solicitud->select_solicitud_pendiente_negocio();
                                foreach ($result as $rows) {
                                  if($rowr['idsolicitud'] == $rows['idsolicitud']) {
                              ?>
                              <textarea id="solicitud" class="form-control" rows="4" cols="50" readonly><?php echo $rows['numero'] . ' - ' . $rows['titulo']; ?></textarea>
                              <?php }} ?>
                            </div>
                            <div class="mb-3">
                              <label for="idusuario" class="form-label">Revisor</label>
                              <select id="idusuario" name="idusuario" class="form-control custom-select" required>
                                <option value="">-- SELECCIONE UN REVISOR --</option>
                                <?php
                                $result = $usuario->select_usuario_activo_negocio();
                                foreach ($result as $rowu) {
                                  if ($rowr['idusuario'] == $rowu['idusuario']) {
                                    echo '<option value="' . $usuario->encryption($rowu['idusuario']) . '" selected>' . $rowu['nombres'] . '</option>';
                                  } else{
                                    echo '<option value="' . $usuario->encryption($rowu['idusuario']) . '">' . $rowu['nombres'] . '</option>';
                                  }                                  
                                }
                                ?>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-success boton-slider"><i class="fa fa-check"></i> Asignar Revisor</button>
                            <a href="revisor-solicitud.php" class="btn btn-warning boton-slider"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
                          </form>
                          <div id="RespuestaForm"></div>
                          <?php }} else { ?>
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