<!-- header import -->
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
                              <h2>Profile</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>User profile</h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <!-- user profile section --> 
                                    <!-- profile image -->
                                    <?php
                                       $result = $usuario->select_usuario_datos_negocio();
                                       foreach($result as $row) {
                                    ?>
                                    <div class="col-lg-12">
                                       <div class="full dis_flex center_text">
                                          <div class="profile_img"><img width="180" class="rounded-circle" src="<?php echo DIR.IMGS; ?>layout_img/user-default.png" alt="#" /></div>
                                          <div class="profile_contant">
                                             <div class="contact_inner">
                                                <h3><?php echo $row['nombres'] ?></h3>
                                                <p><strong>Rol: </strong><?php echo $row['tipousuario'] ?></p>
                                                <ul class="list-unstyled">
                                                   <li><i class="fa fa-envelope-o"></i> : <?php echo $row['correo'] ?></li>
                                                   <li><i class="fa fa-phone"></i> : <?php echo $row['telefono'] ?></li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <?php } ?>
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