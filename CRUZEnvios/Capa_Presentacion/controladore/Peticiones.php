<?php
//recibimos el parametro
//comprobar si  realmente se ha mandado el parametro s
if (isset($_GET['ID'])) {
    # code...
 MandarDetalles($_GET['ID']);
}else{
  //el valor no se ah enviado/ porque no se envio ningun valor o 
  //se ah cargado recientemente
  $Modal=0;
  $Lista = array (
    $Departamento='',
    $distrito='',
    $Provincia= '',
    $Destino= '',
    $Modal
  );
}
function MandarDetalles($ID){
  //si el valor es diferente de 0 
    if($ID !=0){
        //acedemos a datos
     include  __DIR__.'./../../Capa_Negocio/Negocio.php';
     $neg=new Negocio();
     $conexion=$neg->ObjConexion;
        //crear una consulta sql
          $Sql ="SELECT * FROM agencias where ID_DESTINO=$ID";
          //ejecutar
          $result_update = $conexion->query($Sql);
        
          if ($result_update==false) {
            // query failed
            $error1=mysqli_errno($conexion);
          echo json_encode( $error1);
          
            $error = mysqli_error($conexion);
          echo json_encode($error);
            
            } else {         
            // query was successful
            // do something with the data        
              while($filas=mysqli_fetch_array($result_update)){
                      $Departamento=$filas['DEPARTAMENTO'];
                      $Distrito=$filas['DISTRITO'];
                      $Provincia=$filas['PROVINCIA'];
                      $Destino=$filas['DESTINO'];
              }       
              
            
             echo json_encode(
              $Sopcion = array (
                $Departamento,
                $Distrito,
                $Provincia,
                $Destino,
               
         ));          
         
        } }else {
          echo json_encode("OCURRIO UN ERROR");
        };
              
    };


      if(isset($_GET['ID_Precio'])){
        $ID_Precio=$_GET['ID_Precio'];
        include '../../Capa_Negocio/Negocio.php';
       $neg=new Negocio();
       $conexion=$neg->ObjConexion;
        try {
            $consulta="SELECT PRECIO_CATEGORIA FROM CATEGORIAS WHERE
             ID_CATEGORIAS=".$ID_Precio;
            $resultado=$conexion->query($consulta);
            if($resultado==false){

              echo json_encode( array("Precio"=>$conexion->error."Error en Ajax" ) );

            }else{

              while ($a=mysqli_fetch_array($resultado)) {
                
               $PRECIO_CATEGORIA=$a['PRECIO_CATEGORIA'];
              }
              echo json_encode( array("Precio"=>$PRECIO_CATEGORIA) );
              mysqli_free_result($resultado);
            }



        }catch(Throwable $error)
         {
            
      echo json_encode( array("Precio"=>$conexion->error."Error en Ajax".$error->getMessage() ) );
        }
       
        };
           
     
    



?>