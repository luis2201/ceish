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
                              <h2>Proyectos</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Proyectos <small>( Lista de Proyectos )</small></h2>
                                 </div>
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
                                                   <th class="text-center">Informe Revisor</th>
                                                   <th class="text-center">&Uacute;ltima Actualizaci&oacute;n</th>
                                                   <th class="text-center">Estado Calificaci&oacute;n</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php
                                                   $result = $solicitud->select_solicitud_no_aprobado_negocio();
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
                                                      <?php
                                                         $result = $revisor->select_revisor_informe_negocio($solicitud->encryption($row['idsolicitud']));
                                                         if(count($result)==0){
                                                            echo '<a href="#"><i class="fa fa-eye-slash fa-2x"></i></a>';
                                                         } 
                                                         foreach($result as $rowr) {
                                                            if($rowr['informe']!="" ){
                                                               echo '<a href="'.SERVERINFORMS.$rowr['informe'].'" target="_blank"><i class="fa fa-eye fa-2x"></i></a>';
                                                            } else {
                                                               echo '<a href="#"><i class="fa fa-eye-slash fa-2x"></i></a>';
                                                            }
                                                         }
                                                      ?>
                                                   </td>
                                                   <td>
                                                      <?php echo $row['fechaactualizacion']; ?>
                                                   </td>
                                                   <td class="text-center">
                                                      <a href="solicitud-calificar.php?solicitud=<?php echo $solicitud->encryption($row['idsolicitud']); ?>" class="
                                                         <?php 
                                                            if ($row['estado']=='PENDIENTE DE REVISION') {
                                                               echo 'btn btn-warning btn-sm';
                                                            } elseif ($row['estado']=='APROBADO') {
                                                               echo 'btn btn-success btn-sm';
                                                            } elseif ($row['estado']=='EXENTO DE APROBACION') {
                                                               echo 'btn btn-info btn-sm';
                                                            } elseif ($row['estado']=='APROBADO CON CONDICIONES') {
                                                               echo 'btn btn-primary btn-sm';
                                                            } else {
                                                               echo 'btn btn-danger btn-sm';
                                                            }
                                                         ?>">
                                                         <?php echo $row['estado']; ?>
                                                      </a>
                                                   </td>
                                                </tr>
                                                <?php } ?>
                                             </tbody>
                                          </table>
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