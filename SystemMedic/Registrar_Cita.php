<!DOCTYPE html>
<?php include ('./Logica/Sessiones.php');
if (isset($_GET['FatalErr'])) {
    $Mensage = $_GET['FatalErr'];
    echo "<script>
alert('$Mensage');
</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link
        href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <title>Registrar Cita <?php echo $ID_Paciente ?></title>
</head>

<body>
<?php 
   
    if(isset($_GET['Numero_Cita'])){
        $NumeroCita=$_GET['Numero_Cita'];
        $ID_Doctor_Rep=$_GET['ID_Doctor'];
        
    }
    
    ?>
    <div id="app">
        <?php include ('./sidebar.php'); ?>
        <div class="app-content">

            <?php include ('./header.php'); ?>

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">User:<?php echo $ID_Paciente; ?> | Book Appointment</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>User</span>
                                </li>
                                <li class="active">
                                    <span>Book Appointment</span>
                                </li>
                            </ol>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Book Appointment</h5>
                                                <div class="form-group Mrg">
                                                    <h4>Reservar Cita</h4>
                                                    <label for="DoctorSpecialization">
                                                        Doctor Specialization
                                                    </label>
                                                    <label for="">Seleccione Doctor a Registrar</label>

                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <form action="#" method="get">

                                                    <select name="SLTDoctores" class="form-control" required="required">
                                                        <option value="">ID-Doctor-Nombres--Apellidos--Especialidades
                                                        </option>
                                                        <?php
                                                        include ('./Logica/ConexionBD.PHP');
                                                        include ('./Logica/Formularios_Datos.php');
                                                        $GET_Doctores = "SELECT ID_DOC,
                                                             Nombres,
                                                             Apellidos,
                                                             Especialidad FROM Doctores";
                                                        $Res_Get_Doctors = $ObjetoConexion->query($GET_Doctores);
                                                        if ($Res_Get_Doctors == false) {
                                                            # si esta variablel es falsa 
                                                            echo "Hubo un error al extraer los datos linea 103";
                                                            exit;/*salir del script*/
                                                        }
                                                        while ($Doctores = $Res_Get_Doctors->fetch_assoc()) {
                                                            $ID_Doctor = $Doctores['ID_DOC']; /*El objeto retorna
                               un array con claves iguales a los campos de tu tabla ,
                               asi que debemos extraer esos datos con esos campos
                               */
                                                            $Nombres = $Doctores['Nombres'];
                                                            $Apellidos = $Doctores['Apellidos'];
                                                            $Especialidad = $Doctores['Especialidad'];
                                                            /*Imprimos en las opciones del select*/
                                                            ?>
                                                            <option <?php if (isset($Doctor_Select)) {
                                                                if ($ID_Doctor == $Doctor_Select) {
                                                                    echo "selected";
                                                                }elseif(isset($_GET['Numero_Cita']) && $ID_Doctor==$ID_Doctor_Rep){
                                                                    echo "selected";
                                                                }else{
                                                                    echo "";
                                                                }
                                                            } ?>
                                                                value="<?php echo $ID_Doctor; ?>">
                                                                <?php echo $ID_Doctor . "---" . $Nombres . "--" . $Apellidos . "--" . $Especialidad ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="AppointmentDate">
                                                        Fecha de Cita
                                                    </label>
                                                    <input class="form-control datepicker" value="<?php
                                                    if (isset($Fecha_Cita_Consulta)) {
                                                        echo $Fecha_Cita_Consulta;
                                                    }
                                                    ?>" name="Fecha_Cita" required="required"
                                                        data-date-format="yyyy-mm-dd">
                                                    <input type="hidden" value="<?php if(isset($_GET['Numero_Cita'])){echo $NumeroCita;} ?>" name="Peticion" id="">
                                                    <button style="margin: 10px;" class="btn btn-o btn-primary"
                                                        type="Submit" name="BtnSeleccionDoctor">Mostrar Horarios
                                                        Disponibles</button>

                                                </form>

                                                <form role="form" action="./Logica/Formularios_Datos.php" name="book"
                                                    method="get">
                                                    <div class="form-group">
                                                        <label for="Appointmenttime">

                                                            Time

                                                        </label> <br>
                                                        <p>ID Doctor</p>
                                                        <input name="Id_Doctor" type="text" readonly value="<?php
                                                        if (isset($Doctor_Select)) {
                                                            echo $Doctor_Select;
                                                        }
                                                        ?>" />
                                                        <p>Fecha de Cita</p>
                                                        <input name="Fecha_Cita" readonly data-date-format="yyyy-mm-dd"
                                                            class="form-control datepicker"
                                                            value="<?php if (isset($Fecha_Cita_Consulta)) {
                                                                echo $Fecha_Cita_Consulta;
                                                            } ?> " />
                                                        <p>Selecciona el Horario de la Cita</p>
                                                        <select class="form-control" name="Hora_Cita" id="">
                                                            <option disabled selected>Selecciona Horario</option>
                                                            <?php
                                                            if (isset($_GET['BtnSeleccionDoctor'])) {
                                                                //instaciamos la clase date
                                                                $hora = new DateTime();

                                                                $Horarios = array
                                                                    //mostramos en formato 12 horas con am y pm
                                                                (
                                                                    $hora->setTime(8, 0, 0)->format('h:i: A') . '-' . $hora->setTime(9, 0, 0)->format('h:i: A'),
                                                                    $hora->setTime(9, 0, 0)->format('h:i: A') . '-' . $hora->setTime(10, 0, 0)->format('h:i: A'),
                                                                    $hora->setTime(10, 0, 0)->format('h:i: A') . '-' . $hora->setTime(11, 0, 0)->format('h:i: A'),
                                                                    $hora->setTime(11, 0, 0)->format('h:i: A') . '-' . $hora->setTime(12, 0, 0)->format('h:i: A'),
                                                                    $hora->setTime(12, 0, 0)->format('h:i: A') . '-' . $hora->setTime(13, 0, 0)->format('h:i: A'),
                                                                    $hora->setTime(14, 0, 0)->format('h:i: A') . '-' . $hora->setTime(15, 0, 0)->format('h:i: A'),
                                                                    $hora->setTime(15, 0, 0)->format('h:i: A') . '-' . $hora->setTime(16, 0, 0)->format('h:i: A')
                                                                );
                                                                $Consulta = "SELECT 
                                                                    Hora_Cita FROM lista_citas WHERE 
                                                                    ID_Doctor='$Doctor_Select'AND Fecha_Cita = '$Fecha_Cita_Consulta'";

                                                                $Res = $ObjetoConexion->query($Consulta);
                                                                if ($Res == false) {
                                                                    echo "<script>alert('Hubo un error en la obtencion de datos linea 179')</script>";
                                                                } else {

                                                                    $horarios_Reservados = array();
                                                                    while ($Data = $Res->fetch_assoc()) {
                                                                        $horarios_Reservados[] = $Data['Hora_Cita'];
                                                                    }

                                                                    for ($i = 0; $i < count($Horarios); $i++) {
                                                                        $Estado="Disponible";
                                                                        $Bloquear="";
                                                                        $color="Color: Green";
                                                                       foreach($horarios_Reservados as $horariosreservados){
                                
                                                                        if($Horarios[$i]==$horariosreservados){
                                                                            $Bloquear="disabled selected ";
                                                                            $Estado="Reservado";
                                                                            $color=" Color:Red";
                                                                        }
                                                                       
                                                                       }
                                                                        ?>
                                                                        
                                                                        <option value="<?php echo $Horarios[$i] ?>" <?php echo $Bloquear ?> style="<?php echo $color ?>" >
                                                                        <?php echo $Horarios[$i] . " | ".$Estado; ?>   </option>
                                                                        <?php
                                                                    }
                                                                }
                                                                }
                                                            
                                                            ?>

                                                        </select> <br>

                                                        Horario de Doctores :8:00 Am - 4-00 Pm
                                                    </div>
                                                               
                                                     <input type="hidden" name="Peticion" value=<?php if(isset($_GET['BtnSeleccionDoctor'])){echo $Numero_Cita;} ?>>

                                                    <button type="submit" name="Registrar_Cita"
                                                        class="btn btn-o btn-primary">
                                                        Registrar Cita
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- end: BASIC EXAMPLE -->






                    <!-- end: SELECT BOXES -->

                </div>
            </div>
        </div>
        <!-- start: FOOTER -->
        <?php include ('./footer.php'); ?>
        <!-- end: FOOTER -->

        <!-- start: SETTINGS -->
        <?php include ('./setting.php'); ?>

        <!-- end: SETTINGS -->
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    
    <script>
        jQuery(document).ready(function () {
            Main.init();
            FormElements.init();
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });
    </script>
    <script type="text/javascript">
        $('#timepicker1').timepicker();
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

</body>

</html>