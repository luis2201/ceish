<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require_once 'solicitudModelo.php';

class SolicitudNegocio extends SolicitudModelo
{

   public function insert_solicitud_negocio()
   {
      $tipoinvestigacion   = MainModel::limpiar_cadena($_POST['tipoinvestigacion']);
      $titulo              = MainModel::limpiar_cadena($_POST['titulo']);
      $investigador        = MainModel::limpiar_cadena($_POST['investigador']);
      $email               = MainModel::limpiar_cadena($_POST['email']);
      $telefono            = MainModel::limpiar_cadena($_POST['telefono']);
      $file1               = $_FILES['doc1']['name'];
      $file2               = $_FILES['doc2']['name'];
      $file3               = $_FILES['doc3']['name'];
      $file4               = $_FILES['doc4']['name'];
      $file5               = $_FILES['doc5']['name'];
      $file6               = $_FILES['doc6']['name'];
      $file7               = $_FILES['doc7']['name'];
      $protocolo           = $_FILES['protocolo']['name'];
      $autorizacion        = $_FILES['autorizacion']['name'];
      $declaracion         = $_FILES['declaracion']['name'];
      $cartainteres        = $_FILES['cartainteres']['name'];
      $comprobante         = $_FILES['comprobante']['name'];      

      $path                = DOCS;
      $newnamedoc          = strtotime("now");
      $extension1          = pathinfo($file1, PATHINFO_EXTENSION);
      $extension2          = pathinfo($file2, PATHINFO_EXTENSION);
      $extension3          = pathinfo($file3, PATHINFO_EXTENSION);
      $extension4          = pathinfo($file4, PATHINFO_EXTENSION);
      $extension5          = pathinfo($file5, PATHINFO_EXTENSION);
      $extension6          = pathinfo($file6, PATHINFO_EXTENSION);
      $extension7          = pathinfo($file7, PATHINFO_EXTENSION);
      $extensionprotocolo  = pathinfo($protocolo, PATHINFO_EXTENSION);
      $extensionautorizacion  = pathinfo($autorizacion, PATHINFO_EXTENSION);
      $extensiondeclaracion   = pathinfo($declaracion, PATHINFO_EXTENSION);
      $extensioncartainteres  = pathinfo($cartainteres, PATHINFO_EXTENSION);
      $extensioncomp          = pathinfo($comprobante, PATHINFO_EXTENSION);

      $newfile1            = ($tipoinvestigacion=='')?'':'DOC1-'. $newnamedoc . '.' . $extension1;
      $newfile2            = ($tipoinvestigacion=='')?'':'DOC2-'. $newnamedoc . '.' . $extension2;
      $newfile3            = ($tipoinvestigacion=='')?'':'DOC3-'. $newnamedoc . '.' . $extension3;
      $newfile4            = ($tipoinvestigacion=='')?'':'DOC4-'. $newnamedoc . '.' . $extension4;
      $newfile5            = ($tipoinvestigacion=='')?'':'DOC5-'. $newnamedoc . '.' . $extension5;
      $newfile6            = ($tipoinvestigacion=='')?'':'DOC6-'. $newnamedoc . '.' . $extension6;
      $newfile7            = ($tipoinvestigacion=='')?'':'DOC7-'. $newnamedoc . '.' . $extension7;
      $newprotocolo        = ($tipoinvestigacion=='')?'':'PROT-'. $newnamedoc . '.' . $extensionprotocolo;
      $newautorizacion     = ($tipoinvestigacion=='')?'':'AUTO-'. $newnamedoc . '.' . $extensionautorizacion;
      $newdeclaracion      = ($tipoinvestigacion=='')?'':'DECL-'. $newnamedoc . '.' . $extensiondeclaracion;
      $newcartainteres     = ($tipoinvestigacion=='')?'':'CRTI-'. $newnamedoc . '.' . $extensioncartainteres;
      $newcomprobante      = ($tipoinvestigacion=='')?'':'COMP-'. $newnamedoc . '.' . $extensioncomp;
      $numero              = $newnamedoc;

      // try {
       //throw exception if can't move the file
         if($_FILES['doc1']['name']!=''){
            move_uploaded_file($_FILES['doc1']['tmp_name'], $path . $newfile1 );
         }
         if ($_FILES['doc2']['name']!=''){
            move_uploaded_file($_FILES['doc2']['tmp_name'], $path . $newfile2 );
         }
         if ($_FILES['doc3']['name']!=''){
            move_uploaded_file($_FILES['doc3']['tmp_name'], $path . $newfile3 );
         }
         if ($_FILES['doc4']['name']!=''){
            move_uploaded_file($_FILES['doc4']['tmp_name'], $path . $newfile4 );
         }
         if ($_FILES['doc5']['name']!=''){
            move_uploaded_file($_FILES['doc5']['tmp_name'], $path . $newfile5 );
         }
         if ($_FILES['doc6']['name']!=''){
            move_uploaded_file($_FILES['doc6']['tmp_name'], $path . $newfile6 );
         }
         if ($_FILES['doc7']['name']!=''){
            move_uploaded_file($_FILES['doc7']['tmp_name'], $path . $newfile7 );
         }
         if ($_FILES['protocolo']['name']!=''){
            move_uploaded_file($_FILES['protocolo']['tmp_name'], $path . $newprotocolo );
         }
         if ($_FILES['autorizacion']['name']!=''){
            move_uploaded_file($_FILES['autorizacion']['tmp_name'], $path . $newautorizacion );
         }
         if ($_FILES['declaracion']['name']!=''){
            move_uploaded_file($_FILES['declaracion']['tmp_name'], $path . $newdeclaracion );
         }
         if ($_FILES['cartainteres']['name']!=''){
            move_uploaded_file($_FILES['cartainteres']['tmp_name'], $path . $newcartainteres );
         }
         if ($_FILES['comprobante']['name']!=''){
            move_uploaded_file($_FILES['comprobante']['tmp_name'], $path . $newcomprobante);
         }
                
         $procedure = 'solicitud_insert2(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
         $param = array(
            $numero,
            $tipoinvestigacion,
            $titulo,
            $investigador,
            $email,
            $telefono,
            $newfile1,
            $newfile2,
            $newfile3,
            $newfile4,
            $newfile5,
            $newfile6,
            $newfile7,
            $newprotocolo,
            $newautorizacion,
            $newdeclaracion,
            $newcartainteres,
            $newcomprobante
         );

         $result = SolicitudModelo::insert_solicitud_model($procedure, $param);

         if ($result->rowCount() > 0) {
            $alert = [
               "clase"     => 'alerta',
               "titulo"    => 'Información del Sistema',
               "icono"     => 'fa-solid fa-circle-info',
               "contenido" => 'Se registró la solicitud satisfactoriamente.<br> No. Solicitud: ' . $newnamedoc,
               "tipo"      => 'blue',
               "tema"      => 'modern'
            ];
            $msj = new SolicitudNegocio();
            $msj->enviarCorreo($email, $investigador, $newnamedoc);
         } else {
            $alert = [
               "clase"     => 'alerta',
               "titulo"    => 'Alerta del Sistema',
               "icono"     => 'fas fa-ban',
               "contenido" => 'Ocurrió un error inesperado. No es posible realizar la operación solicitada',
               "tipo"      => 'red',
               "tema"      => 'modern'
            ];
         }

         return mainModel::display_alert($alert);
      // }  catch (Exception $e) {
      //    die ('File did not upload: ' . $e->getMessage());
      // }
   }

