
<?php
    include('../Logica/ConexionBD.php');
$Doctor_Select=False;
/*Creamoss una variable y le damos false , por si no se envio un dato , su valor predefinido 
sera false*/

if (isset($_GET['BtnSeleccionDoctor'])) {
    # si hubo un envio de formulario con el nombre Datos_Cons_Horarios entonces guardar estos datos
    $Doctor_Select=$_GET['SLTDoctores'];//Este nombre es de nuestro select que contiene
    //el id del doctor consultado
    $Fecha_Cita_Consulta=$_GET['Fecha_Cita'];
    $Numero_Cita=$_GET['Peticion'];
}
/*Detectamos el envio de registro de una cita*/
if (isset($_GET['Registrar_Cita'])) {
    # si se detecta un form con el boton Registra_cita
    /*Insetamos una cita*/
    $ID_Doctor_Select=$_GET['Id_Doctor'];//Este nombre es del selects
    $Fecha_Cita=$_GET['Fecha_Cita'];
    $Hora_Cita=$_GET['Hora_Cita'];
    $Numero_Cita =$_GET['Peticion'];
   
/*verificamos si hay citas reservada con los datos solicitados*/
    $Cons_Verificar_Turnos="SELECT * FROM Lista_Citas WHERE
    ID_Doctor='$ID_Doctor_Select'
     AND Fecha_Cita='$Fecha_Cita'
     AND Hora_Cita='$Hora_Cita'
    ";
    /*Verificamos las respuestas y posibles resultados
    1: si arroja 0 resultados :Esta disponible y puede registrarse , 
    redireccionar y enviar mensaje
    2:Si tiene resultados : Esta reservado y no se podra adjuntar la cita
     redireccionar y mandar mensaje
     Traer Objeto Conexion
    */
    $Res_Verifica=$ObjetoConexion->query($Cons_Verificar_Turnos);
    if ($Res_Verifica==false) {
        echo "Error sql :".$ObjetoConexion->error;
    }
    if($Res_Verifica->num_rows==0){
        ECHO $Hora_Cita;//el valor es 11:15 AM
        //Convertir la hora en formato 24 horas
        echo "<br>".$Hora_Cita."<br>";
       
        session_start();
        $ID_Paciente=$_SESSION['ID_Paciente'];
        //Si no hay resultados entonces se puede registrar la cita
        //Generamos un numero de 5 cifras para el id 
        $ID_Cita=rand(100,8000);
        //Obtener la fecha de creacion
        $fecha_creacion=date('Y')."-".date('m')."-".date('d');
        $EspecSQL="SELECT  Nombres,Apellidos,Especialidad FROM Doctores WHERE ID_DOC='$ID_Doctor_Select'";
        $Res=$ObjetoConexion->query($EspecSQL);
        while($fl=$Res->fetch_assoc()){
            $Especialidad=$fl['Especialidad'];
            $Nombres=$fl['Nombres'];
            $Apellidos=$fl['Apellidos'];
        }

            //Verificar si es reprogramacion Cita
            if(!empty($Numero_Cita)){
            //Se acaba de reprogramar una cita
    
            $Action="UPDATE lista_Citas 
            SET 
            Fecha_Cita= '$Fecha_Cita',
            Hora_Cita = '$Hora_Cita',
            ID_Paciente ='$ID_Paciente',
            ID_Doctor = '$ID_Doctor_Select',
            Nombre_Doctor = '$Nombres',
            Apellidos_Doctor = '$Apellidos',
            Fecha_Creacion ='$fecha_creacion',
            Especialidad = '$Especialidad',
            Estado = 'En Cola :Aun Falta Cancelar',
            Precio = '35' WHERE Numero_Cita='$Numero_Cita'"; 
            $Res=mysqli_query($ObjetoConexion,$Action);
            if(mysqli_affected_rows($ObjetoConexion)== 0 ){
                echo "se realizo operacion se obtuvieron :".mysqli_affected_rows($ObjetoConexion)." Filas afectadas";
            } else{
                
                header('location:../Home.php?Mensaje=Se ha Reprogramado la cita con exito&Fecha_Cita='.$Fecha_Cita.
                "&hora_cita=".$Hora_Cita."&Especialidad=".$Especialidad.
                "&id_cita=".$ID_Cita."&Doctor=".$Nombres." ".$Apellidos);
            }

     }else{
                 $Action="INSERT INTO lista_Citas 
                            VALUES ('$ID_Cita',
                            '$Fecha_Cita',
                            '$Hora_Cita',
                            '$ID_Paciente',
                            '$ID_Doctor_Select',
                            '$Nombres',
                            '$Apellidos',
                            '$fecha_creacion',
                            '$Especialidad',
                            'En Cola :Aun Falta Cancelar',
                            '25')";
                             $Res=$ObjetoConexion->query($Action);
                             if($Res==false){
                                 echo "Error sql :".$ObjetoConexion->error;
                             } else{
                                 
                                 header('location:../Home.php?Mensaje=Se ha Programado la cita con exito&Fecha_Cita='.$Fecha_Cita.
                                 "&hora_cita=".$Hora_Cita."&Especialidad=".$Especialidad.
                                 "&id_cita=".$ID_Cita."&Doctor=".$Nombres." ".$Apellidos);
                             }
            }
        }
       
        if ($ID_Paciente==NULL) {
            echo "No se ha podido registrar la cita , por favor vuelva a intentarlo,id_Pac
            Desconocido";
        }
          
    }else{
        echo "No se ha podido registrar la cita , por favor vuelva a intentarlo,";
    }

    

?>