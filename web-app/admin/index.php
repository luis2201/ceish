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
                  <div class="row column1">
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-clock-o yellow_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">
                                    <?php
                                    echo count($solicitud->select_solicitud_pendiente_negocio());
                                    ?>
                                 </p>
                                 <p class="head_couter">PENDIENTE DE REVISION</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-user green_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">
                                    <?php
                                    echo count($solicitud->select_solicitud_revisado_negocio());
                                    ?>
                                 </p>
                                 <p class="head_couter">PROYECTOS APROBADOS</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-comments-o blue1_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">
                                    <?php
                                    echo count($solicitud->select_solicitud_aprobado_condiciones_negocio());
                                    ?>
                                 </p>
                                 <p class="head_couter">APROBADOS CON CONDICIONES</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-close red_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">
                                    <?php
                                    echo count($solicitud->select_solicitud_rechazado_negocio());
                                    ?></p>
                                 <p class="head_couter">PROYECTOS NO APROBADOS</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row column1">
                     <div class="col-lg-6">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Pie Chart</h2>
                              </div>
                           </div>
                           <div class="map_section padding_infor_info">
                              <canvas id="pie_chart"></canvas>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Line Chart</h2>
                              </div>
                           </div>
                           <div class="map_section padding_infor_info">
                              <canvas id="bar_chart"></canvas>
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
   <!-- jQuery -->
   <?php include 'layouts/jquerys.php'; ?>
   <!-- chart js -->
   <script src="<?php echo DIR . JS; ?>Chart.min.js"></script>
   <script src="<?php echo DIR . JS; ?>Chart.bundle.min.js"></script>
   <script src="<?php echo DIR . JS; ?>utils.js"></script>
   <script src="<?php echo DIR . JS; ?>analyser.js"></script>
   <script>
      var ctxP = document.getElementById("pie_chart").getContext('2d');
      var ctxB = document.getElementById("bar_chart").getContext('2d');

      var myPieChart = new Chart(ctxP, {
         type: 'pie',
         data: {
            labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
            datasets: [{
               data: [
                  <?php echo count($solicitud->select_cuenta_aprobado_todo_negocio()); ?>, 
                  <?php echo count($solicitud->select_cuenta_aprobado_condiciones_todo_negocio()); ?>, 
                  <?php echo count($solicitud->select_cuenta_no_aprobado_todo_negocio()); ?>, 
                  <?php echo count($solicitud->select_cuenta_exentos_todo_negocio()); ?>
               ],
               backgroundColor: [
                  "rgba(33, 150, 243, 1)",
                  "rgba(30, 208, 133, 1)",
                  "rgba(233, 30, 99, 1)",
                  "rgba(33, 65, 98, 1)"
               ],
            }],
            labels: [
               "Aprobado",
               "Aprobado con condiciones",
               "No aprobado",
               "Excentos de aprobación"
            ]
         },
         options: {
            responsive: true
         }
      });

      var myBarChart = new Chart(ctxB, {
         type: 'bar',
         data: {
            labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
            datasets: [{
               label: "Aprobado",
               data: [
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(1, 2022, 'APROBADO')); ?>, 
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(2, 2022, 'APROBADO')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(3, 2022, 'APROBADO')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(4, 2022, 'APROBADO')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(5, 2022, 'APROBADO')); ?>, 
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(6, 2022, 'APROBADO')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(7, 2022, 'APROBADO')); ?>
               ],
               backgroundColor: 'rgba(33, 150, 243, 1)'
            }, {
               label: "Aprobado con condiciones",
               data: [
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(1, 2022, 'APROBADO CON CONDICIONES')); ?>, 
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(2, 2022, 'APROBADO CON CONDICIONES')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(3, 2022, 'APROBADO CON CONDICIONES')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(4, 2022, 'APROBADO CON CONDICIONES')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(5, 2022, 'APROBADO CON CONDICIONES')); ?>, 
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(6, 2022, 'APROBADO CON CONDICIONES')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(7, 2022, 'APROBADO CON CONDICIONES')); ?>
               ],
               backgroundColor: 'rgba(30, 208, 133, 1)'
            }, {
               label: "No aprobado",
               data: [
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(1, 2022, 'NO APROBADO')); ?>, 
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(2, 2022, 'NO APROBADO')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(3, 2022, 'NO APROBADO')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(4, 2022, 'NO APROBADO')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(5, 2022, 'NO APROBADO')); ?>, 
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(6, 2022, 'NO APROBADO')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(7, 2022, 'NO APROBADO')); ?>
               ],
               backgroundColor: 'rgba(233, 30, 99, 1)'
            }, {
               label: "Exentos de aprobación",
               data: [
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(1, 2022, 'EXENTOS DE APROBACION')); ?>, 
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(2, 2022, 'EXENTOS DE APROBACION')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(3, 2022, 'EXENTOS DE APROBACION')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(4, 2022, 'EXENTOS DE APROBACION')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(5, 2022, 'EXENTOS DE APROBACION')); ?>, 
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(6, 2022, 'EXENTOS DE APROBACION')); ?>,
                  <?php echo count($solicitud->select_cuenta_month_year_negocio(7, 2022, 'EXENTOS DE APROBACION')); ?>
               ],
               backgroundColor: 'rgba(33, 65, 98, 1)'
            }]
         },
         options: {
            responsive: true
         }
      });
   </script>
</body>

</html>
<?php

ob_end_flush();

?>