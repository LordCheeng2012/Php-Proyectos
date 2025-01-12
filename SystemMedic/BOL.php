<?php
include './Logica/Sessiones.php';
if(isset($_GET['Numero_Cita'])){
    $numero_cita = $_GET['Numero_Cita'];
    $nombres_completos = $Nombre_Paciente." ".$Apellido_Paciente;
    $fecha_creacion = date('Y-m-d');
    $monto_pagado = $_GET['Precio'];
    $Met_Pago=$_GET['Met_Pago'];
    
}else{
// Supongamos que estas variables contienen la información del comprobante
$numero_cita = 12345;
$ID_Paciente = "ID123456";
$nombres_completos = "Juan Pérez";
$fecha_creacion = "2024-07-25";
$monto_pagado = "Hay un error al obtener los datos ......";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/windows-ui-fabric@4.0.2/dist/config/app-config.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/windows-ui-fabric@4.0.2/dist/windows-ui.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/windows-ui-fabric@4.0.2/dist/icons/fonts/fonts.min.css">
    <title>User <?php echo $ID_Paciente ?> : Boleta-Generada</title>
    <style>
        body {
            background-color: #0078d7; /* Fondo claro */
            color: #333; /* Color del texto */
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        .header {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .footer {
            border-top: 1px solid #ddd;
            margin-top: 20px;
            padding-top: 10px;
            text-align: right;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button-container button,a{
            background-color: #0078d7;
            color: white;
            border: none;
            border-radius: 0;
            padding: 10px 20px;

        }
        .button-container button:hover{
            background-color: white;
            color:#0078d7 ;
            border: 1px solid #0078d7;

        }
        .button-container a:hover{
            background-color: white;
            color:#0078d7 ;
            border: 1px solid #0078d7;

        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Comprobante de Pago</h1>
        </div>
        <p><strong>Número de Cita:</strong> <?php echo $numero_cita; ?></p>
        <p><strong>ID del Paciente:</strong> <?php echo $ID_Paciente; ?></p>
        <p><strong>Nombres Completo:</strong> <?php echo $nombres_completos; ?></p>
        <p><strong>Fecha de Creación:</strong> <?php echo $fecha_creacion; ?></p>
        <p><strong>Monto Pagado:</strong> $<?php echo $monto_pagado; ?></p>
        <div class="button-container">
            <form action="./Generar_Report.php" method="get">
                <input type="hidden" name="txtNumero_Cita" value="<?php echo $numero_cita; ?>">
                <input type="hidden" name="txtId_Paciente"value="<?php echo $ID_Paciente; ?>" >
                <input type="hidden" name="txtNombres_Completo" value="<?php echo $Nombre_Paciente; ?>">
                <input type="hidden" name="txtFecha_Creacion" value="<?php echo $fecha_creacion; ?>">
                <input type="hidden" name="txtMonto_Pagado" value="<?php echo $monto_pagado; ?>">
            <a href="./Home.php" class="ms-Button ms-Button--primary" >Regresar</a>
            <button type="submit" name="btnCagaCompPdf" class="ms-Button ms-Button--primary">
                <span class="ms-Button-label">Descargar en PDF</span>
            </button>
            </form>
           
            
        </div>
        <div class="footer">
            <p>Gracias por su pago.</p>
        </div>
    </div>
</body>
</html>

    
