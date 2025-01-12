<?php
$Resultados=array();
//Este sera el resultado por defecto
if(Isset($_POST['Buscar_Cit'])){
    $Especialidad=$_POST['Select_Esp'];//Obt. Especialidad
    $Fecha_Cita=$_POST['Fecha_Cita']; //Obt.Fecha_Cita
    $Hora_Cita=$_POST['Hora_Cita'] ;//Obt.Hora Cita
    $ID_Doctor=$_POST['Doctor'];//Obt.Doctor id
    $ID_Cita=$_POST['Id_Cita'];//Obt.Paciente id
    $Est=$_POST['EST'];

    //Crear Consultas Dinamicas 
    /*
    Estas se preparan evaluando si cada campo del form esta con un dato , si no lo esta 
    consulta no se suma , de lo contrario construye una consulta segun los filtros que 
    el usuario busque
    */
    $ID_Paciente=$_SESSION['ID_Paciente'];
    $Busqueda="SELECT * FROM LISTA_CITAS WHERE 1=1 
    AND ID_Paciente ='$ID_Paciente'";//Por defecto tendra una 
    //consulta verdadera que retorna todos los registros
    //Ejecutamos
    //Traer obj CONECION
    include('./ConexionBD.php');
//condicion explicada:  !empty dentro de un if se entiende que em metodo empty veririfca si una variaable esta vacia,
//si esta vacia retorna true , si no esta vacia retorna false , entonces en la condicion
//si no esta vacia entonces se ejecuta el codigo dentro del if
//ten en cuenta que ! representa como un "no"  osea "si no esta vacio = si el metodo no devuelve true "

    if (!empty($Especialidad)) {
        $Busqueda=$Busqueda." AND Especialidad='$Especialidad'";
    }
    if (!empty($Fecha_Cita)) {
        $Busqueda=$Busqueda." AND Fecha_Cita ='$Fecha_Cita'";
    }
    if (!empty($Hora_Cita)) {
        $Busqueda=$Busqueda." AND Hora_Cita ='$Hora_Cita'";
    }
    if (!empty($ID_Doctor)) {
        $Busqueda=$Busqueda." AND ID_Doctor ='$ID_Doctor'";
    }
    if (!empty($ID_Cita)) {
        $Busqueda=$Busqueda ." AND Numero_Cita = '$ID_Cita'";
    }
    if(!empty($Est)){
        $Busqueda=$Busqueda." AND Estado ='$Est'";
    }

//Ejecutamos las consultas

$ejec_Cons_Busq=$ObjetoConexion->query($Busqueda);
if ($ejec_Cons_Busq==false) {
$Resultados="sin resultados o hubo un error".$ObjetoConexion->error;    
}
//Extraemos las consultas
    while ($Filas=$ejec_Cons_Busq->fetch_assoc()  ) {
        //Agregamos un array clave y valor
            $subsArrays=array(
                'id_cita'=>$Filas['Numero_Cita'],
                'Especialidad'=>$Filas['Especialidad'],
                'Nombres_Doctors'=>$Filas['Nombre_Doctor'].$Data_Doc['Apellidos_Doctor'],
                'Fecha_Creacion'=>$Filas['Fecha_Creacion'],
                'Fecha_Cita'=>$Filas['Fecha_Cita'],
                'Hora_Cita'=>$Filas['Hora_Cita'],
                'ID_Paciente'=>$Filas['ID_Paciente'],
                'ID_Doctor'=>$Filas['ID_Doctor'],
                'Precio'=>$Filas['Precio'],
                'Estado'=>$Filas['Estado']
            );
            //le agregamos los subsarrays al array
                    $Resultados[]=$subsArrays;
               }
               if($ejec_Cons_Busq->num_rows==0){
                $Resultados='No se Encontraron Registros';
               }

}


if(isset($_POST['Busca_Doc'])){
    $Espec=$_POST['Select_Esp'];
    $id_Doctor=$_POST['id_doctor']; 
    $Sex=$_POST['Sel_Sex'];              
   

    $query = "SELECT * FROM doctores WHERE  1=1 ";
  if(!empty($Espec)){
    $query = $query ." AND Especialidad = '$Espec' ";
  }
  if(!empty($id_Doctor)){
    $query = $query . " AND ID_DOC = '$id_Doctor' ";
  }
  if(!empty($Sex)){
    $query = $query . " AND Sexo = '$Sex' ";
  }
    //Ejecutar la consulta en el front Doctores.php

 
}






?>