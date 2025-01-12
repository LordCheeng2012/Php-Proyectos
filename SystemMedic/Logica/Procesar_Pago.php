<?php


// Asegúrate de incluir los archivos necesarios primero
include './ConexionBD.php';
include './Sessiones.php';

// Verifica si 'BtnConfPag' está definido
if (isset($_GET['BtnConfPag'])) {
    echo "si existe";
    $Numero_Cita = $_GET['txtNumCita'];
    $MetPago = $_GET['SelMetPag'];
    $Precio = $_GET['txtPre'];


    // Determina el tipo de comprobante
    $TipoComp = isset($_GET['rdlFAC']) ? "FAC" : (isset($_GET['rDLbOL']) ? "BOL" : "");

    //Actualiza el estado de la cita
    $sql = "UPDATE Lista_CITAS SET Estado='Programada-Confirmada' WHERE Numero_Cita='$Numero_Cita'";
    $Res = mysqli_query($ObjetoConexion, $sql);

    // Consulta los datos del paciente
    $Data_Cita = "SELECT * FROM pacientes WHERE ID_Paciente='$ID_Paciente'";
    $DataRes = mysqli_query($ObjetoConexion, $Data_Cita);

    if ($DataRes !== false) {
        $nombres_completos = "";
        $Fecha_Creacion_Comprobante = date("Y-m-d");
        while ($Fil = $DataRes->fetch_assoc()) {
            $nombres_completos = $Fil['Nombres'] . $Fil['Apellidos'];
        }
    }

     //Verifica si la actualización fue exitosa
    if ($Res === TRUE) {
        header("Location: ../$TipoComp.php?Numero_Cita=$Numero_Cita&Met_Pago=$MetPago&Precio=$Precio&Tipo_Pago=$TipoComp");
        exit(); // Asegúrate de detener el script después de redirigir
    } else {
        echo "<script>alert('Hubo un error al procesar el comprobante');</script>";
    }
}
?>


