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
                      <h2>Proyectos <small>( Revisores asignados )</small></h2>
                    </div>
                    <a href="revisor-asignar-register.php" class="btn btn-success text-light float-right"><i class="fa fa-check"></i> Asignar revisor</a>
                  </div>
                  <div class="full price_table padding_infor_info">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="table-responsive-sm">
                          <table id="tbLista" class="table table-striped projects">
                            <thead class="thead-dark">
                              <tr>
                                <th class="text-center" style="width: 15%">No. Solicitud</th>
                                <th class="text-center" style="width: 30%">T&iacute;tulo de la Investigaci&oacute;n</th>
                                <th class="text-center">Investigador Principal</th>
                                <th class="text-center">Revisor</th>
                                <th class="text-center" style="width: 15%">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $result = $revisor->select_revisor_solicitud_todos_negocio();
                              foreach ($result as $row) {
                              ?>
                                <tr>
                                  <td class="text-center">
                                    <?php
                                      echo $row['numero'];
                                    ?>
                                  </td>
                                  <td>
                                    <?php echo $row['titulo']; ?>
                                  </td>
                                  <td>
                                    <?php echo $row['investigador']; ?>
                                  </td>
                                  <td class="text-center">
                                    <?php echo $row['nombres']; ?>
                                  </td>
                                  <td>
                                    <div class="row">
                                      <div class="col-4">
                                        <a href="revisor-asignar-edit.php?idrevisor=<?php echo $revisor->encryption($row['idrevisor']); ?>" class="btn bt-sm btn-primary"><i class="fa fa-edit"></i></a>
                                      </div>
                                      <!--<div class="col-4">
                                        <form class="frmAction" action="function/revisorEstadoAjax.php" method="POST" data-form="estado" enctype="multipart/form-data" autocomplete="off">
                                          <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $revisor->encryption($row['idrevisor']); ?>">
                                          <button type="submit" class="btn bt-sm btn-warning"><i class="fa fa-refresh"></i></button>
                                        </form>
                                      </div>-->
                                      <div class="col text-center">
                                        <form class="frmAction" action="../function/revisorAsignadoEliminarAjax.php" method="POST" data-form="delete" enctype="multipart/form-data" autocomplete="off">
                                          <input type="hidden" id="idrevisor" name="idrevisor" value="<?php echo $revisor->encryption($row['idrevisor']); ?>">
                                          <button type="submit" class="btn bt-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
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