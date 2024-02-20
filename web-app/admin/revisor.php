<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!-- header import -->
<?php 

   ob_start();     
   session_start(['name' => 'COM']); 
   
   if(!isset($_SESSION['usuario_com'])){
   header('Location: login.php.php');
   } else{
   switch($_SESSION['tipo_com']){     
      case 'REVISOR':
         echo '<script>window.location = "../revisor";</script>';
         break;
   }

   }

   include '../layouts/header.php'; 

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
                              <h2>Revisor</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Revisor <small>( Lista de Revisores )</small></h2>
                                 </div>
                                 <a href="revisor-register.php" class="btn btn-success float-right"><i class="fa fa-plus"></i> Agregar revisor</a>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table id="tbLista" class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th class="text-center" style="width: 15%">No.</th>
                                                   <th class="text-center" style="width: 50%">Revisor</th>
                                                   <th class="text-center">Correo</th>
                                                   <th class="text-center">Tel&eacute;fono</th>
                                                   <th class="text-center">Usuario</th>
                                                   <th class="text-center">Estado</th>
                                                   <th class="text-center" style="width: 15%">Acci&oacute;n</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php
                                                   $result = $usuario->select_usuario_todos_negocio();
                                                   $i = 1;
                                                   foreach ($result as $row) {
                                                ?>
                                                <tr>
                                                   <td class="text-center">
                                                      <?php
                                                         echo $i;
                                                      ?>
                                                   </td>
                                                   <td>
                                                      <?php echo $row['nombres']; ?>
                                                   </td>
                                                   <td>
                                                      <?php echo $row['correo']; ?>
                                                   </td>
                                                   <td>
                                                      <?php echo $row['telefono']; ?>
                                                   </td>
                                                   <td class="text-center">
                                                      <?php echo $row['usuario']; ?>
                                                   </td>
                                                   <td class="text-center">
                                                      <?php 
                                                 
                                                            if ($row['estado']==1) {
                                                               echo '<span class="badge badge-success">ACTIVADO</span>';
                                                            } else {
                                                               echo '<span class="badge badge-danger">DESACTIVADO</span>';
                                                            } 
                                                         ?>
                                                      </a>
                                                   </td>
                                                   <td>
                                                   <div class="btn-group" role="group" aria-label="Basic example">
                                                      
                                                        <a href="revisor-edit.php?idusuario=<?php echo $usuario->encryption($row['idusuario']); ?>" class="btn bt-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                      
                                                        <form class="frmAction" action="../function/revisorEstadoAjax.php" method="POST" data-form="estado" enctype="multipart/form-data" autocomplete="off">
                                                          <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $usuario->encryption($row['idusuario']); ?>">
                                                          <button type="submit" class="btn bt-sm btn-warning"><i class="fa fa-refresh"></i></button>
                                                        </form>
                                                      
                                                        <form class="frmAction" action="../function/revisorEliminarAjax.php" method="POST" data-form="delete" enctype="multipart/form-data" autocomplete="off">
                                                          <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $usuario->encryption($row['idusuario']); ?>">
                                                          <button type="submit" class="btn bt-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                      
                                                    </div>
                                                   </td>
                                                </tr>
                                                <?php 
                                                    $i++;
                                                  } 
                                                ?>
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