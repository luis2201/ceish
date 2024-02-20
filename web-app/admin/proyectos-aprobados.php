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
                           <h2>Project</h2>
                        </div>
                     </div>
                  </div>
                  <!-- row -->
                  <div class="row column1">
                     <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Proyectos Aprobados <small>( Lista de Proyectos Aprobados)</small></h2>
                              </div>
                           </div>
                           <div class="full price_table padding_infor_info">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="table-responsive-sm">
                                       <table id="tbLista" class="table table-striped projects">
                                          <thead class="thead-dark">
                                             <tr class="text-center">
                                                <th class="text-center" style="width: 15%">No. Solicitud</th>
                                                <th class="text-center" style="width: 50%">T&iacute;tulo del Proyecto</th>
                                                <th class="text-center">Investigador</th>
                                                <th class="text-center">Fecha Registro</th>
                                                <th class="text-center">Fecha Aprobado</th>
                                                <!-- <th class="text-center">Documentos</th> -->
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $result = $solicitud->select_solicitud_revisado_negocio();
                                                foreach ($result as $row) {      
                                             ?>
                                             <tr>
                                                <td class="text-center" style="width: 10%;">
                                                   <?php
                                                      echo $row['numero'];
                                                   ?>
                                                </td>
                                                <td style="width: 40%;">
                                                   <?php
                                                      echo $row['titulo'];
                                                   ?>
                                                </td>
                                                <td>
                                                   <?php
                                                      echo $row['investigador'];
                                                   ?>
                                                </td>
                                                <td class="text-center" >
                                                   <?php
                                                      echo $row['fecharegistro'];
                                                   ?>
                                                </td>
                                                <td class="text-center">
                                                   <?php
                                                      echo $row['fechaactualizacion'];
                                                   ?>
                                                </td>
                                                <!-- <td class="text-center">
                                                   <a href="<?php echo SERVERDOC.$row['documentos']; ?>"><i class="fa fa-file-archive-o fa-2x"></i></a>
                                                </td> -->
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