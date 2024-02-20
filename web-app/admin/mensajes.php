<!-- header import -->
<?php

ob_start();
session_start(['name' => 'COM']);

if (!isset($_SESSION['usuario_com'])) {
   header('Location: login.php');
} else {
   switch ($_SESSION['tipo_com']) {
      case 'REVISOR':
         echo '<script>window.location = "../revisor";</script>';
         break;
   }
}

include 'layouts/header.php';

?>

<body class="inner_page profile_page">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         <?php include 'layouts/sidebar.php' ?>
         <!-- end sidebar -->
         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            <?php include 'layouts/topbar.php' ?>
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Mensajes</h2>
                        </div>
                     </div>
                  </div>
                  <!-- row -->
                  <div class="row column1">
                     <div class="col-md-2"></div>
                     <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Bandeja de entrada</h2>
                              </div>
                           </div>
                           <div class="full price_table padding_infor_info">
                              <div class="full inbox_inner_section">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full padding_infor_info">
                                          <div class="mail-box">
                                             <aside class="lg-side">
                                                <div class="inbox-head">
                                                   <h3>Mensajes recibidos (<?php echo count($mensaje->select_mensaje_todos_negocio()); ?>)</h3>
                                                </div>
                                                <div class="inbox-body">
                                                   <table id="tbLista" class="table table-inbox table-hover">
                                                      <tbody>
                                                         <?php
                                                         $result = $mensaje->select_mensaje_todos_negocio();
                                                         foreach ($result as $row) {
                                                         ?>
                                                            <tr class="<?php if ($row['estado'] == 1) echo 'unread'; ?>">
                                                               <td class="inbox-small-cells">
                                                                  <div class="custom-control custom-checkbox">
                                                                     <a href="mensaje_view.php?idmensaje=<?php echo $mensaje->encryption($row['idmensaje']); ?>" class="btn btn-sm <?php echo ($row['estado'] == 1) ? 'text-info' : 'text-dark'; ?>"><i class="fa fa-eye"></i></a>
                                                                     <a href="" class="btn btn-sm text-danger"><i class="fa fa-trash"></i></a>
                                                                  </div>
                                                               </td>
                                                               <td class="view-message  dont-show"><?php echo $row['titulo'] ?></td>
                                                               <td class="view-message "><?php echo $row['nombres'] ?></td>
                                                               <td class="view-message  text-right"><?php echo $row['fecha'] ?></td>
                                                            </tr>
                                                         <?php } ?>
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </aside>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2"></div>
                     </div>
                     <!-- end row -->
                  </div>
                  <!-- footer -->
                  <?php include 'layouts/footer.php' ?>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <?php include 'layouts/jquerys.php' ?>
</body>

</html>