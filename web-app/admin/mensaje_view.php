<?php if (!isset($_GET['idmensaje'])) header('Location: 404_error'); ?>
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
                  <h2>Nuevo mensaje</h2>
                </div>
              </div>
            </div>
            <!-- row -->
            <div class="row column1">
              <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                  <div class="full graph_head">
                    <div class="heading1 margin_0">
                      <h2>Mensaje recibido <small>( Bandeja de entrada )</small></h2>
                    </div>
                    <a href="mensajes.php" class="btn btn-primary float-right"><i class="fa fa-arrow-circle-left"></i> Volver</a>
                  </div>
                  <div class="full price_table padding_infor_info">
                    <div class="row">
                      <div class="col-lg-8" style="margin:auto">
                        <div class="table-responsive-sm">
                          <?php
                            $result = $mensaje->select_mensaje_view_negocio();
                            if(count($result)){
                              foreach ($result as $row) {
                          ?>
                          <div class="card">
                            <div class="card-header bg-primary">
                              <h3 class="text-light"><small class="text-light"><?php echo $row['fecha'] ?></small></h3>                                                           
                            </div>
                            <div class="card-body">
                              <p><strong class="font-weight-bold">De: </strong><?php echo $row['nombres']; ?> 
				 < <?php echo $row['correo']; ?> >
			      </p>
                              <hr>
                              <p><strong class="font-weight-bold">Asunto: </strong><?php echo $row['titulo']; ?></p>
                              <hr>
                              <p><?php echo $row['mensaje']; ?></p>
                            </div>
                          </div>
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