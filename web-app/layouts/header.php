<?php
  
  require_once '../function/config.php';
  require_once '../function/solicitudNegocio.php';
  require_once '../function/usuarioNegocio.php';
  require_once '../function/revisorNegocio.php';

  $solicitud = new SolicitudNegocio();
  $usuario = new UsuarioNegocio();
  $revisor = new RevisorNegocio(); 
?>
<!DOCTYPE html>
<html lang="es">

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
  <link rel="icon" href="../images/favicon.png" type="image/png" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="<?php echo DIR.CSS; ?>bootstrap.min.css" />
  <!-- site css -->
  <link rel="stylesheet" href="../style.css" />
  <!-- responsive css -->
  <link rel="stylesheet" href="<?php echo DIR.CSS; ?>responsive.css" />
  <!-- color css -->
  <link rel="stylesheet" href="<?php echo DIR.CSS; ?>colors.css" />
  <!-- select bootstrap -->
  <link rel="stylesheet" href="<?php echo DIR.CSS; ?>bootstrap-select.css" />
  <!-- scrollbar css -->
  <link rel="stylesheet" href="<?php echo DIR.CSS; ?>perfect-scrollbar.css" />
  <!-- DataTable -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <!-- custom css -->
  <link rel="stylesheet" href="<?php echo DIR.CSS; ?>custom.css" />
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- JQueryConfirm -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
</head>