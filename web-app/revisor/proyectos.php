<?php 

   ob_start();     
   session_start(['name' => 'COM']); 
   
   if(!isset($_SESSION['usuario_com'])){
    header('Location: login.php');
   } else{
    switch($_SESSION['tipo_com']){     
      case 'ADMINISTRADOR':
         echo '<script>window.location = "../admin";</script>';
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
                                                   <th class="text-center" style="width: 15%; font-size:0.8em">No. Solicitud</th>
                                                   <th class="text-center" style="width: 30%; font-size:0.8em">T&iacute;tulo de la Investigaci&oacute;n</th>
                                                   <th class="text-center" style="font-size:0.8em">Investigador Principal</th>
                                                   <th class="text-center" style="font-size:0.8em">Correo</th>
                                                   <th class="text-center" style="font-size:0.8em">Anexo 11</th>
                                                   <th class="text-center" style="font-size:0.8em">Anexo 13</th>
                                                   <th class="text-center" style="font-size:0.8em">Anexo 12</th>
                                                   <th class="text-center" style="font-size:0.8em">Anexo 14</th>
                                                   <th class="text-center" style="font-size:0.8em">Anexo 16</th>
                                                   <th class="text-center" style="font-size:0.8em">Anexo 15</th>
                                                   <th class="text-center" style="font-size:0.8em"></th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php
                                                   $result = $revisor->select_revisor_proyecto_negocio();
                                                   foreach ($result as $row) {
                                                ?>
                                                <tr>
                                                   <td class="text-center" style="font-size:0.8em">
                                                      <?php
                                                         echo $row['numero'];
                                                      ?>
                                                   </td>
                                                   <td style="font-size:0.8em">
                                                      <?php echo $row['titulo']; ?>
                                                   </td>
                                                   <td style="font-size:0.8em">
                                                      <?php echo $row['investigador']; ?>
                                                   </td>
                                                   <td style="font-size:0.8em">
                                                      <?php echo $row['email']; ?>
                                                   </td>
                                                   <td class="text-center" style="font-size:0.8em">
                                                      <a href="ViewDocument.php?id=<?php echo $row['doc1']; ?>" target="_blank"><i class="fa fa-file fa-2x"></i></a>                                         
                                                   </td>
                                                   <td class="text-center" style="font-size:0.8em">
                                                      <a href="ViewDocument.php?id=<?php echo $row['doc2']; ?>" target="_blank"><i class="fa fa-file fa-2x"></i></a>                                                 
                                                   </td>
                                                   <td class="text-center" style="font-size:0.8em">
                                                      <a href="ViewDocument.php?id=<?php echo $row['doc3']; ?>" target="_blank"><i class="fa fa-file fa-2x"></i></a>                                          
                                                   </td>
                                                   <td class="text-center" style="font-size:0.8em">
                                                      <a href="ViewDocument.php?id=<?php echo $row['doc4']; ?>" target="_blank"><i class="fa fa-file fa-2x"></i></a>                                     
                                                   </td>
                                                   <td class="text-center" style="font-size:0.8em">
                                                      <a href="ViewDocument.php?id=<?php echo $row['doc5']; ?>" target="_blank"><i class="fa fa-file fa-2x"></i></a>                                             
                                                   </td>
                                                   <td class="text-center style="font-size:0.8em"">
                                                      <a href="ViewDocument.php?id=<?php echo $row['cartainteres']; ?>" target="_blank"><i class="fa fa-file fa-2x"></i></a>                                        
                                                   </td>
                                                   <td class="text-center" style="font-size:0.8em">
                                                      <a href="revisor-informe.php?idsolicitud=<?php echo $revisor->encryption($row['idsolicitud']) ?>" class="btn btn-success" title="Agregar informe"><i class="fa fa-plus"></i></a>
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