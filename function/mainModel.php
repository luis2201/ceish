<?php

  require_once "configDB.php";
  
  class mainModel{

    protected function conectar(){            
        try{                
            $link = new PDO(TYPE.':host='.HOST.';dbname='.BD, USER, PASS);
            return $link;
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

      protected function consulta_algunos($procedure, $param){
          try{
              $query = "CALL sp_".$procedure;
              $stm = self::conectar()->prepare($query);
              $stm->execute($param);
    
              return $stm;
          } catch(Exception $ex){
            print '¡Error! : ' . $ex->getMessage();
          }
      }

      protected function consulta_todos($procedure){
          try{
              $query = "CALL sp_".$procedure;
              $stm = self::conectar()->prepare($query);
              $stm->execute();
    
              return $stm;
          } catch(Exception $ex){
            print '¡Error! : ' . $ex->getMessage();
          }
      }
        
      protected function transaccion($procedure, $param){
          try{
              $query = "CALL sp_".$procedure;
              $stm = self::conectar()->prepare($query);
              $stm->execute($param);
      
              return $stm;
          } catch(Exception $ex){
            print '¡Error! : ' . $ex->getMessage();
          }  
      }

      public function encryption($string){
          $output = FALSE;
          $key = hash('sha256', SECRET_KEY);
          $iv = substr(hash('sha256', SECRET_IV), 0, 16);
          $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
          $output = base64_encode($output);

          return $output;
      }

      protected function decryption($string){            
          $key = hash('sha256', SECRET_KEY);
          $iv = substr(hash('sha256', SECRET_IV), 0, 16);
          $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);            

          return $output;
      }

      protected function generar_codigo_usuario($string, $size, $number){            
          for($i=1; $i<=$size; $i++){
              $num = rand(0,9);
              $string.= $num;
          }

          return $string.$num;
      }

      protected function limpiar_cadena($string){
          $string = trim($string);
          $string = stripslashes($string);
          $string = str_ireplace("<script>", "", $string);
          $string = str_ireplace("</script>", "", $string);
          $string = str_ireplace("<script type=", "", $string);
          $string = str_ireplace("SELECT * FROM", "", $string);
          $string = str_ireplace("DELETE FROM", "", $string);
          $string = str_ireplace("INSERT INTO", "", $string);
          $string = str_ireplace("--", "", $string);
          $string = str_ireplace("^", "", $string);
          $string = str_ireplace("[", "", $string);
          $string = str_ireplace("]", "", $string);
          $string = str_ireplace("==", "", $string);
          $string = str_ireplace(";", "", $string);

          return $string;
      }

      protected function display_alert($param){                        
          $titulo = $param['titulo'];
          $icono = $param['icono'];
          $contenido = $param['contenido'];
          $tipo = $param['tipo'];
          $tema = $param['tema'];
          if($param['clase']=='alerta'){                
              $alerta = "<script>
                          $.alert({
                              title: '$titulo', 
                              icon: '$icono',
                              content: '$contenido',
                              type: '$tipo',
                              theme: '$tema'
                          });
                          $('#frmAction')[0].reset();
                          </script>";
          } elseif($param['clase']=='confirmacion'){
              $alerta = "
                  <script>
                      $.confirm({ 
                          title: '$titulo', 
                          icon: '$icono',
                          content: '$contenido',
                          type: '$tipo',
                          theme: '$tema',
                          buttons: {
                              confirm: function () {
                                  location.reload();
                              },
                              cancel: function () {
                                  
                              }
                          }
                      });
                  </script>";
          } elseif($param['clase']=='limpiar'){
              $alerta = "
                  <script>
                      $.alert({ 
                          title: '$titulo', 
                          icon: '$icono',
                          content: '$contenido',
                          type: '$tipo',
                          theme: '$tema',                            
                      });
                      $('.frmAction')[0].reset();                      
                  </script>";
          } elseif($param['clase']=='recargar'){
              $alerta = "
                  <script>
                      $.alert({ 
                          title: '$titulo', 
                          icon: '$icono',
                          content: '$contenido',
                          type: '$tipo',
                          theme: '$tema',                            
                      });
                      location.reload();
                  </script>";
          }

          return $alerta;
      }        

  }
