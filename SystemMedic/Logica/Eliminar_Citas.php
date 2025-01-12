<?php
include './ConexionBD.php';

if (isset($_GET['Id_cita'])) {
    $id_cita = $_GET['Id_cita'];

    $SQL = "SELECT * FROM lista_citas WHERE Numero_Cita='$id_cita' AND Estado='En Cola :Aun Falta Cancelar'";
    $result = $ObjetoConexion->query($SQL);

    if ($result != false) {
        if ($result->num_rows != 0) {
            header('Location: ../Mis_Citas.php?DeleteActive=true&ID_CITA=' . $id_cita);
            exit(); // Asegúrate de detener la ejecución del script después de redirigir
        } else {
            header("Location: ../Mis_Citas.php?Msg=La cita no se eliminó porque ya está pagada");
            exit();
        }
    } else {
        // Aquí podrías manejar el error de otra manera, como registrar el error
        echo "Error al consultar la base de datos.";
    }
} else {
    echo "No se envió el dato de ID de cita.";
}
?>




