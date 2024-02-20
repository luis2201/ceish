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
                  <h2>Asignar Revisor</h2>
                </div>
              </div>
            </div>
            <!-- row -->
            <div class="row column1">
              <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                  <div class="full graph_head">
                    <div class="heading1 margin_0">
                      <h2>Nuevo registro <small>( Asignar revisor a proyecto )</small></h2>
                    </div>
                  </div>
                  <div class="full price_table padding_infor_info">
                    <div class="row">
                      <div class="col-lg-8" style="margin:auto">
                        <div class="table">
                          <form class="frmAction" action="../function/revisorAsignarAjax.php" method="POST" data-form="insert" enctype="multipart/form-data" autocomplete="off">
                            <div class="mb-3">
                              <label for="idusuario" class="form-label">Revisor</label>
                              <select id="idusuario" name="idusuario" class="form-control custom-select" required>
                                <option value="">-- SELECCIONE UN REVISOR --</option>
                                <?php
                                $result = $usuario->select_usuario_activo_negocio();
                                foreach ($result as $row) {
                                  echo '<option value="' . $usuario->encryption($row['idusuario']) . '">' . $row['nombres'] . '</option>';
                                }
                                ?>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="solicitud" class="form-label">N&uacute;mero de Solicitud</label>
                              <div class="row">
                                <div class="col-10">
                                  <input type="text" id="buscar" class="form-control">
                                </div>
                                <div class="col-2">
                                  <button type="button" class="btn btn-info btn-block" onclick="buscarSelect()">Buscar</button>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mt-3">
                                  <select id="idsolicitud" name="idsolicitud" class="form-control custom-select" required>
                                    <option value="">-- SELECCIONE UNA SOLICITUD DE LA LISTA --</option>
                                    <?php
                                    $result = $solicitud->select_solicitud_pendiente_negocio();
                                    foreach ($result as $row) {
                                      echo '<option value="' . $solicitud->encryption($row['idsolicitud']) . '">' . $row['numero'] . ' - ' . $row['titulo'] . '</option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-success boton-slider"><i class="fa fa-check"></i> Asignar Revisor</button>
                            <a href="revisor-solicitud.php" class="btn btn-warning boton-slider"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
                          </form>
                          <div id="RespuestaForm"></div>
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