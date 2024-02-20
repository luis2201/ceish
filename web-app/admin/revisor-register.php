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
                  <h2>Registrar Revisor</h2>
                </div>
              </div>
            </div>
            <!-- row -->
            <div class="row column1">
              <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                  <div class="full graph_head">
                    <div class="heading1 margin_0">
                      <h2>Nuevo registro <small>( Datos del revisor )</small></h2>
                    </div>
                  </div>
                  <div class="full price_table padding_infor_info">
                    <div class="row">
                      <div class="col-lg-8" style="margin:auto">
                        <div class="table-responsive-sm">
                          <form class="frmAction" action="../function/revisorRegistrarAjax.php" method="POST" data-form="insert" enctype="multipart/form-data" autocomplete="off">
                            <div class="mb-3">
                              <label for="nombres" class="form-label">Nombres y Apellidos</label>
                              <input type="text" id="nombres" name="nombres" class="form-control" required>
                            </div>
                            <div class="mb-3">
                              <label for="correo" class="form-label">Correo</label>
                              <input type="mail" id="correo" name="correo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                              <label for="telefono" class="form-label">Tel&eacute;fono</label>
                              <input type="text" id="telefono" name="telefono" class="form-control" required>
                            </div>
                            <div class="mb-3">
                              <label for="usuario" class="form-label">Nombre de Usuario</label>
                              <input type="text" id="usuario" name="usuario" class="form-control" required>
                            </div>
                            <div class="mb-3">
                              <label for="tipousuario" class="form-label">Tipo de Usuario</label>
                              <select id="tipousuario" name="tipousuario" class="form-control" required>
                                <option value="REVISOR">REVISOR</option>                                
                              </select>
                            </div>                            
                            <button type="submit" class="btn btn-success boton-slider"><i class="fa fa-save"></i> Guardar Datos</button>
                            <a href="revisor" class="btn btn-warning boton-slider"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
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