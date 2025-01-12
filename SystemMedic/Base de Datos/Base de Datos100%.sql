-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-08-2024 a las 11:36:05
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `webpaciente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_pacientes`
--

CREATE TABLE IF NOT EXISTS `cuentas_pacientes` (
  `ID_Paciente` varchar(10) NOT NULL,
  `Usuario` varchar(500) NOT NULL,
  `Contrasena` varchar(500) NOT NULL,
  KEY `ID_Paciente` (`ID_Paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `cuentas_pacientes`
--

INSERT INTO `cuentas_pacientes` (`ID_Paciente`, `Usuario`, `Contrasena`) VALUES
('LAVF7845', 'Esmer700@7', 'EsGut6321'),
('PAC451', 'kinberly_@sd', 'UL2012');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE IF NOT EXISTS `diagnosticos` (
  `COD_Diag` varchar(10) NOT NULL,
  `Diagnostico` varchar(500) NOT NULL,
  KEY `COD_Diag` (`COD_Diag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Diagnostico';

--
-- Volcar la base de datos para la tabla `diagnosticos`
--

INSERT INTO `diagnosticos` (`COD_Diag`, `Diagnostico`) VALUES
('7856', 'Fibrosis tipo 2'),
('4123', 'Fibrosis tipo 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE IF NOT EXISTS `doctores` (
  `ID_DOC` varchar(10) NOT NULL,
  `Nombres` varchar(500) NOT NULL,
  `Apellidos` varchar(500) NOT NULL,
  `Edad` int(2) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `Especialidad` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_DOC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Doctores';

--
-- Volcar la base de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`ID_DOC`, `Nombres`, `Apellidos`, `Edad`, `Sexo`, `Especialidad`) VALUES
('AVL25', 'Diego Martin', 'Huaman Estrada', 41, 'Masculino', 'Maxilofacial'),
('DOC001', 'Carlos', 'Martinez Lopez', 45, 'Masculino', 'Cardiología'),
('DOC002', 'Ana', 'Sanchez Rivera', 38, 'Femenino', 'Pediatría'),
('DOC003', 'Luis', 'Ramirez Torres', 50, 'Masculino', 'Neurología'),
('DOC004', 'María', 'Gomez Diaz', 33, 'Femenino', 'Dermatología'),
('DOC005', 'Jorge', 'Hernandez Ruiz', 40, 'Masculino', 'Gastroenterología'),
('DOC006', 'Laura', 'Perez Martinez', 29, 'Femenino', 'Ginecología'),
('DOC007', 'Miguel', 'Garcia Fernández', 55, 'Masculino', 'Psiquiatría'),
('DOC008', 'Claudia', 'Lopez Gutierrez', 31, 'Femenino', 'Oftalmología'),
('DOC009', 'Roberto', 'Hidalgo Moreno', 47, 'Masculino', 'Nefrología'),
('DOC010', 'Patricia', 'Ramirez Sánchez', 36, 'Femenino', 'Oncología'),
('DOC011', 'Andres', 'Ortega León', 42, 'Masculino', 'Urología'),
('DOC012', 'Sofia', 'Vargas Aguilar', 28, 'Femenino', 'Endocrinología'),
('DOC013', 'Ricardo', 'Diaz Jimenez', 39, 'Masculino', 'Traumatología'),
('DOC014', 'Veronica', 'Mendoza Castillo', 34, 'Femenino', 'Reumatología'),
('DOC015', 'Fernando', 'Silva Rojas', 44, 'Masculino', 'Hematología'),
('DOC016', 'Carmen', 'Santos Cabrera', 32, 'Femenino', 'Neumología'),
('DOC017', 'Alberto', 'Morales Torres', 41, 'Masculino', 'Cirugía General'),
('DOC018', 'Alicia', 'Ramos Lozano', 27, 'Femenino', 'Nutrición'),
('DOC019', 'Enrique', 'Romero Herrera', 53, 'Masculino', 'Geriatría'),
('DOC020', 'Elena', 'Cruz Peña', 30, 'Femenino', 'Infectología'),
('OPL45', 'Omar Padro', 'Javi Alonso', 35, 'Masculino', 'Pediatria'),
('OPR523', 'Esmeralda Gutierrez', 'Huaman Estrada', 18, 'Femenino', 'Otorrigonaringologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_atencion`
--

CREATE TABLE IF NOT EXISTS `lista_atencion` (
  `Numero_Cita` int(11) NOT NULL,
  `Fecha_Cre_At` datetime NOT NULL,
  `Presion_Art` char(10) NOT NULL,
  `Temperatura` int(3) NOT NULL,
  `Peso` float NOT NULL,
  `Talla` double NOT NULL,
  `Imc_Numeric` int(3) NOT NULL,
  `Frecuencia_Resp` int(3) NOT NULL,
  `Frec_Cardia` varchar(3) NOT NULL,
  `Saturacion` int(3) NOT NULL,
  `Estado_IMC` varchar(100) NOT NULL,
  `Motivo_Consuta` varchar(500) NOT NULL,
  `Tiempo_Enf` int(11) NOT NULL,
  `Antedecedentes` varchar(200) NOT NULL,
  `Alergias` varchar(150) NOT NULL,
  `Cirugias` varchar(150) NOT NULL,
  `Examen_Fisico` varchar(150) NOT NULL,
  `Cod_Diag` int(11) NOT NULL,
  `Tratamiento` varchar(300) NOT NULL,
  `Plan_Trata` varchar(300) NOT NULL,
  `Prox_Cita` date NOT NULL,
  `Medicamentos` varchar(100) NOT NULL,
  `Recomendaciones` varchar(200) NOT NULL,
  `Duracion` int(11) NOT NULL,
  `Cant` int(11) NOT NULL,
  PRIMARY KEY (`Numero_Cita`),
  KEY `COD_Ate` (`Numero_Cita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `lista_atencion`
--

INSERT INTO `lista_atencion` (`Numero_Cita`, `Fecha_Cre_At`, `Presion_Art`, `Temperatura`, `Peso`, `Talla`, `Imc_Numeric`, `Frecuencia_Resp`, `Frec_Cardia`, `Saturacion`, `Estado_IMC`, `Motivo_Consuta`, `Tiempo_Enf`, `Antedecedentes`, `Alergias`, `Cirugias`, `Examen_Fisico`, `Cod_Diag`, `Tratamiento`, `Plan_Trata`, `Prox_Cita`, `Medicamentos`, `Recomendaciones`, `Duracion`, `Cant`) VALUES
(1582, '2024-07-19 18:43:00', 'Estable', 35, 73.1, 1.7, 20, 90, '60', 95, 'Estable pero con peligro de sobrepeso', 'Dolores de Barriga ', 1, 'No hay Antecedentes con la molestia generada', 'Alergia en espcios de Tierra arida', 'Maxilofacial Mandibula Cirugia de Fractura', 'Estable  pero con peligro de  problemas de peso', 0, 'Se aplica medicamentos farmaceuticos para tratar la molestia , No requiere Atencion Urgente', 'Devera llevar un tratamiento de consumo de Adrezin', '2024-07-31', 'Pirfenidona 500ml ', 'debera consumir medicamento cada 5 horas 3 veces a la semana', 1, 1),
(2536, '2024-08-01 06:09:18', 'Estable', 35, 73.1, 1.8, 21, 90, '60', 95, 'Estable pero con peligro de sobrepeso', 'Alergia Y Resfriado Nasal Severa', 1, 'No hay Antecedentes con la molestia generada', 'Alergia en espcios de Tierra arida', 'Ninguna', 'Estable  pero con peligro de  problemas de peso', 7856, 'Se aplica medicamentos farmaceuticos para tratar la molestia , No requiere Atencion Urgente', 'Devera llevar un tratamiento de consumo de Adrezin', '2024-08-14', ' Naproxeno Coll 500ml', 'debera consumir medicamento cada 5 horas 3 veces a la semana', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_citas`
--

CREATE TABLE IF NOT EXISTS `lista_citas` (
  `Numero_Cita` int(10) NOT NULL,
  `Fecha_Cita` date NOT NULL,
  `Hora_Cita` varchar(500) NOT NULL,
  `ID_Paciente` varchar(10) NOT NULL,
  `ID_Doctor` varchar(10) NOT NULL,
  `Nombre_Doctor` varchar(500) NOT NULL,
  `Apellidos_Doctor` varchar(500) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Especialidad` varchar(100) NOT NULL,
  `Estado` varchar(100) NOT NULL,
  `Precio` varchar(100) NOT NULL,
  PRIMARY KEY (`Numero_Cita`),
  KEY `ID_Doctor` (`ID_Doctor`),
  KEY `ID_Paciente` (`ID_Paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Citas LIstas';

--
-- Volcar la base de datos para la tabla `lista_citas`
--

INSERT INTO `lista_citas` (`Numero_Cita`, `Fecha_Cita`, `Hora_Cita`, `ID_Paciente`, `ID_Doctor`, `Nombre_Doctor`, `Apellidos_Doctor`, `Fecha_Creacion`, `Especialidad`, `Estado`, `Precio`) VALUES
(528, '2024-08-19', '11:00: AM-12:00: PM', 'LAVF7845', 'DOC007', 'Miguel', 'Garcia Fernández', '2024-08-01', 'Psiquiatría', 'Programada-Confirmada', '25'),
(983, '2024-08-21', '10:00: AM-11:00: AM', 'LAVF7845', 'DOC012', 'Sofia', 'Vargas Aguilar', '2024-08-01', 'Endocrinología', 'Programada-Confirmada', '25'),
(1582, '2024-08-21', '11:00: AM-12:00: PM', 'LAVF7845', 'DOC014', 'Veronica', 'Mendoza Castillo', '2024-08-01', 'Reumatología', 'Programada-Confirmada', '35'),
(2536, '2024-08-28', '11:00: AM-12:00: PM', 'LAVF7845', 'DOC005', 'Jorge', 'Hernandez Ruiz', '2024-08-01', 'Gastroenterología', 'Programada-Confirmada', '25'),
(3043, '2024-08-20', '11:00: AM-12:00: PM', 'LAVF7845', 'DOC014', 'Veronica', 'Mendoza Castillo', '2024-08-01', 'Reumatología', 'Programada-Confirmada', '25'),
(3045, '2024-08-26', '11:00: AM-12:00: PM', 'LAVF7845', 'DOC018', 'Alicia', 'Ramos Lozano', '2024-08-01', 'Nutrición', 'Programada-Confirmada', '25'),
(4244, '2024-08-13', '11:00: AM-12:00: PM', 'LAVF7845', 'DOC017', 'Alberto', 'Morales Torres', '2024-08-01', 'Cirugía General', 'Programada-Confirmada', '25'),
(5005, '2024-08-14', '11:00: AM-12:00: PM', 'LAVF7845', 'DOC010', 'Patricia', 'Ramirez Sánchez', '2024-08-01', 'Oncología', 'Programada-Confirmada', '25'),
(6078, '2024-08-21', '11:00: AM-12:00: PM', 'LAVF7845', 'DOC011', 'Andres', 'Ortega León', '2024-08-01', 'Urología', 'Programada-Confirmada', '25'),
(6318, '2024-08-29', '09:00: AM-10:00: AM', 'LAVF7845', 'DOC016', 'Carmen', 'Santos Cabrera', '2024-08-01', 'Neumología', 'Programada-Confirmada', '25'),
(7105, '2024-07-30', '02:00: PM-03:00: PM', 'LAVF7845', 'DOC015', 'Fernando', 'Silva Rojas', '2024-08-01', 'Hematología', 'Cancelado', '25'),
(7427, '2024-08-15', '12:00: PM-01:00: PM', 'LAVF7845', 'DOC016', 'Carmen', 'Santos Cabrera', '2024-08-01', 'Neumología', 'Programada-Confirmada', '25'),
(7778, '2024-08-19', '11:00: AM-12:00: PM', 'LAVF7845', 'DOC015', 'Fernando', 'Silva Rojas', '2024-08-01', 'Hematología', 'En Cola :Aun Falta Cancelar', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_comprobantes_pago`
--

CREATE TABLE IF NOT EXISTS `lista_comprobantes_pago` (
  `Numero_Cita` int(10) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Hora_Creacion` time NOT NULL,
  `Tipo_Pago` int(20) NOT NULL,
  KEY `Numero_Cita` (`Numero_Cita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Todos los Pagos';

--
-- Volcar la base de datos para la tabla `lista_comprobantes_pago`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE IF NOT EXISTS `pacientes` (
  `ID_Paciente` varchar(10) NOT NULL,
  `Nombres` varchar(500) NOT NULL,
  `Apellidos` varchar(500) NOT NULL,
  `Edad` int(2) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `COD_Diag` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_Paciente`),
  KEY `COD_Diag` (`COD_Diag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='pacientes';

--
-- Volcar la base de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`ID_Paciente`, `Nombres`, `Apellidos`, `Edad`, `Sexo`, `COD_Diag`) VALUES
('LAVF7845', 'Esmeralda Gutierrez', 'Lucero Roman', 18, 'Femenino', '7856'),
('PAC451', 'Cueva James ', 'Sanches ', 34, 'Masculino', '7856');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `cuentas_pacientes`
--
ALTER TABLE `cuentas_pacientes`
  ADD CONSTRAINT `cuentas_pacientes_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `pacientes` (`ID_Paciente`);

--
-- Filtros para la tabla `lista_atencion`
--
ALTER TABLE `lista_atencion`
  ADD CONSTRAINT `lista_atencion_ibfk_1` FOREIGN KEY (`Numero_Cita`) REFERENCES `lista_citas` (`Numero_Cita`);

--
-- Filtros para la tabla `lista_citas`
--
ALTER TABLE `lista_citas`
  ADD CONSTRAINT `lista_citas_ibfk_2` FOREIGN KEY (`ID_Doctor`) REFERENCES `doctores` (`ID_DOC`),
  ADD CONSTRAINT `lista_citas_ibfk_3` FOREIGN KEY (`ID_Paciente`) REFERENCES `pacientes` (`ID_Paciente`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`COD_Diag`) REFERENCES `diagnosticos` (`COD_Diag`);
