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
<!-- end header import -->
<body class="dashboard dashboard_1">
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
                           <h2>Dashboard</h2>
                        </div>
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
   <!-- jQuery -->
   <?php include 'layouts/jquerys.php'; ?>
</body>
</html>
<?php 

  ob_end_flush();
  
?>