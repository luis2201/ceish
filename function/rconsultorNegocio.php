<?php

require_once 'rconsultorModelo.php';

class RconsultorNegocio extends RconsultorModelo
{

   public function insert_consultorexterno_negocio()
   {
      $nombres             = MainModel::limpiar_cadena($_POST['nombres']);
      $especializacion     = MainModel::limpiar_cadena($_POST['especializacion']);      
      $email               = MainModel::limpiar_cadena($_POST['email']);
      $telefono            = MainModel::limpiar_cadena($_POST['telefono']);
      $hojavida            = $_FILES['hojavida']['name'];      
      $cartainteres        = $_FILES['cartainteres']['name'];
      $foto                = $_FILES['foto']['name'];      

      $path                     = DOCS;
      $newnamedoc               = strtotime("now");      
      $extensionhojavida        = pathinfo($hojavida, PATHINFO_EXTENSION);      
      $extensioncartainteres    = pathinfo($cartainteres, PATHINFO_EXTENSION);
      $extensionfoto            = pathinfo($foto, PATHINFO_EXTENSION);

      $newhojavida         = $newnamedoc . '.' . $extensionhojavida;
      $newcartainteres     = $newnamedoc . '.' . $extensioncartainteres;
      $newfoto             = $newnamedoc . '.' . $extensionfoto;      

      // try {
       //throw exception if can't move the file         
         if ($_FILES['hojavida']['name']!=''){
            move_uploaded_file($_FILES['hojavida']['tmp_name'], $path . $newhojavida );
         }         
         if ($_FILES['cartainteres']['name']!=''){
            move_uploaded_file($_FILES['cartainteres']['tmp_name'], $path . $newcartainteres );
         }
         if ($_FILES['foto']['name']!=''){
            move_uploaded_file($_FILES['foto']['tmp_name'], $path . $newfoto);
         }
                
         $procedure = 'consultorexterno_insert(?,?,?,?,?)';
         $param = array(
            $nombres,
            $especializacion,            
            $newhojavida,
            $newcartainteres,
            $newfoto
         );

         $result = RconsultorModelo::insert_consultorexterno_model($procedure, $param);

         if ($result->rowCount() > 0) {
            $alert = [
               "clase"     => 'alerta',
               "titulo"    => 'Información del Sistema',
               "icono"     => 'fa-solid fa-circle-info',
               "contenido" => 'Se registró la solicitud satisfactoriamente',
               "tipo"      => 'blue',
               "tema"      => 'modern'
            ];            
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

}

?>