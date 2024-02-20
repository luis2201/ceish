<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Aplicativo - CEISH - ITSUP Comit&eacute; de &Eacute;tica para Investigaci&oacute;n en Seres Humanos</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="css/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- JQueryConfirm -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <h3 class="text-white">Inicio de Sesi&oacute;n</h3>
                     </div>
                  </div>
                  <div class="login_form">
                     <form class="frmAction" action="function/usuarioLoginAjax.php" method="POST" data-form="login" enctype="multipart/form-data" autocomplete="off">
                        <div class="field">
                           <label for="usuario" class="label_field">Usuario</label>
                           <input type="text" id="usuario" name="usuario" required />
                        </div>
                        <div class="field">
                           <label for="contrasena" class="label_field">Contrase&ntilde;a</label>
                           <input type="password" id="contrasena" name="contrasena" />
                        </div>
                        <div class="field margin_0">
                           <label class="label_field hidden">hidden label</label>
                           <button class="main_bt"><i class="fa fa-caret-square-o-right"></i> Ingresar</button>
                        </div>
                     </form>
                     <div id="RespuestaForm" class=""></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!--Alert -->
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <!-- JQueryConfirm js-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
      <!-- Site JS -->
      <script src="function/login.js"></script>
   </body>
</html>