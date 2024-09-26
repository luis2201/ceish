<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
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
                              <h2>Consultores Externos</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Consultores Externos <small>( Lista de Consultores Externos Registrados )</small></h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table id="tbLista" class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th class="text-center" style="width: 5%">No.</th>
                                                   <th class="text-center" style="width: 30%">Apellidos y Nombres</th>
                                                   <th class="text-center">Correo</th>
                                                   <th class="text-center">Tel&eacute;fono</th>
                                                   <th class="text-center">Especialización</th>
                                                   <th class="text-center" style="width: 10%">Ver</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php
                                                   $result = $consultor->select_consultor_todos_negocio();
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
                                                      <?php echo $row['email']; ?>
                                                   </td>
                                                   <td>
                                                      <?php echo $row['telefono']; ?>
                                                   </td>
                                                   <td>
                                                      <?php echo $row['especializacion']; ?>
                                                   </td>
                                                   <td class="text-center">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="ViewDocument.php?id=<?php echo $row['hojavida']; ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i></a>
                                                            <a href="ViewDocument.php?id=<?php echo $row['cartainteres']; ?>" target="_blank" class="btn bt-sm btn-primary"><i class="fa fa-file-pdf-o"></i></a>
                                                            <a href="ViewDocument.php?id=<?php echo $row['foto']; ?>" target="_blank" class="btn btn-sm btn-secondary"><i class="fa fa-file-pdf-o"></i></a>
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