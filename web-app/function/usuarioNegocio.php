<?php

  require_once 'usuarioModelo.php';

  class UsuarioNegocio extends UsuarioModelo {

    public function login_usuario_negocio(){
      $usuario = mainModel::limpiar_cadena($_POST['usuario']);
      $contrasena = mainModel::limpiar_cadena($_POST['contrasena']);

      $contrasena = mainModel::encryption($contrasena);
      
      $procedure = 'usuario_login(?,?)';
      $param = array(
        $usuario, 
        $contrasena
      );    
      $result = UsuarioModelo::login_usuario_modelo($procedure, $param);

      if($result->rowCount()>0){
          $row = $result->fetch();
  
          session_start(['name' => 'COM']);
          $_SESSION['idusuario_com'] = MainModel::encryption($row['idusuario']);
          $_SESSION['usuario_com'] = $row['usuario'];
          $_SESSION['nombres_com'] = $row['nombres'];
          $_SESSION['tipo_com'] = $row['tipousuario'];
          $url = '';
          switch ($_SESSION['tipo_com']) {
            case 'ADMINISTRADOR':
              $url = DIR . 'admin/';
              break;
            case 'REVISOR':
              $url = DIR.'revisor/';
              break;         
          }
          $location = '<script>window.location = "'.$url.'";</script>';
          
          return $location;
      } else{
          $alert = [
              "clase"     => 'alerta',
              "titulo"    => 'Alerta del Sistema', 
              "icono"     => 'fas fa-exclamation-circle',
              "contenido" => 'Usuario y/o contraseña incorrecta. Vuelva a intentar.',
              "tipo"      => 'orange',
              "tema"      => 'modern',
          ];
      }

      return mainModel::display_alert($alert);
    }

    public function select_usuario_todos_negocio() 
    {
      $procedure = 'revisor_select_todos()';
      $result = UsuarioModelo::select_usuario_todos_modelo($procedure);

      return $result->fetchAll();
    }

    public function insert_usuario_negocio()
    {
      $nombres = MainModel::limpiar_cadena($_POST['nombres']);
      $usuario = MainModel::limpiar_cadena($_POST['usuario']);
      $correo = MainModel::limpiar_cadena($_POST['correo']);
      $telefono = MainModel::limpiar_cadena($_POST['telefono']);
      $tipousuario = MainModel::limpiar_cadena($_POST['tipousuario']);
      $contrasena = MainModel::encryption($usuario);
      
      $procedure = 'usuario_select_usuario(?)';
      $param = array(
        $usuario
      );
      $result = UsuarioModelo::select_comprueba_usuario_modelo($procedure, $param);
      
      if($result->rowCount()==0) {
        $procedure = 'usuario_insert(?,?,?,?,?,?)';
        $param = array(
          $nombres,
          $usuario,
          $correo,
          $telefono,
          $tipousuario,
          $contrasena
        );
        $result = UsuarioModelo::insert_usuario_modelo($procedure, $param);

        if ($result->rowCount() > 0) {
          $alert = [
              "clase"     => 'recargar',
              "titulo"    => 'Información del Sistema',
              "icono"     => 'fa fa-information-circle',
              "contenido" => 'Revisor registrado de forma satisfactoria',
              "tipo"      => 'blue',
              "tema"      => 'modern'
          ];
        } else {
          $alert = [
              "clase"     => 'alerta',
              "titulo"    => 'Alerta del Sistema',
              "icono"     => 'fa fa-exclamation-circle',
              "contenido" => 'No fue posible registrar el revisor',
              "tipo"      => 'red',
              "tema"      => 'modern'
          ];
        }
      } else {
        $alert = [
          "clase"     => 'aviso',
          "titulo"    => 'Alerta del Sistema',
          "icono"     => 'fa fa-exclamation-circle',
          "contenido" => 'El nombre de usuario ya ha existe. Ingrese otro.',
          "tipo"      => 'orange',
          "tema"      => 'modern'
       ];
      }

      return mainModel::display_alert($alert);
    }

    public function select_usuario_view_negocio() 
    {
      $idusuario = MainModel::limpiar_cadena($_GET['idusuario']);
      $idusuario = MainModel::decryption($idusuario);

      $procedure = 'usuario_select_view(?)';
      $param = array(
         $idusuario
      );
      $result = UsuarioModelo::select_usuario_view_modelo($procedure, $param);

      return $result->fetchAll();
    }

    public function update_usuario_negocio()
    {
      $idusuario = MainModel::limpiar_cadena($_POST['idusuario']);
      $nombres = MainModel::limpiar_cadena($_POST['nombres']);
      $correo = MainModel::limpiar_cadena($_POST['correo']);
      $telefono = MainModel::limpiar_cadena($_POST['telefono']);
      $usuario = MainModel::limpiar_cadena($_POST['usuario']);
      $tipousuario = MainModel::limpiar_cadena($_POST['tipousuario']);

      $idusuario = MainModel::decryption($idusuario);

      $procedure = 'usuario_select_usuario_id(?,?)';
      $param = array(
        $idusuario,
        $usuario
      );

      $result = UsuarioModelo::select_usuario_idusuario_modelo($procedure, $param);
      if($result->rowCount()==0) {
        $procedure = 'usuario_update(?,?,?,?,?,?)';
        $param = array(
          $idusuario,
          $nombres,
          $correo,
          $telefono,
          $usuario,
          $tipousuario
        );
        $result = UsuarioModelo::update_usuario_modelo($procedure, $param);

        if ($result->rowCount() > 0) {
          $alert = [
              "clase"     => 'recargar',
              "titulo"    => 'Información del Sistema',
              "icono"     => 'fa fa-information-circle',
              "contenido" => 'Datos del revisor actualizados de forma satisfactoria',
              "tipo"      => 'blue',
              "tema"      => 'modern'
          ];
        } else {
          $alert = [
              "clase"     => 'alerta',
              "titulo"    => 'Alerta del Sistema',
              "icono"     => 'fa fa-exclamation-circle',
              "contenido" => 'No fue posible actualizar los datos del revisor',
              "tipo"      => 'red',
              "tema"      => 'modern'
          ];
        }
      } else {
        $alert = [
          "clase"     => 'aviso',
          "titulo"    => 'Alerta del Sistema',
          "icono"     => 'fa fa-exclamation-circle',
          "contenido" => 'El nombre de usuario ya ha existe. Ingrese otro.',
          "tipo"      => 'orange',
          "tema"      => 'modern'
       ];
      }

      return mainModel::display_alert($alert);
    }

    public function estado_usuario_negocio()
    {
      $idusuario = MainModel::limpiar_cadena($_POST['idusuario']);
      
      $idusuario = MainModel::decryption($idusuario);

      $procedure = 'usuario_cambio_estado(?)';
      $param = array(
        $idusuario
      );

      $result = UsuarioModelo::update_usuario_estado_modelo($procedure, $param);
      if ($result->rowCount() > 0) {
       $alert = [
            "clase"     => 'recargar',
            "titulo"    => 'Información del Sistema',
            "icono"     => 'fa fa-information-circle',
            "contenido" => 'Estado del revisor cambiado de forma satisfactoria',
            "tipo"      => 'blue',
            "tema"      => 'modern'
        ];
      } else {
        $alert = [
            "clase"     => 'alerta',
            "titulo"    => 'Alerta del Sistema',
            "icono"     => 'fa fa-exclamation-circle',
            "contenido" => 'No fue posible actualizar el estado del revisor',
            "tipo"      => 'red',
            "tema"      => 'modern'
        ];
      }

      return mainModel::display_alert($alert);
    }

    public function delete_usuario_negocio()
    {
      $idusuario = MainModel::limpiar_cadena($_POST['idusuario']);
      
      $idusuario = MainModel::decryption($idusuario);

      $procedure = 'usuario_delete(?)';
      $param = array(
        $idusuario
      );

      $result = UsuarioModelo::delete_usuario_modelo($procedure, $param);
      if ($result->rowCount() > 0) {
       $alert = [
            "clase"     => 'recargar',
            "titulo"    => 'Información del Sistema',
            "icono"     => 'fa fa-information-circle',
            "contenido" => 'Revisor eliminado de forma satisfactoria',
            "tipo"      => 'blue',
            "tema"      => 'modern'
        ];
      } else {
        $alert = [
            "clase"     => 'alerta',
            "titulo"    => 'Alerta del Sistema',
            "icono"     => 'fa fa-exclamation-circle',
            "contenido" => 'No fue posible eliminar el revisor seleccionado',
            "tipo"      => 'red',
            "tema"      => 'modern'
        ];
      }

      return mainModel::display_alert($alert);
    }

    public function select_usuario_activo_negocio() 
    {
      $procedure = 'revisor_select_activos()';
      $result = UsuarioModelo::select_usuario_activo_modelo($procedure);

      return $result->fetchAll();
    }

    public function select_usuario_datos_negocio() 
    {
      $idusuario = MainModel::limpiar_cadena($_SESSION['idusuario_com']);
      $idusuario = MainModel::decryption($idusuario);

      $procedure = 'usuario_select_view(?)';
      $param = array(
         $idusuario
      );
      $result = UsuarioModelo::select_usuario_view_modelo($procedure, $param);

      return $result->fetchAll();
    }
   
  }

?>