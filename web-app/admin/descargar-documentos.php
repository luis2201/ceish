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
                        <div class="col-md-10">
                           <div class="page_title">
                              <h2>Proyectos</h2>                              
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="page_title">
                              <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ver Proyectos</button>
                           </div>
                        </div>
                     </div>                            

                     <!-- footer -->
                     <?php include 'layouts/footer.php'; ?>
                  </div>
                  <!-- end dashboard inner -->
               </div>
            </div>
         </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" style="max-width: 1152px!important;" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
                  <!-- row -->                                                                        
                  <div class="table-responsive">
                     <table id="tbLista" class="table table-striped projects" style="font-size:0.8vw; padding:0;">
                        <thead class="thead-dark">
                           <tr>
                              <th class="text-center" style="font-size:10px; width: 15%">No. Solicitud</th>
                              <th class="text-center" style="font-size:10px; width: 30%">T&iacute;tulo de la Investigaci&oacute;n</th>
                              <th class="text-center" style="font-size:10px;">Investigador Principal</th>
                              <th class="text-center" style="font-size:10px;">Fecha</th>
                              <th class="text-center" style="font-size:10px;">Anexo 11</th>
                              <th class="text-center" style="font-size:10px;">Anexo 13</th>
                              <th class="text-center" style="font-size:10px;">Anexo 12</th>
                              <th class="text-center" style="font-size:10px;">Anexo 14</th>
                              <th class="text-center" style="font-size:10px;">Anexo 16</th>
                              <th class="text-center" style="font-size:10px;">Anexo 15</th>
                              <th class="text-center" style="font-size:10px;">Comprobante</th>
                              <!-- <th class="text-center" style="font-size:10px;">Autorización</th>
                              <th class="text-center" style="font-size:10px;">Anexo 39</th> -->
                              <th class="text-center" style="font-size:10px;"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $result = $solicitud->select_solicitud_no_aprobado_negocio();
                              foreach ($result as $row) {
                                 ?>
                           <tr id="<?php echo $row['numero']; ?>">                              
                              <td class="text-center">
                                 <?php echo $row['numero']; ?>
                              </td>
                              <td>
                                 <?php echo $row['titulo']; ?>
                              </td>
                              <td>
                                 <?php echo $row['investigador']; ?>
                              </td>
                              <td>
                                 <?php echo $row['fecharegistro']; ?>
                              </td>
                              <td class="text-center">
                                 <a href="ViewDocument.php?id=<?php echo $row['doc1']; ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </td>
                              <td class="text-center">
                                 <a href="ViewDocument.php?id=<?php echo $row['doc2']; ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </td>
                              <td class="text-center">
                                 <a href="ViewDocument.php?id=<?php echo $row['doc3']; ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </td>
                              <td class="text-center">
                                 <a href="ViewDocument.php?id=<?php echo $row['doc4']; ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </td>
                              <td class="text-center">
                                 <a href="ViewDocument.php?id=<?php echo $row['doc5']; ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </td>
                              <td class="text-center">
                                 <a href="ViewDocument.php?id=<?php echo $row['cartainteres']; ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </td>
                              <td class="text-center">
                                 <a href="ViewDocument.php?id=<?php echo $row['comprobante']; ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </td>
                              <!-- <td class="text-center">
                                 <a href="ViewDocument.php?id=<?php //echo $row['comprobante']; ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </td> -->
                              <!-- <td class="text-center">
                                 <a href="ViewDocument.php?id=<?php //echo $row['declaracion']; ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </td> -->
                              <td class="text-center">
                                 <button data-id="<?php echo $row['numero']; ?>" class="btn btn-danger btn-sm" onclick="eliminar(this.dataset.id)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                              </td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>                                  
                  <!-- end row -->
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
            <div id="respuesta"></div>
         </div>
      </div>          
      <!-- jQuery -->
      <?php include 'layouts/jquerys.php'; ?>
   </body>  
</html>
<?php 

  ob_end_flush();
  
?>