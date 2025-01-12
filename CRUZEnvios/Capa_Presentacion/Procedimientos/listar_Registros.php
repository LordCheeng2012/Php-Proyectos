<?php 

if(isset($_POST['txtBtnBuscar'])){
include __DIR__.'./../../Capa_Negocio/Negocio.php';
$Negocio=  new Negocio();
$resultado="se leyeron los datos";
    $ListaRegistro = $Negocio->ListarRegistros(
    	$_POST["Destino1"],
    	$_POST["Destinatario"],
    	$_POST["Remitente"],
        $_POST["Fecha_Envio"],
        $_POST["Fecha_Recepcion"]);

  $bodyresultable=array();
                    if (is_array($ListaRegistro)) {
                      $cont=0;
                        //si esto es cierto debemos iterar sobre el array porque  no sabemos cuantos elementos tiene , ademas 
                        //tiene muchos valores con las mismas claves
                       foreach ($ListaRegistro as $Resultados) {

                        $bodyresultable[] = [
                        'N_ORDEN' =>$Resultados['N_ORDEN'],
                        'Remitente'=>$Resultados['Remitente'],
                        'Destinatario'=>$Resultados['DESTINATARIO'],
                        'hora_envio' =>$Resultados['hora_envio'],
                        'Estado'=>$Resultados['Estado'],
                        'DESTINO'=> $Resultados['DESTINO'],
                        'hora_entrega'=> $Resultados['hora_entrega'],
                        'CATEGORIA'=> $Resultados['CATEGORIA'],
                        'PRECIO'=> $Resultados['PRECIO'],
                        'FECHAENVIO'=> $Resultados['FECHAENVIO'],
                        'Fecha_entrega'=>$Resultados['Fecha_entrega'],
                          'acciones'=>"<td> acciones</td>"
                        ];
                      	$resultado= $bodyresultable;

                       }
                     }else{
                      $resultado=$ListaRegistro;
                     }


}else{
	$resultado="se leyo el archivo pero no el form";
}
 echo json_encode($resultado);


?>