   public function select_solicitud_negocio()
   {
      $numerosolicitud  = MainModel::limpiar_cadena($_POST['numerosolicitud']);

      $procedure = 'solicitud_select_numero(?)';
      $param = array(
         $numerosolicitud
      );

      $result = SolicitudModelo::select_solicitud_numero_model($procedure, $param);

      if ($result->rowCount() > 0) {
         $row           = $result->fetch();
         $estado        = $row['estado'];
         $observacion   = $row['observacion'];

         $alert = [
            "clase"     => 'alerta',
            "titulo"    => 'Informaci�n del Sistema',
            "icono"     => 'fa-solid fa-circle-info',
            "contenido" => 'El estado de su solicitud es:<br><strong>' . $estado . '</strong><br>Observaci�n: ' . $observacion,
            "tipo"      => 'blue',
            "tema"      => 'modern'
         ];
      } else {
         $alert = [
            "clase"     => 'alerta',
            "titulo"    => 'Alerta del Sistema',
            "icono"     => 'fas fa-ban',
            "contenido" => 'No existe el n�mero de solicitud ingresada',
            "tipo"      => 'red',
            "tema"      => 'modern'
         ];
      }

      return mainModel::display_alert($alert);

   }

   public function enviarCorreo($email, $investigador, $newnamedoc)
   {

      $mail = new PHPMailer(true);

      try {
         //Server settings
         //$mail->SMTPDebug = 2;
         //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                //Enable verbose debug output
         $mail->isSMTP();                                        //Send using SMTP
         $mail->Host       = 'mail.itsup.edu.ec';                //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                               //Enable SMTP authentication
         $mail->Username   = 'ceish@itsup.edu.ec';               //SMTP username
         $mail->Password   = 'ceis123';                          //SMTP password
         $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
         $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

         //Recipients
         $mail->setFrom('ceish@itsup.edu.ec', 'CEISH');
         $mail->addAddress($email, $investigador);     //Add a recipient

         //Content
         $mail->isHTML(true);                                  //Set email format to HTML
         $mail->Subject = 'Solicitud registrada';
         $mail->Body    = 'Su solicitud ha sido registrada satisfactoriamente. Para realizar consultas sobre el <b>estado</b> de su solicitud puede ingresar a  https://ceish.itsup.edu.ec/
                           Solicitudes > Estado de Solicitud. Su número de solicitud es ' . $newnamedoc;
         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

         $mail->send();
      } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
   }
}

?>